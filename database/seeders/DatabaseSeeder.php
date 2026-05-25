<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clean existing collections in MongoDB
        User::truncate();
        Product::truncate();
        DB::table('bids')->truncate();
        DB::table('deals')->truncate();
        DB::table('notifications')->truncate();

        // Create Farmer
        $farmer = User::create([
            'name' => 'Rajesh Kumar',
            'email' => 'farmer@example.com',
            'password' => Hash::make('password'),
            'role' => 'farmer',
            'farm_name' => 'Hindustan Organic Farms',
            'phone' => '+91 98765 11111',
            'state' => 'Punjab',
            'city' => 'Amritsar',
            'is_profile_setup' => true,
        ]);

        // Create Buyer
        $buyer = User::create([
            'name' => 'Vikram Shah',
            'email' => 'buyer@example.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
            'business_name' => 'Apex Food Imports',
            'phone' => '+91 98765 22222',
            'state' => 'Maharashtra',
            'city' => 'Mumbai',
            'is_profile_setup' => true,
        ]);

        // Create some initial listings
        Product::create([
            'crop_name' => 'Wheat',
            'quantity' => 120.0,
            'base_price' => 2200.0,
            'location' => 'Amritsar Mandi, Punjab',
            'user_id' => $farmer->id,
            'status' => 'active',
        ]);

        Product::create([
            'crop_name' => 'Tomato',
            'quantity' => 45.0,
            'base_price' => 1800.0,
            'location' => 'Nasik Market, Maharashtra',
            'user_id' => $farmer->id,
            'status' => 'active',
        ]);

        Product::create([
            'crop_name' => 'Mango',
            'quantity' => 80.0,
            'base_price' => 4500.0,
            'location' => 'Ratnagiri Farms, Maharashtra',
            'user_id' => $farmer->id,
            'status' => 'active',
        ]);

        Product::create([
            'crop_name' => 'Chana',
            'quantity' => 95.0,
            'base_price' => 3100.0,
            'location' => 'Indore Mandi, Madhya Pradesh',
            'user_id' => $farmer->id,
            'status' => 'active',
        ]);

        $this->command->info('Database seeded successfully! Credentials:');
        $this->command->info('Farmer: farmer@example.com / password');
        $this->command->info('Buyer: buyer@example.com / password');
    }
}
