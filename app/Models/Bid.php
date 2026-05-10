<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Bid extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'bids';

    protected $fillable = [
        'product_id', 'buyer_id', 'farmer_id',
        'bid_price', 'quantity', 'total_amount',
        'delivery_location', 'transport_cost',
        'status', 'counter_price', 'counter_message',
        'expires_at', 'message',
    ];

    protected function casts(): array
    {
        return [
            'bid_price'      => 'float',
            'quantity'       => 'float',
            'total_amount'   => 'float',
            'transport_cost' => 'float',
            'counter_price'  => 'float',
            'expires_at'     => 'datetime',
        ];
    }

    const STATUSES = ['pending', 'accepted', 'rejected', 'countered', 'expired'];

    // ── Scopes ────────────────────────────────────────────────────────────────
    public function scopePending($q)   { return $q->where('status', 'pending'); }
    public function scopeAccepted($q)  { return $q->where('status', 'accepted'); }
    public function scopeActive($q)    { return $q->whereIn('status', ['pending', 'countered']); }
    public function scopeExpiring($q)  { return $q->where('expires_at', '<=', now()->addHours(24))->active(); }

    // ── Relationships ─────────────────────────────────────────────────────────
    public function product()      { return $this->belongsTo(Product::class, 'product_id'); }
    public function buyer()        { return $this->belongsTo(User::class, 'buyer_id'); }
    public function farmer()       { return $this->belongsTo(User::class, 'farmer_id'); }
    public function order()        { return $this->hasOne(Order::class, 'bid_id'); }
    public function negotiations() { return $this->hasMany(BidNegotiation::class, 'bid_id'); }

    // ── Helpers ───────────────────────────────────────────────────────────────
    public function isExpired(): bool  { return $this->expires_at && now()->gt($this->expires_at); }
    public function isPending(): bool  { return $this->status === 'pending'; }
    public function isAccepted(): bool { return $this->status === 'accepted'; }

    public function getTimeRemainingAttribute(): string
    {
        if (!$this->expires_at || $this->isExpired()) return 'Expired';
        return $this->expires_at->diffForHumans();
    }
}
