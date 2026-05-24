<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class MarketPrice extends Model
{
    
    protected $table = 'market_prices';

    protected $fillable = [
        'commodity', 'variety', 'market', 'state', 'district',
        'min_price', 'max_price', 'modal_price',
        'arrival_quantity', 'price_date',
    ];

    protected function casts(): array
    {
        return [
            'min_price'        => 'float',
            'max_price'        => 'float',
            'modal_price'      => 'float',
            'arrival_quantity' => 'float',
            'price_date'       => 'datetime',
        ];
    }

    public function scopeLatest($q)               { return $q->orderBy('price_date', 'desc'); }
    public function scopeByCommodity($q, $name)   { return $q->where('commodity', $name); }
    public function scopeToday($q)                { return $q->whereDate('price_date', today()); }

    // ── Seed / fallback data ──────────────────────────────────────────────────
    public static function fallbackPrices(): array
    {
        return [
            ['commodity' => 'Wheat',   'modal_price' => 2450, 'trend' => 'up'],
            ['commodity' => 'Rice',    'modal_price' => 3200, 'trend' => 'down'],
            ['commodity' => 'Tomato',  'modal_price' => 40,   'trend' => 'up'],
            ['commodity' => 'Onion',   'modal_price' => 25,   'trend' => 'up'],
            ['commodity' => 'Potato',  'modal_price' => 18,   'trend' => 'down'],
            ['commodity' => 'Turmeric','modal_price' => 8500, 'trend' => 'up'],
        ];
    }
}
