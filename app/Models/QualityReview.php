<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityReview extends Model
{
    protected $fillable = [
        'product_id', 'batch_number', 'authority_name',
        'parameter_name', 'measured_value', 'permissible_range',
        'quality_score', 'review_notes', 'status',
        'documents', 'reviewed_by', 'reviewed_at'
    ];

    protected $casts = [
        'documents'   => 'array',
        'reviewed_at' => 'datetime',
    ];

    public function product() { return $this->belongsTo(Product::class); }
    public function reviewer() { return $this->belongsTo(User::class, 'reviewed_by'); }

    public function scopePending($q) { return $q->where('status', 'pending'); }
}
