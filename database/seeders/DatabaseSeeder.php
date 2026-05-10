<?php

namespace Database\Seeders;

use App\Models\{MarketPrice, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(['email' => 'admin@agrimandi.in'], [
            'name'             => 'AgriMandi Admin',
            'email'            => 'admin@agrimandi.in',
            'password'         => Hash::make('admin123'),
            'role'             => 'admin',
            'phone'            => '9999999999',
            'is_kyc_verified'  => true,
            'is_active'        => true,
        ]);

        // Demo farmer
        User::updateOrCreate(['email' => 'farmer@agrimandi.in'], [
            'name'             => 'Rajesh Kumar (Demo Farmer)',
            'email'            => 'farmer@agrimandi.in',
            'password'         => Hash::make('farmer123'),
            'role'             => 'farmer',
            'phone'            => '9876543210',
            'state'            => 'Punjab',
            'district'         => 'Ludhiana',
            'pincode'          => '141001',
            'is_kyc_verified'  => true,
            'is_active'        => true,
        ]);

        // Demo buyer
        User::updateOrCreate(['email' => 'buyer@agrimandi.in'], [
            'name'             => 'Priya Sharma (Demo Buyer)',
            'email'            => 'buyer@agrimandi.in',
            'password'         => Hash::make('buyer123'),
            'role'             => 'buyer',
            'phone'            => '9876500000',
            'state'            => 'Delhi',
            'district'         => 'New Delhi',
            'pincode'          => '110001',
            'is_kyc_verified'  => false,
            'is_active'        => true,
        ]);

        // Seed market prices
        foreach (MarketPrice::fallbackPrices() as $row) {
            MarketPrice::updateOrCreate(
                ['commodity' => $row['commodity'], 'price_date' => today()],
                array_merge($row, [
                    'market'      => 'Default',
                    'state'       => 'All',
                    'min_price'   => $row['modal_price'] * 0.9,
                    'max_price'   => $row['modal_price'] * 1.1,
                    'modal_price' => $row['modal_price'],
                    'price_date'  => today(),
                ])
            );
        }

        $this->command->info('✅ Seeded: admin@agrimandi.in / admin123');
        $this->command->info('✅ Seeded: farmer@agrimandi.in / farmer123');
        $this->command->info('✅ Seeded: buyer@agrimandi.in / buyer123');
    }
}
