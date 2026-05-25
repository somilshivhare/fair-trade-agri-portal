<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Bid extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'bids';

    protected $fillable = [
        'product_id',
        'buyer_id',
        'farmer_id',
        'amount',
        'status', // 'pending', 'accepted', 'rejected', 'counter'
        'counter_amount',
    ];

    protected $casts = [
        'amount' => 'float',
        'counter_amount' => 'float',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }
}
