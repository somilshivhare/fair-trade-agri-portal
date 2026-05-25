<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use App\Models\Deal;
use App\Models\Notification;
use App\Events\NewBidPlaced;
use App\Events\BidAccepted;
use App\Events\BidRejected;
use App\Events\CounterBid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function placeBid(Request $request, $productId)
    {
        $user = Auth::user();
        if ($user->role !== 'buyer') {
            return back()->with('error', 'Only buyers can place bids.');
        }

        $product = Product::findOrFail($productId);
        if ($product->user_id === $user->id) {
            return back()->with('error', 'You cannot bid on your own product.');
        }

        // Fetch current highest bid dynamically
        $highestBid = $product->bids()->max('amount') ?? 0;
        $minBid = max($product->base_price + 1, $highestBid + 1);

        $request->validate([
            'amount' => 'required|numeric|min:' . $minBid,
        ], [
            'amount.min' => 'Your bid must be higher than both the base price and the current highest bid (minimum ₹' . $minBid . ').',
        ]);

        // Create new bid record allowing multiple bids per buyer
        $bid = Bid::create([
            'product_id' => $product->id,
            'buyer_id' => $user->id,
            'farmer_id' => $product->user_id,
            'amount' => floatval($request->amount),
            'status' => 'pending',
            'counter_amount' => null,
        ]);

        // Notify farmer
        $notif = Notification::create([
            'user_id' => $product->user_id,
            'title' => 'New Bid Received',
            'message' => "{$user->name} has placed a bid of ₹{$request->amount} on your {$product->crop_name}.",
            'type' => 'new_bid',
            'link' => route('dashboard') . '?tab=incoming-bids',
        ]);

        // Broadcast Event
        try {
            event(new NewBidPlaced($bid));
        } catch (\Exception $e) {
            // Ignore Pusher configuration failures in development
        }

        return redirect()->route('dashboard', ['tab' => 'my-bids'])->with('success', 'Bid placed successfully!');
    }

    public function acceptBid($id)
    {
        $bid = Bid::with('product', 'buyer')->findOrFail($id);
        
        // Safety checks
        if (Auth::id() !== $bid->farmer_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $bid->update(['status' => 'accepted']);
        
        // Update product status to sold/inactive so it doesn't show in marketplace
        $bid->product->update(['status' => 'sold']);

        // Create Deal
        $deal = Deal::create([
            'bid_id' => $bid->id,
            'product_id' => $bid->product_id,
            'buyer_id' => $bid->buyer_id,
            'farmer_id' => $bid->farmer_id,
            'final_price' => $bid->amount,
            'status' => 'pending_details',
        ]);

        // Notify Buyer
        Notification::create([
            'user_id' => $bid->buyer_id,
            'title' => 'Bid Accepted!',
            'message' => "Your bid of ₹{$bid->amount} on {$bid->product->crop_name} was accepted. Please fill in delivery details.",
            'type' => 'bid_accepted',
            'link' => route('deals.show', $deal->id),
        ]);

        // Broadcast Event
        try {
            event(new BidAccepted($bid));
        } catch (\Exception $e) {
        }

        return redirect()->route('deals.show', $deal->id)->with('success', 'Bid accepted! Please configure your pickup location.');
    }

    public function rejectBid($id)
    {
        $bid = Bid::with('product', 'buyer')->findOrFail($id);

        if (Auth::id() !== $bid->farmer_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $bid->update(['status' => 'rejected']);

        // Notify Buyer
        Notification::create([
            'user_id' => $bid->buyer_id,
            'title' => 'Bid Rejected',
            'message' => "Your bid of ₹{$bid->amount} on {$bid->product->crop_name} was rejected.",
            'type' => 'bid_rejected',
            'link' => route('dashboard') . '?tab=my-bids',
        ]);

        // Broadcast Event
        try {
            event(new BidRejected($bid));
        } catch (\Exception $e) {
        }

        return redirect()->route('dashboard', ['tab' => 'incoming-bids'])->with('success', 'Bid rejected.');
    }

    public function counterBid(Request $request, $id)
    {
        $bid = Bid::with('product', 'buyer')->findOrFail($id);

        if (Auth::id() !== $bid->farmer_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'counter_amount' => 'required|numeric|min:1',
        ]);

        $bid->update([
            'status' => 'counter',
            'counter_amount' => floatval($request->counter_amount),
        ]);

        // Notify Buyer
        Notification::create([
            'user_id' => $bid->buyer_id,
            'title' => 'Counter Offer Received',
            'message' => "Farmer proposed a counter offer of ₹{$request->counter_amount} for {$bid->product->crop_name}.",
            'type' => 'bid_counter',
            'link' => route('dashboard') . '?tab=my-bids',
        ]);

        // Broadcast Event
        try {
            event(new CounterBid($bid));
        } catch (\Exception $e) {
        }

        return redirect()->route('dashboard', ['tab' => 'incoming-bids'])->with('success', 'Counter offer submitted.');
    }

    public function acceptCounter($id)
    {
        $bid = Bid::with('product', 'buyer')->findOrFail($id);

        if (Auth::id() !== $bid->buyer_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $finalPrice = $bid->counter_amount;
        $bid->update([
            'status' => 'accepted',
            'amount' => $finalPrice,
            'counter_amount' => null,
        ]);

        // Mark product sold
        $bid->product->update(['status' => 'sold']);

        // Create Deal
        $deal = Deal::create([
            'bid_id' => $bid->id,
            'product_id' => $bid->product_id,
            'buyer_id' => $bid->buyer_id,
            'farmer_id' => $bid->farmer_id,
            'final_price' => $finalPrice,
            'status' => 'pending_details',
        ]);

        // Notify Farmer
        Notification::create([
            'user_id' => $bid->farmer_id,
            'title' => 'Counter Offer Accepted',
            'message' => "Buyer accepted your counter offer of ₹{$finalPrice} on {$bid->product->crop_name}.",
            'type' => 'bid_accepted',
            'link' => route('deals.show', $deal->id),
        ]);

        // Broadcast Event
        try {
            event(new BidAccepted($bid));
        } catch (\Exception $e) {
        }

        return redirect()->route('deals.show', $deal->id)->with('success', 'Counter offer accepted! Please configure delivery details.');
    }

    public function rejectCounter($id)
    {
        $bid = Bid::with('product', 'buyer')->findOrFail($id);

        if (Auth::id() !== $bid->buyer_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $bid->update([
            'status' => 'rejected',
            'counter_amount' => null,
        ]);

        // Notify Farmer
        Notification::create([
            'user_id' => $bid->farmer_id,
            'title' => 'Counter Offer Rejected',
            'message' => "Buyer rejected your counter offer on {$bid->product->crop_name}.",
            'type' => 'bid_rejected',
            'link' => route('dashboard') . '?tab=incoming-bids',
        ]);

        // Broadcast Event
        try {
            event(new BidRejected($bid));
        } catch (\Exception $e) {
        }

        return redirect()->route('dashboard', ['tab' => 'my-bids'])->with('success', 'Counter offer rejected.');
    }
}
