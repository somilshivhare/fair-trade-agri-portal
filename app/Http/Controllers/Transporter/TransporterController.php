<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use App\Models\{Order, User};
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransporterController extends Controller
{
    public function __construct(private NotificationService $notifService) {}

    // ── Dashboard ─────────────────────────────────────────────────────────────
    public function dashboard()
    {
        $transporter = Auth::user();

        // Orders assigned to this transporter (or unassigned / in-transit)
        $activeDeliveries = Order::where('transporter_id', $transporter->id)
                                 ->whereIn('order_status', ['confirmed', 'picked_up', 'in_transit'])
                                 ->with(['product', 'buyer', 'farmer'])
                                 ->latest()->take(5)->get();

        $stats = [
            'total_deliveries'  => Order::where('transporter_id', $transporter->id)->count(),
            'active'            => Order::where('transporter_id', $transporter->id)
                                        ->whereIn('order_status', ['confirmed', 'picked_up', 'in_transit'])->count(),
            'completed'         => Order::where('transporter_id', $transporter->id)
                                        ->where('order_status', 'delivered')->count(),
            'pending_pickup'    => Order::where('transporter_id', $transporter->id)
                                        ->where('order_status', 'confirmed')->count(),
        ];

        return view('transporter.dashboard', compact('transporter', 'activeDeliveries', 'stats'));
    }

    // ── All Deliveries ────────────────────────────────────────────────────────
    public function deliveries(Request $request)
    {
        $transporter = Auth::user();
        $query = Order::where('transporter_id', $transporter->id)->with(['product', 'buyer', 'farmer']);

        if ($request->status && $request->status !== 'all') {
            $query->where('order_status', $request->status);
        }

        $orders = $query->latest()->paginate(15)->withQueryString();
        return view('transporter.deliveries', compact('orders', 'transporter'));
    }

    // ── Delivery Detail ───────────────────────────────────────────────────────
    public function deliveryDetail(string $id)
    {
        $transporter = Auth::user();
        $order = Order::where('transporter_id', $transporter->id)
                      ->with(['product', 'buyer', 'farmer'])
                      ->findOrFail($id);
        return view('transporter.delivery-detail', compact('order', 'transporter'));
    }

    // ── Mark Picked Up ────────────────────────────────────────────────────────
    public function markPickedUp(string $id)
    {
        $transporter = Auth::user();
        $order = Order::where('transporter_id', $transporter->id)->findOrFail($id);

        $order->update(['order_status' => 'in_transit']);
        $order->addTimelineEvent('Picked Up', "Transporter {$transporter->name} picked up the shipment");

        $this->notifService->send($order->buyer_id, 'order_picked_up', [
            'title'   => 'Shipment Picked Up 📦',
            'message' => "Your order #{$order->order_number} has been picked up and is in transit.",
            'data'    => ['order_id' => $order->id],
        ]);

        $this->notifService->send($order->farmer_id, 'order_picked_up', [
            'title'   => 'Order Picked Up 🚛',
            'message' => "Order #{$order->order_number} picked up by transporter.",
            'data'    => ['order_id' => $order->id],
        ]);

        return back()->with('success', 'Order marked as picked up and in transit.');
    }

    // ── Mark Delivered ────────────────────────────────────────────────────────
    public function markDelivered(string $id)
    {
        $transporter = Auth::user();
        $order = Order::where('transporter_id', $transporter->id)->findOrFail($id);

        $order->update(['order_status' => 'delivered']);
        $order->addTimelineEvent('Delivered', "Delivered by transporter {$transporter->name}");

        $this->notifService->send($order->buyer_id, 'order_delivered', [
            'title'   => 'Order Delivered! ✅',
            'message' => "Your order #{$order->order_number} has been delivered. Please confirm receipt.",
            'data'    => ['order_id' => $order->id],
        ]);

        return back()->with('success', 'Order marked as delivered.');
    }
}
