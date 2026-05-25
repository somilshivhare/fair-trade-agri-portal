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

    public function getImageUrlAttribute()
    {
        $cropName = $this->crop_name;
        $predefinedCrops = [
            'Grains' => ['Wheat', 'Rice', 'Maize', 'Barley', 'Jowar', 'Bajra', 'Ragi'],
            'Vegetables' => ['Tomato', 'Potato', 'Onion', 'Cabbage', 'Cauliflower', 'Brinjal', 'Okra', 'Carrot', 'Spinach', 'Peas'],
            'Fruits' => ['Mango', 'Banana', 'Apple', 'Orange', 'Grapes', 'Papaya', 'Guava', 'Pomegranate'],
            'Pulses' => ['Arhar', 'Moong', 'Urad', 'Chana', 'Masoor']
        ];

        $category = 'Grains';
        foreach ($predefinedCrops as $cat => $crops) {
            foreach ($crops as $c) {
                if (strcasecmp($c, $cropName) === 0) {
                    $category = $cat;
                    break 2;
                }
            }
        }

        $dir = public_path("Images/{$category}");
        if (is_dir($dir)) {
            $files = scandir($dir);
            $cropNameLower = strtolower($cropName);
            $variations = [
                $cropNameLower,
                $cropNameLower . 's',
                rtrim($cropNameLower, 's'),
                str_replace(' ', '', $cropNameLower),
            ];
            foreach ($files as $file) {
                if ($file === '.' || $file === '..') continue;
                $fileNameWithoutExt = strtolower(pathinfo($file, PATHINFO_FILENAME));
                if (in_array($fileNameWithoutExt, $variations)) {
                    return "/Images/{$category}/{$file}";
                }
            }
        }

        return "/Images/crops/" . strtolower($cropName) . ".jpg";
    }
}
