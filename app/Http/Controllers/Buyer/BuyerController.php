<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\{Bid, MarketPrice, Order, Product};
use App\Services\{NotificationService, TransportCalculatorService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function __construct(
        private NotificationService $notifService,
        private TransportCalculatorService $transportService,
    ) {}

    public function dashboard()
    {
        $buyer = Auth::user();
        $recentBids  = Bid::where('buyer_id', $buyer->id)->with(['product', 'farmer'])->latest()->take(5)->get();
        $recentOrders = Order::forBuyer($buyer->id)->with(['product', 'farmer'])->latest()->take(5)->get();
        $stats = [
            'active_bids'   => Bid::where('buyer_id', $buyer->id)->pending()->count(),
            'total_orders'  => Order::forBuyer($buyer->id)->count(),
            'pending_orders'=> Order::forBuyer($buyer->id)->whereIn('order_status', ['confirmed','shipped'])->count(),
            'total_spent'   => Order::forBuyer($buyer->id)->where('payment_status', 'completed')->sum('total_amount'),
        ];
        return view('buyer.dashboard', compact('buyer', 'recentBids', 'recentOrders', 'stats'));
    }

    public function marketplace(Request $request)
    {
        $query = Product::available()->with('farmer');
        if ($request->category)  $query->byCategory($request->category);
        if ($request->min_price) $query->where('price', '>=', (float) $request->min_price);
        if ($request->max_price) $query->where('price', '<=', (float) $request->max_price);
        if ($request->state)     $query->where('location.state', $request->state);
        if ($request->search)    $query->where('name', 'like', "%{$request->search}%");

        [$col, $dir] = match($request->sort) {
            'price_asc'  => ['price', 'asc'],
            'price_desc' => ['price', 'desc'],
            default      => ['created_at', 'desc'],
        };

        $products     = $query->orderBy($col, $dir)->paginate(12)->withQueryString();
        
        // Fetch dynamic filters from real mandi data
        $categories   = MarketPrice::distinct('commodity')->get()->toArray();
        if (empty($categories)) $categories = Product::CATEGORIES;
        
        $states       = MarketPrice::distinct('state')->get()->toArray();
        
        $marketPrices = MarketPrice::today()->get();
        if ($marketPrices->isEmpty()) {
            $marketPrices = collect(MarketPrice::fallbackPrices());
        }

        return view('buyer.marketplace', compact('products', 'categories', 'states', 'marketPrices'));
    }

    public function productDetails(string $id)
    {
        $product     = Product::with('farmer')->findOrFail($id);
        $marketPrice = MarketPrice::byCommodity($product->name)->latest()->first();
        return view('buyer.product-details', compact('product', 'marketPrice'));
    }

    public function placeBid(Request $request, string $productId)
    {
        $data = $request->validate([
            'bid_price'        => 'required|numeric|min:1',
            'quantity'         => 'required|numeric|min:1',
            'delivery_pincode' => 'required|string',
            'message'          => 'nullable|string|max:500',
        ]);
        $product     = Product::findOrFail($productId);
        $transport   = $this->transportService->calculate(
            $product->location['pincode'] ?? '000000',
            $data['delivery_pincode'], $data['quantity'], $product->unit
        );
        $bid = Bid::create([
            'product_id'        => $product->id,
            'buyer_id'          => Auth::id(),
            'farmer_id'         => $product->farmer_id,
            'bid_price'         => $data['bid_price'],
            'quantity'          => $data['quantity'],
            'total_amount'      => ($data['bid_price'] * $data['quantity']) + $transport,
            'delivery_location' => $data['delivery_pincode'],
            'transport_cost'    => $transport,
            'message'           => $data['message'] ?? null,
            'status'            => 'pending',
            'expires_at'        => now()->addHours(72),
        ]);
        $this->notifService->send($product->farmer_id, 'new_bid', [
            'title'   => 'New Bid Received 🆕',
            'message' => Auth::user()->name . " placed ₹{$data['bid_price']} for {$product->name}",
            'data'    => ['bid_id' => $bid->id],
        ]);
        return redirect()->route('buyer.my-bids')->with('success', 'Bid placed!');
    }

    public function myBids(Request $request)
    {
        $query = Bid::where('buyer_id', Auth::id())->with(['product', 'farmer']);
        if ($request->tab && $request->tab !== 'all') $query->where('status', $request->tab);
        $bids = $query->latest()->paginate(15);
        return view('buyer.my-bids', compact('bids'));
    }

    public function acceptCounter(string $bidId)
    {
        $bid = Bid::findOrFail($bidId);
        abort_unless($bid->buyer_id === Auth::id(), 403);
        $bid->update(['status' => 'accepted', 'bid_price' => $bid->counter_price]);
        $order = Order::create([
            'bid_id'        => $bid->id,
            'product_id'    => $bid->product_id,
            'buyer_id'      => $bid->buyer_id,
            'farmer_id'     => $bid->farmer_id,
            'order_number'  => Order::generateOrderNumber(),
            'total_amount'  => $bid->counter_price * $bid->quantity + $bid->transport_cost,
            'order_status'  => 'confirmed',
            'payment_status'=> 'pending',
            'timeline'      => [['status' => 'Order Placed', 'at' => now()->toIso8601String()]],
        ]);
        $this->notifService->send($bid->farmer_id, 'bid_accepted', [
            'title'   => 'Counter Accepted ✅',
            'message' => "Buyer accepted your counter for {$bid->product->name}",
            'data'    => ['order_id' => $order->id],
        ]);
        return redirect()->route('buyer.orders')->with('success', 'Order placed!');
    }

    public function orders()
    {
        $orders = Order::forBuyer(Auth::id())->with(['product', 'farmer'])->latest()->paginate(15);
        return view('buyer.orders', compact('orders'));
    }

    public function confirmDelivery(string $orderId)
    {
        $order = Order::findOrFail($orderId);
        abort_unless($order->buyer_id === Auth::id(), 403);
        $order->update(['order_status' => 'delivered', 'payment_status' => 'completed']);
        $order->addTimelineEvent('Delivered', 'Buyer confirmed delivery');
        $this->notifService->send($order->farmer_id, 'payment_received', [
            'title'   => 'Payment Released 💰',
            'message' => "Payment for Order #{$order->order_number} released.",
            'data'    => ['order_id' => $order->id],
        ]);
        return back()->with('success', 'Delivery confirmed. Thank you!');
    }

    public function estimateTransport(Request $request)
    {
        $data = $request->validate([
            'from_pincode' => 'required|string',
            'to_pincode'   => 'required|string',
            'quantity'     => 'required|numeric',
            'unit'         => 'required|string',
        ]);
        $cost = $this->transportService->calculate(
            $data['from_pincode'], $data['to_pincode'], $data['quantity'], $data['unit']
        );
        return response()->json(['transport_cost' => $cost]);
    }
}
