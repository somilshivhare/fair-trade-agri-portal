<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Notification;
use App\Events\DealConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    public function show($id)
    {
        $deal = Deal::with(['product', 'buyer', 'farmer'])->findOrFail($id);

        // Security check: only buyer or farmer of this deal can view it
        $userId = Auth::id();
        if ($userId !== $deal->buyer_id && $userId !== $deal->farmer_id) {
            abort(403, 'Unauthorized access to this deal.');
        }

        return view('deals.show', compact('deal'));
    }

    public function submitDetails(Request $request, $id)
    {
        $deal = Deal::with(['product', 'buyer', 'farmer'])->findOrFail($id);
        $user = Auth::user();

        // Check permission
        if ($user->id !== $deal->buyer_id && $user->id !== $deal->farmer_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($user->id === $deal->buyer_id) {
            // Buyer inputs delivery details
            $request->validate([
                'delivery_address' => 'required|string|max:500',
                'delivery_state' => 'required|string|max:100',
                'delivery_city' => 'required|string|max:100',
                'delivery_phone' => 'required|string|max:20',
            ]);

            $deal->update([
                'delivery_address' => $request->delivery_address,
                'delivery_state' => $request->delivery_state,
                'delivery_city' => $request->delivery_city,
                'delivery_phone' => $request->delivery_phone,
            ]);
        } else {
            // Farmer inputs pickup details
            $request->validate([
                'pickup_location' => 'required|string|max:500',
                'pickup_state' => 'required|string|max:100',
                'pickup_city' => 'required|string|max:100',
                'pickup_phone' => 'required|string|max:20',
            ]);

            $deal->update([
                'pickup_location' => $request->pickup_location,
                'pickup_state' => $request->pickup_state,
                'pickup_city' => $request->pickup_city,
                'pickup_phone' => $request->pickup_phone,
            ]);
        }

        // Fresh load from DB to check if both addresses are filled
        $deal = $deal->fresh();

        if (
            $deal->delivery_address && $deal->pickup_location &&
            $deal->status !== 'confirmed'
        ) {
            $deal->update(['status' => 'confirmed']);

            // Notify both parties
            Notification::create([
                'user_id' => $deal->buyer_id,
                'title' => 'Deal Confirmed!',
                'message' => "Your deal for {$deal->product->crop_name} has been fully confirmed.",
                'type' => 'deal_confirmed',
                'link' => route('deals.show', $deal->id),
            ]);

            Notification::create([
                'user_id' => $deal->farmer_id,
                'title' => 'Deal Confirmed!',
                'message' => "Your deal for {$deal->product->crop_name} has been fully confirmed.",
                'type' => 'deal_confirmed',
                'link' => route('deals.show', $deal->id),
            ]);

            // Broadcast Event
            try {
                event(new DealConfirmed($deal));
            } catch (\Exception $e) {
            }
        }

        if ($deal->status === 'confirmed') {
            return redirect()->route('deals.show', $deal->id)->with('success', '🎉 Deal completed successfully!');
        }

        return redirect()->route('deals.show', $deal->id)->with('success', 'Details saved successfully.');
    }
}
