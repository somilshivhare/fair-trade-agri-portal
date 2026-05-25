<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Deal extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'deals';

    protected $fillable = [
        'bid_id',
        'product_id',
        'buyer_id',
        'farmer_id',
        'final_price',
        'delivery_address',
        'delivery_state',
        'delivery_city',
        'delivery_phone',
        'pickup_location',
        'pickup_state',
        'pickup_city',
        'pickup_phone',
        'status', // 'pending_details', 'confirmed'
    ];

    protected $casts = [
        'final_price' => 'float',
    ];

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }

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
