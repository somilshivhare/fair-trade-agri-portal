<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    protected $fillable = [
        'bid_id', 'product_id', 'buyer_id', 'farmer_id', 'transporter_id',
        'order_number', 'total_amount', 'transport_cost',
        'order_status', 'payment_status',
        'tracking_id', 'courier_name', 'estimated_delivery',
        'timeline', 'delivery_address', 'transport_details',
    ];

    protected function casts(): array
    {
        return [
            'total_amount'      => 'float',
            'transport_cost'    => 'float',
            'estimated_delivery'=> 'datetime',
            'timeline'          => 'array',
        ];
    }

    const ORDER_STATUSES   = ['pending','confirmed','shipped','delivered','cancelled'];
    const PAYMENT_STATUSES = ['pending','completed','refunded'];

    // ── Scopes ────────────────────────────────────────────────────────────────
    public function scopeForBuyer($q, $id)  { return $q->where('buyer_id', $id); }
    public function scopeForFarmer($q, $id) { return $q->where('farmer_id', $id); }
    public function scopePending($q)        { return $q->where('order_status', 'pending'); }
    public function scopeShipped($q)        { return $q->where('order_status', 'shipped'); }

    // ── Relationships ─────────────────────────────────────────────────────────
    public function bid()     { return $this->belongsTo(Bid::class, 'bid_id'); }
    public function product() { return $this->belongsTo(Product::class, 'product_id'); }
    public function buyer()       { return $this->belongsTo(User::class, 'buyer_id'); }
    public function farmer()      { return $this->belongsTo(User::class, 'farmer_id'); }
    public function transporter() { return $this->belongsTo(User::class, 'transporter_id'); }

    // ── Helpers ───────────────────────────────────────────────────────────────
    public static function generateOrderNumber(): string
    {
        return 'AM-' . strtoupper(uniqid());
    }

    public function addTimelineEvent(string $status, string $note = ''): void
    {
        $timeline = $this->timeline ?? [];
        $timeline[] = [
            'status' => $status,
            'note'   => $note,
            'at'     => now()->toIso8601String(),
        ];
        $this->timeline = $timeline;
        $this->save();
    }
}
