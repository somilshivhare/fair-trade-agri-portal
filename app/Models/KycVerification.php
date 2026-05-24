<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class KycVerification extends Model
{
    
    protected $table = 'kyc_verifications';

    protected $fillable = [
        'user_id', 'aadhar_number',
        'aadhar_front_image', 'aadhar_back_image', 'passport_photo',
        'status', 'rejection_reason', 'verified_by', 'verified_at',
    ];

    protected function casts(): array
    {
        return ['verified_at' => 'datetime'];
    }

    const STATUSES = ['pending', 'verified', 'rejected'];

    public function scopePending($q)  { return $q->where('status', 'pending'); }
    public function scopeVerified($q) { return $q->where('status', 'verified'); }

    public function user()       { return $this->belongsTo(User::class, 'user_id'); }
    public function verifiedBy() { return $this->belongsTo(User::class, 'verified_by'); }
}
