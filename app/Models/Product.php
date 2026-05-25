<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'crop_name',
        'quantity',
        'base_price',
        'location',
        'user_id',
        'status', // 'active', 'sold'
    ];

    protected $casts = [
        'quantity' => 'float',
        'base_price' => 'float',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
