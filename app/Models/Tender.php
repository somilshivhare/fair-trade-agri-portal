<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'tender_number', 'agency_name', 'commodity', 'target_quantity', 
        'fulfilled_quantity', 'price_per_unit', 'location_state', 
        'procurement_center', 'deadline', 'status', 'description'
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function procurements()
    {
        return $this->hasMany(Procurement::class);
    }
}
