<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Deal extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'deals';

    protected $fillable = [
        'deal_id',
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

    protected static function booted()
    {
        static::creating(function ($deal) {
            $deal->deal_id = self::generateUniqueDealId();
        });
    }

    private static function generateUniqueDealId()
    {
        do {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $dealId = 'AGRI-' . $randomString;
        } while (self::where('deal_id', $dealId)->exists());

        return $dealId;
    }

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
