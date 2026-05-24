<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class MspPrice extends Model
{
    use HasFactory;

    protected $fillable = ['commodity', 'price_per_quintal', 'season', 'year', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
