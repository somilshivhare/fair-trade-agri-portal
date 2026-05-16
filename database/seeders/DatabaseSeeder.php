<?php

namespace Database\Seeders;

use App\Models\{Bid, MarketPrice, Notification, Order, Product, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Core Users ────────────────────────────────────────────────────
        $admin = User::updateOrCreate(['email' => 'admin@agrimandi.in'], [
            'name'            => 'AgriMandi Admin',
            'email'           => 'admin@agrimandi.in',
            'password'        => Hash::make('admin123'),
            'role'            => 'admin',
            'phone'           => '9999999999',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        $farmer1 = User::updateOrCreate(['email' => 'farmer@agrimandi.in'], [
            'name'            => 'Viraj Kumar',
            'email'           => 'farmer@agrimandi.in',
            'password'        => Hash::make('farmer123'),
            'role'            => 'farmer',
            'phone'           => '9876543210',
            'state'           => 'Punjab',
            'district'        => 'Ludhiana',
            'pincode'         => '141001',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        $farmer2 = User::updateOrCreate(['email' => 'farmer2@agrimandi.in'], [
            'name'            => 'Suresh Patel',
            'email'           => 'farmer2@agrimandi.in',
            'password'        => Hash::make('farmer123'),
            'role'            => 'farmer',
            'phone'           => '9812345678',
            'state'           => 'Gujarat',
            'district'        => 'Rajkot',
            'pincode'         => '360001',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        $farmer3 = User::updateOrCreate(['email' => 'farmer3@agrimandi.in'], [
            'name'            => 'Anita Devi',
            'email'           => 'farmer3@agrimandi.in',
            'password'        => Hash::make('farmer123'),
            'role'            => 'farmer',
            'phone'           => '9765432100',
            'state'           => 'Madhya Pradesh',
            'district'        => 'Sehore',
            'pincode'         => '466001',
            'is_kyc_verified' => false,
            'is_active'       => true,
        ]);

        $buyer1 = User::updateOrCreate(['email' => 'buyer@agrimandi.in'], [
            'name'            => 'Priya Sharma',
            'email'           => 'buyer@agrimandi.in',
            'password'        => Hash::make('buyer123'),
            'role'            => 'buyer',
            'phone'           => '9876500000',
            'state'           => 'Delhi',
            'district'        => 'New Delhi',
            'pincode'         => '110001',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        $buyer2 = User::updateOrCreate(['email' => 'buyer2@agrimandi.in'], [
            'name'            => 'Amit Agarwal',
            'email'           => 'buyer2@agrimandi.in',
            'password'        => Hash::make('buyer123'),
            'role'            => 'buyer',
            'phone'           => '9812000001',
            'state'           => 'Maharashtra',
            'district'        => 'Mumbai',
            'pincode'         => '400001',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        $transporter1 = User::updateOrCreate(['email' => 'transporter@agrimandi.in'], [
            'name'            => 'Gopal Logistics',
            'email'           => 'transporter@agrimandi.in',
            'password'        => Hash::make('transporter123'),
            'role'            => 'transporter',
            'phone'           => '9912345678',
            'state'           => 'Punjab',
            'district'        => 'Ludhiana',
            'pincode'         => '141001',
            'is_kyc_verified' => true,
            'is_active'       => true,
        ]);

        // ── 2. Demo Products ─────────────────────────────────────────────────
        $products = [
            [
                'farmer_id'    => $farmer1->id,
                'name'         => 'Premium Sharbati Wheat',
                'category'     => 'grains',
                'variety'      => 'Sharbati',
                'quantity'     => 500,
                'unit'         => 'quintal',
                'price'        => 2650,
                'quality'      => 'A',
                'status'       => 'available',
                'harvest_date' => now()->subDays(10)->toDateString(),
                'description'  => 'High-quality Sharbati wheat from Punjab. Excellent for flour milling. Pesticide-free farming.',
                'location'     => ['state' => 'Punjab', 'district' => 'Ludhiana', 'mandi' => 'Ludhiana Mandi', 'pincode' => '141001'],
                'images'       => [],
            ],
            [
                'farmer_id'    => $farmer1->id,
                'name'         => 'Basmati Rice 1121',
                'category'     => 'grains',
                'variety'      => '1121',
                'quantity'     => 200,
                'unit'         => 'quintal',
                'price'        => 7200,
                'quality'      => 'A',
                'status'       => 'available',
                'harvest_date' => now()->subDays(15)->toDateString(),
                'description'  => 'Export-quality Basmati 1121. Long grain, aromatic. Well-dried and sorted.',
                'location'     => ['state' => 'Punjab', 'district' => 'Amritsar', 'mandi' => 'Amritsar Mandi', 'pincode' => '143001'],
                'images'       => [],
            ],
            [
                'farmer_id'    => $farmer2->id,
                'name'         => 'Organic Cotton',
                'category'     => 'cash_crops',
                'variety'      => 'Long Staple',
                'quantity'     => 80,
                'unit'         => 'quintal',
                'price'        => 8500,
                'quality'      => 'A',
                'status'       => 'available',
                'harvest_date' => now()->subDays(5)->toDateString(),
                'description'  => 'Certified organic long-staple cotton from Gujarat. 34mm average staple length.',
                'location'     => ['state' => 'Gujarat', 'district' => 'Rajkot', 'mandi' => 'Rajkot APMC', 'pincode' => '360001'],
                'images'       => [],
            ],
            [
                'farmer_id'    => $farmer2->id,
                'name'         => 'Groundnut (Bold)',
                'category'     => 'oilseeds',
                'variety'      => 'Bold',
                'quantity'     => 150,
                'unit'         => 'quintal',
                'price'        => 5800,
                'quality'      => 'A',
                'status'       => 'available',
                'harvest_date' => now()->subDays(20)->toDateString(),
                'description'  => 'Bold-type groundnut pods from Gujarat. Oil content 48%. Clean and machine-sorted.',
                'location'     => ['state' => 'Gujarat', 'district' => 'Junagadh', 'mandi' => 'Junagadh APMC', 'pincode' => '362001'],
                'images'       => [],
            ],
            [
                'farmer_id'    => $farmer3->id,
                'name'         => 'Yellow Soybean',
                'category'     => 'oilseeds',
                'variety'      => 'JS-335',
                'quantity'     => 300,
                'unit'         => 'quintal',
                'price'        => 4650,
                'quality'      => 'B',
                'status'       => 'available',
                'harvest_date' => now()->subDays(8)->toDateString(),
                'description'  => 'Non-GMO JS-335 soybean from Madhya Pradesh. Moisture under 12%. Ready for crushing or export.',
                'location'     => ['state' => 'Madhya Pradesh', 'district' => 'Sehore', 'mandi' => 'Sehore APMC', 'pincode' => '466001'],
                'images'       => [],
            ],
            [
                'farmer_id'    => $farmer3->id,
                'name'         => 'Red Chilli (Guntur)',
                'category'     => 'spices',
                'variety'      => 'Teja S17',
                'quantity'     => 40,
                'unit'         => 'quintal',
                'price'        => 18000,
                'quality'      => 'A',
                'status'       => 'available',
                'harvest_date' => now()->subDays(3)->toDateString(),
                'description'  => 'Teja S17 dry red chilli. Pungency 100,000 SHU. Export quality. Well-dried.',
                'location'     => ['state' => 'Madhya Pradesh', 'district' => 'Khargone', 'mandi' => 'Khargone APMC', 'pincode' => '451001'],
                'images'       => [],
            ],
        ];

        $createdProducts = [];
        foreach ($products as $productData) {
            $existing = Product::where('name', $productData['name'])
                               ->where('farmer_id', $productData['farmer_id'])
                               ->first();
            if (!$existing) {
                $createdProducts[] = Product::create($productData);
            } else {
                $createdProducts[] = $existing;
            }
        }

        // ── 3. Demo Bids ─────────────────────────────────────────────────────
        if (count($createdProducts) >= 2) {
            $wheat = $createdProducts[0];
            $rice  = $createdProducts[1];

            // Bid 1: Active pending bid on wheat
            $bid1 = Bid::firstOrCreate(
                ['product_id' => $wheat->id, 'buyer_id' => $buyer1->id],
                [
                    'farmer_id'         => $wheat->farmer_id,
                    'bid_price'         => 2580,
                    'quantity'          => 100,
                    'total_amount'      => 258000 + 1500,
                    'delivery_location' => '110001',
                    'transport_cost'    => 1500,
                    'message'           => 'Looking for regular supply. Can offer advance payment.',
                    'status'            => 'pending',
                    'expires_at'        => now()->addHours(48),
                ]
            );

            // Bid 2: Accepted bid on rice → creates order
            $bid2 = Bid::firstOrCreate(
                ['product_id' => $rice->id, 'buyer_id' => $buyer2->id],
                [
                    'farmer_id'         => $rice->farmer_id,
                    'bid_price'         => 7100,
                    'quantity'          => 50,
                    'total_amount'      => 355000 + 2000,
                    'delivery_location' => '400001',
                    'transport_cost'    => 2000,
                    'message'           => 'Need for export. Require phytosanitary certificate.',
                    'status'            => 'accepted',
                    'expires_at'        => now()->addDays(3),
                ]
            );

            // Create order from accepted bid
            Order::firstOrCreate(
                ['bid_id' => $bid2->id],
                [
                    'product_id'     => $rice->id,
                    'buyer_id'       => $buyer2->id,
                    'farmer_id'      => $rice->farmer_id,
                    'transporter_id' => $transporter1->id,
                    'order_number'   => 'ORD-' . strtoupper(Str::random(8)),
                    'total_amount'   => 357000,
                    'transport_cost' => 2000,
                    'order_status'   => 'confirmed',
                    'payment_status' => 'pending',
                    'timeline'       => [
                        ['status' => 'Order Placed', 'note' => 'Bid accepted by farmer', 'at' => now()->subDay()->toIso8601String()],
                        ['status' => 'Confirmed',    'note' => 'Payment pending',        'at' => now()->subHours(20)->toIso8601String()],
                    ],
                ]
            );

            // Bid 3: countered
            if (count($createdProducts) >= 3) {
                $cotton = $createdProducts[2];
                Bid::firstOrCreate(
                    ['product_id' => $cotton->id, 'buyer_id' => $buyer1->id],
                    [
                        'farmer_id'         => $cotton->farmer_id,
                        'bid_price'         => 8200,
                        'quantity'          => 30,
                        'total_amount'      => 246000 + 1800,
                        'delivery_location' => '110001',
                        'transport_cost'    => 1800,
                        'message'           => 'Interested in bulk. Can negotiate.',
                        'status'            => 'countered',
                        'counter_price'     => 8400,
                        'counter_message'   => 'Best I can do given current market rates.',
                        'expires_at'        => now()->addDays(2),
                    ]
                );
            }
        }

        // ── 4. Market Prices ─────────────────────────────────────────────────
        foreach (MarketPrice::fallbackPrices() as $row) {
            MarketPrice::updateOrCreate(
                ['commodity' => $row['commodity'], 'price_date' => today()],
                array_merge($row, [
                    'market'      => 'Default',
                    'state'       => 'All',
                    'min_price'   => round($row['modal_price'] * 0.9),
                    'max_price'   => round($row['modal_price'] * 1.1),
                    'modal_price' => $row['modal_price'],
                    'price_date'  => today(),
                ])
            );
        }

        // ── 5. Demo Notifications ────────────────────────────────────────────
        Notification::firstOrCreate(
            ['user_id' => $farmer1->id, 'type' => 'new_bid', 'title' => 'New Bid Received 🆕'],
            [
                'message'    => 'Priya Sharma placed ₹2,580/qtl bid on Premium Sharbati Wheat',
                'is_read'    => false,
                'data'       => ['bid_id' => 'demo'],
            ]
        );

        Notification::firstOrCreate(
            ['user_id' => $buyer2->id, 'type' => 'bid_accepted', 'title' => 'Bid Accepted! 🎉'],
            [
                'message' => 'Your bid on Basmati Rice 1121 was accepted. Order created.',
                'is_read' => false,
                'data'    => ['order_id' => 'demo'],
            ]
        );

        // ── 7. MSP Prices ────────────────────────────────────────────────────
        $mspData = [
            ['commodity' => 'Wheat', 'price_per_quintal' => 2275, 'season' => 'Rabi', 'year' => '2024-25'],
            ['commodity' => 'Paddy (Common)', 'price_per_quintal' => 2183, 'season' => 'Kharif', 'year' => '2023-24'],
            ['commodity' => 'Paddy (Grade A)', 'price_per_quintal' => 2203, 'season' => 'Kharif', 'year' => '2023-24'],
            ['commodity' => 'Maize', 'price_per_quintal' => 2090, 'season' => 'Kharif', 'year' => '2023-24'],
            ['commodity' => 'Cotton (Long Staple)', 'price_per_quintal' => 7020, 'season' => 'Kharif', 'year' => '2023-24'],
            ['commodity' => 'Soybean (Yellow)', 'price_per_quintal' => 4600, 'season' => 'Kharif', 'year' => '2023-24'],
        ];

        foreach ($mspData as $msp) {
            \App\Models\MspPrice::updateOrCreate(
                ['commodity' => $msp['commodity'], 'year' => $msp['year']],
                $msp
            );
        }

        // ── 8. Government Tenders ────────────────────────────────────────────
        $tenders = [
            [
                'tender_number'      => 'TND-FCI-2024-001',
                'agency_name'        => 'Food Corporation of India (FCI)',
                'commodity'          => 'Wheat',
                'target_quantity'    => 50000,
                'fulfilled_quantity' => 12500,
                'price_per_unit'     => 2275,
                'location_state'     => 'Punjab',
                'procurement_center' => 'Ludhiana Central Warehouse',
                'deadline'           => now()->addDays(30),
                'status'             => 'open',
            ],
            [
                'tender_number'      => 'TND-NAFED-2024-005',
                'agency_name'        => 'NAFED',
                'commodity'          => 'Soybean (Yellow)',
                'target_quantity'    => 20000,
                'fulfilled_quantity' => 8400,
                'price_per_unit'     => 4600,
                'location_state'     => 'Madhya Pradesh',
                'procurement_center' => 'Indore APMC Center',
                'deadline'           => now()->addDays(15),
                'status'             => 'open',
            ],
        ];

        foreach ($tenders as $tender) {
            \App\Models\Tender::updateOrCreate(
                ['tender_number' => $tender['tender_number']],
                $tender
            );
        }

        // ── 9. Warehouses ────────────────────────────────────────────────────
        $warehouses = [
            [
                'name'              => 'SWC Ludhiana Sector 4',
                'agency_owner'      => 'Punjab State Warehouse Corp',
                'location_state'    => 'Punjab',
                'location_district' => 'Ludhiana',
                'total_capacity'    => 100000,
                'current_stock'     => 45000,
                'status'            => 'available',
            ],
            [
                'name'              => 'CWC Indore Main',
                'agency_owner'      => 'Central Warehousing Corporation',
                'location_state'    => 'Madhya Pradesh',
                'location_district' => 'Indore',
                'total_capacity'    => 75000,
                'current_stock'     => 68000,
                'status'            => 'available',
            ],
        ];

        foreach ($warehouses as $wh) {
            \App\Models\Warehouse::updateOrCreate(
                ['name' => $wh['name']],
                $wh
            );
        }

        // ── Output Summary ───────────────────────────────────────────────────
        $this->command->newLine();
        $this->command->info('╔══════════════════════════════════════════════╗');
        $this->command->info('║        AgriMandi Demo Data Seeded ✅          ║');
        $this->command->info('╠══════════════════════════════════════════════╣');
        $this->command->info('║  👤 ADMIN  → admin@agrimandi.in / admin123   ║');
        $this->command->info('║  🌾 FARMER → farmer@agrimandi.in / farmer123 ║');
        $this->command->info('║  🛒 BUYER  → buyer@agrimandi.in / buyer123   ║');
        $this->command->info('║  🚛 TRANS  → transporter@agrimandi.in / transporter123 ║');
        $this->command->info('║  🌾 FARMER2→ farmer2@agrimandi.in / farmer123║');
        $this->command->info('║  🛒 BUYER2 → buyer2@agrimandi.in / buyer123  ║');
        $this->command->info('╠══════════════════════════════════════════════╣');
        $this->command->info('║  📦 Products: ' . count($createdProducts) . ' demo listings              ║');
        $this->command->info('║  💰 Bids: pending, accepted, countered       ║');
        $this->command->info('║  📋 Orders: 1 confirmed demo order           ║');
        $this->command->info('╚══════════════════════════════════════════════╝');
    }
}
