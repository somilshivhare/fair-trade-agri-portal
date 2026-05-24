<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_number', 'farmer_id', 'tender_id', 'commodity', 
        'quantity', 'price_per_unit', 'total_amount', 'quality_grade', 
        'status', 'payment_reference', 'procured_at'
    ];

    protected $casts = [
        'procured_at' => 'datetime',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }
}
