<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'agency_owner', 'location_state', 'location_district', 
        'total_capacity', 'current_stock', 'status'
    ];
}
