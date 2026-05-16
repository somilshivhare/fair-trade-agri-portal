<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\{Bid, KycVerification, MarketPrice, Order, Product};
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FarmerController extends Controller
{
    public function __construct(private NotificationService $notifService) {}

    // ── Dashboard ─────────────────────────────────────────────────────────────
    public function dashboard()
    {
        $farmer   = Auth::user();
        $products = Product::byFarmer($farmer->id)->get();
        $bids     = Bid::where('farmer_id', $farmer->id)->latest()->take(5)->get();
        $orders   = Order::forFarmer($farmer->id)->latest()->take(5)->get();
        $prices = MarketPrice::today()->get();
        if ($prices->isEmpty()) {
            $prices = collect(MarketPrice::fallbackPrices())->map(fn($p) => (object)$p);
        }

        $stats = [
            'total_products'  => $products->count(),
            'active_listings' => $products->where('status', 'available')->count(),
            'pending_bids'    => Bid::where('farmer_id', $farmer->id)->pending()->count(),
            'total_revenue'   => Order::forFarmer($farmer->id)
                                    ->where('payment_status', 'completed')
                                    ->sum('total_amount'),
        ];

        return view('farmer.dashboard', compact('farmer', 'products', 'bids', 'orders', 'prices', 'stats'));
    }

    // ── Products ──────────────────────────────────────────────────────────────
    public function myProducts(Request $request)
    {
        $farmer   = Auth::user();
        $query    = Product::byFarmer($farmer->id);
        if ($request->status) $query->where('status', $request->status);
        $products = $query->latest()->paginate(12);
        return view('farmer.my-products', compact('products', 'farmer'));
    }

    public function addProductForm()
    {
        $states     = MarketPrice::distinct('state')->get()->toArray();
        $categories = MarketPrice::distinct('commodity')->get()->toArray();
        if (empty($categories)) $categories = Product::CATEGORIES;

        return view('farmer.add-product', [
            'crops'      => Product::CROPS,
            'categories' => $categories,
            'states'     => $states,
            'units'      => Product::UNITS,
            'qualities'  => Product::QUALITIES,
        ]);
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'category'     => 'required|in:' . implode(',', Product::CATEGORIES),
            'variety'      => 'nullable|string',
            'quantity'     => 'required|numeric|min:1',
            'unit'         => 'required|in:' . implode(',', Product::UNITS),
            'price'        => 'required|numeric|min:1',
            'quality'      => 'required|in:A,B,C',
            'harvest_date' => 'required|date',
            'state'        => 'required|string',
            'district'     => 'required|string',
            'mandi'        => 'required|string',
            'pincode'      => 'required|string',
            'description'  => 'nullable|string|max:2000',
            'images.*'     => 'nullable|image|max:5120',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = Storage::disk('public')->put('products', $img);
            }
        }

        Product::create([
            ...$data,
            'farmer_id' => Auth::id(),
            'images'    => $images,
            'location'  => [
                'state'   => $data['state'],
                'district'=> $data['district'],
                'mandi'   => $data['mandi'],
                'pincode' => $data['pincode'],
            ],
            'status'    => 'available',
        ]);

        return redirect()->route('farmer.products')->with('success', 'Product listed successfully!');
    }

    public function deleteProduct(string $id)
    {
        $product = Product::findOrFail($id);
        abort_unless($product->farmer_id === Auth::id(), 403);
        $product->update(['status' => 'expired']);
        return back()->with('success', 'Product removed from marketplace.');
    }

    public function editProduct(string $id)
    {
        $product = Product::findOrFail($id);
        abort_unless($product->farmer_id === Auth::id(), 403);

        $states     = MarketPrice::distinct('state')->get()->toArray();
        $categories = MarketPrice::distinct('commodity')->get()->toArray();
        if (empty($categories)) $categories = Product::CATEGORIES;

        return view('farmer.add-product', [
            'product'    => $product,
            'crops'      => Product::CROPS,
            'categories' => $categories,
            'states'     => $states,
            'units'      => Product::UNITS,
            'qualities'  => Product::QUALITIES,
            'editing'    => true,
        ]);
    }

    public function updateProduct(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        abort_unless($product->farmer_id === Auth::id(), 403);

        $data = $request->validate([
            'name'         => 'required|string',
            'category'     => 'required|in:' . implode(',', Product::CATEGORIES),
            'variety'      => 'nullable|string',
            'quantity'     => 'required|numeric|min:1',
            'unit'         => 'required|in:' . implode(',', Product::UNITS),
            'price'        => 'required|numeric|min:1',
            'quality'      => 'required|in:A,B,C',
            'harvest_date' => 'required|date',
            'state'        => 'required|string',
            'district'     => 'required|string',
            'mandi'        => 'required|string',
            'pincode'      => 'required|string',
            'description'  => 'nullable|string|max:2000',
            'images.*'     => 'nullable|image|max:5120',
        ]);

        $images = $product->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = Storage::disk('public')->put('products', $img);
            }
        }

        $product->update([
            'name'         => $data['name'],
            'category'     => $data['category'],
            'variety'      => $data['variety'],
            'quantity'     => $data['quantity'],
            'unit'         => $data['unit'],
            'price'        => $data['price'],
            'quality'      => $data['quality'],
            'harvest_date' => $data['harvest_date'],
            'description'  => $data['description'],
            'images'       => $images,
            'location'     => [
                'state'   => $data['state'],
                'district'=> $data['district'],
                'mandi'   => $data['mandi'],
                'pincode' => $data['pincode'],
            ],
        ]);

        return redirect()->route('farmer.products')->with('success', 'Product updated successfully!');
    }

    // ── Received Bids ─────────────────────────────────────────────────────────
    public function receivedBids()
    {
        $farmer = Auth::user();
        $bids   = Bid::where('farmer_id', $farmer->id)
                     ->with(['product', 'buyer'])
                     ->latest()->paginate(15);
        return view('farmer.received-bids', compact('bids', 'farmer'));
    }

    public function acceptBid(string $bidId)
    {
        $bid = Bid::findOrFail($bidId);
        abort_unless($bid->farmer_id === Auth::id(), 403);

        $bid->update(['status' => 'accepted']);
        $bid->product->update(['status' => 'sold']);

        // Create order automatically
        $order = Order::create([
            'bid_id'         => $bid->id,
            'product_id'     => $bid->product_id,
            'buyer_id'       => $bid->buyer_id,
            'farmer_id'      => $bid->farmer_id,
            'order_number'   => Order::generateOrderNumber(),
            'total_amount'   => $bid->total_amount,
            'transport_cost' => $bid->transport_cost,
            'order_status'   => 'confirmed',
            'payment_status' => 'pending',
            'timeline'       => [['status' => 'Order Placed', 'at' => now()->toIso8601String()]],
        ]);

        $this->notifService->send($bid->buyer_id, 'bid_accepted', [
            'title'   => 'Your bid was accepted! 🎉',
            'message' => "Farmer accepted your bid for {$bid->product->name}",
            'data'    => ['order_id' => $order->id],
        ]);

        return back()->with('success', 'Bid accepted. Order #' . $order->order_number . ' created.');
    }

    public function counterBid(Request $request, string $bidId)
    {
        $request->validate([
            'counter_price'   => 'required|numeric|min:1',
            'counter_message' => 'nullable|string|max:500',
        ]);

        $bid = Bid::findOrFail($bidId);
        abort_unless($bid->farmer_id === Auth::id(), 403);

        $bid->update([
            'status'          => 'countered',
            'counter_price'   => $request->counter_price,
            'counter_message' => $request->counter_message,
        ]);

        $this->notifService->send($bid->buyer_id, 'counter_offer', [
            'title'   => 'Counter Offer Received 🔄',
            'message' => "Farmer countered at ₹{$request->counter_price} for {$bid->product->name}",
            'data'    => ['bid_id' => $bid->id, 'counter_price' => $request->counter_price],
        ]);

        return back()->with('success', 'Counter offer sent.');
    }

    public function rejectBid(string $bidId)
    {
        $bid = Bid::findOrFail($bidId);
        abort_unless($bid->farmer_id === Auth::id(), 403);
        $bid->update(['status' => 'rejected']);

        $this->notifService->send($bid->buyer_id, 'bid_rejected', [
            'title'   => 'Bid Rejected ❌',
            'message' => "Your bid for {$bid->product->name} was not accepted.",
            'data'    => ['bid_id' => $bid->id],
        ]);

        return back()->with('info', 'Bid rejected.');
    }

    // ── Orders ────────────────────────────────────────────────────────────────
    public function orders()
    {
        $orders = Order::forFarmer(Auth::id())->with(['product', 'buyer'])->latest()->paginate(15);
        return view('farmer.orders', compact('orders'));
    }

    public function markShipped(Request $request, string $orderId)
    {
        $request->validate([
            'courier_name' => 'required|string',
            'tracking_id'  => 'required|string',
        ]);

        $order = Order::findOrFail($orderId);
        abort_unless($order->farmer_id === Auth::id(), 403);

        $order->update([
            'order_status' => 'shipped',
            'courier_name' => $request->courier_name,
            'tracking_id'  => $request->tracking_id,
        ]);
        $order->addTimelineEvent('Shipped', "Courier: {$request->courier_name}, Tracking: {$request->tracking_id}");

        $this->notifService->send($order->buyer_id, 'order_shipped', [
            'title'   => 'Your Order is Shipped! 🚚',
            'message' => "Track with: {$request->tracking_id} via {$request->courier_name}",
            'data'    => ['order_id' => $order->id, 'tracking_id' => $request->tracking_id],
        ]);

        return back()->with('success', 'Order marked as shipped.');
    }

    // ── KYC ───────────────────────────────────────────────────────────────────
    public function kycForm()
    {
        $kyc = KycVerification::where('user_id', Auth::id())->first();
        return view('farmer.kyc', compact('kyc'));
    }

    public function submitKyc(Request $request)
    {
        $request->validate([
            'aadhar_number'      => 'required|string|size:12',
            'aadhar_front_image' => 'required|image|max:5120',
            'aadhar_back_image'  => 'required|image|max:5120',
            'passport_photo'     => 'required|image|max:5120',
        ]);

        $front   = Storage::disk('public')->put('kyc', $request->file('aadhar_front_image'));
        $back    = Storage::disk('public')->put('kyc', $request->file('aadhar_back_image'));
        $selfie  = Storage::disk('public')->put('kyc', $request->file('passport_photo'));

        KycVerification::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'aadhar_number'      => $request->aadhar_number,
                'aadhar_front_image' => $front,
                'aadhar_back_image'  => $back,
                'passport_photo'     => $selfie,
                'status'             => 'pending',
            ]
        );

        return back()->with('success', 'KYC documents submitted. Awaiting admin review.');
    }
}
