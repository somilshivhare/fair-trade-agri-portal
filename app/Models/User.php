<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable;

    
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone',
        'aadhar', 'is_kyc_verified', 'address',
        'state', 'district', 'pincode', 'avatar',
        'bank_name', 'bank_account', 'bank_ifsc',
        'rating', 'total_sold', 'is_active',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'is_kyc_verified' => 'boolean',
            'is_active'       => 'boolean',
            'rating'          => 'float',
            'total_sold'      => 'float',
        ];
    }

    // ── Scopes ────────────────────────────────────────────────────────────────
    public function scopeFarmer($query)  { return $query->where('role', 'farmer'); }
    public function scopeBuyer($query)   { return $query->where('role', 'buyer'); }
    public function scopeAdmin($query)   { return $query->where('role', 'admin'); }
    public function scopeKycVerified($q) { return $q->where('is_kyc_verified', true); }

    // ── Helpers ───────────────────────────────────────────────────────────────
    public function isFarmer(): bool { return $this->role === 'farmer'; }
    public function isBuyer(): bool  { return $this->role === 'buyer'; }
    public function isAdmin(): bool  { return $this->role === 'admin'; }

    // ── Relationships ─────────────────────────────────────────────────────────
    public function products()           { return $this->hasMany(Product::class, 'farmer_id'); }
    public function bidsPlaced()         { return $this->hasMany(Bid::class, 'buyer_id'); }
    public function bidsReceived()       { return $this->hasMany(Bid::class, 'farmer_id'); }
    public function orders()             { return $this->hasMany(Order::class, 'buyer_id'); }
    public function farmerOrders()       { return $this->hasMany(Order::class, 'farmer_id'); }
    public function notifications()      { return $this->hasMany(Notification::class, 'user_id'); }
    public function kycVerification()    { return $this->hasOne(KycVerification::class, 'user_id'); }
    public function unreadNotifications(){ return $this->notifications()->where('is_read', false); }
}
