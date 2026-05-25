<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_image',
        'phone',
        'state',
        'city',
        'farm_name',
        'business_name',
        'is_profile_setup'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_profile_setup' => 'boolean'
        ];
    }

    public function getProfileImageAttribute($value)
    {
        if ($value) {
            return str_replace('/images/', '/Images/', $value);
        }
        return $value;
    }
}
