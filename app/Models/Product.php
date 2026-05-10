<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'farmer_id', 'name', 'category', 'variety',
        'quantity', 'unit', 'price', 'quality',
        'harvest_date', 'location', 'images',
        'description', 'status',
    ];

    protected function casts(): array
    {
        return [
            'quantity'     => 'float',
            'price'        => 'float',
            'images'       => 'array',
            'location'     => 'array',
            'harvest_date' => 'datetime',
        ];
    }

    // ── Constants ─────────────────────────────────────────────────────────────
    const UNITS      = ['kg', 'quintal', 'ton'];
    const QUALITIES  = ['A', 'B', 'C'];
    const STATUSES   = ['available', 'sold', 'expired'];
    const CATEGORIES = ['Vegetables', 'Fruits', 'Grains', 'Pulses', 'Spices'];
    const CROPS = ['Wheat', 'Rice', 'Tomato', 'Onion', 'Potato', 'Turmeric',
                   'Maize', 'Soybean', 'Mustard', 'Sugarcane'];

    // ── Scopes ────────────────────────────────────────────────────────────────
    public function scopeAvailable($q)              { return $q->where('status', 'available'); }
    public function scopeByCategory($q, $category)  { return $q->where('category', $category); }
    public function scopeByFarmer($q, $farmerId)    { return $q->where('farmer_id', $farmerId); }
    public function scopePriceRange($q, $min, $max) { return $q->whereBetween('price', [$min, $max]); }

    // ── Relationships ─────────────────────────────────────────────────────────
    public function farmer() { return $this->belongsTo(User::class, 'farmer_id'); }
    public function bids()   { return $this->hasMany(Bid::class, 'product_id'); }
    public function orders() { return $this->hasMany(Order::class, 'product_id'); }

    // ── Helpers ───────────────────────────────────────────────────────────────
    public function getPrimaryImageAttribute(): string
    {
        return $this->images[0] ?? asset('images/crop-placeholder.jpg');
    }

    public function getFormattedPriceAttribute(): string
    {
        return '₹' . number_format($this->price, 2) . ' / ' . $this->unit;
    }
}
