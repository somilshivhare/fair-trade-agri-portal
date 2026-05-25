<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use App\Models\Bid;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BiddingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Clean MongoDB tables before each test
        User::truncate();
        Product::truncate();
        Bid::truncate();
    }

    public function test_user_registration_and_profile_setup()
    {
        $response = $this->post('/register', [
            'name' => 'Somil Buyer',
            'email' => 'somil_buyer@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'buyer',
        ]);

        $response->assertRedirect(route('profile.setup'));
        
        $user = User::where('email', 'somil_buyer@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('buyer', $user->role);
        $this->assertFalse($user->is_profile_setup);

        // Simulate login
        $this->actingAs($user);

        // Submit Profile Setup
        $setupResponse = $this->post('/profile/setup', [
            'phone' => '+91 9999999999',
            'state' => 'Maharashtra',
            'city' => 'Pune',
            'business_name' => 'Somil Wholesale Foods',
        ]);

        $setupResponse->assertRedirect(route('dashboard'));

        $user = $user->fresh();
        $this->assertTrue($user->is_profile_setup);
        $this->assertEquals('Somil Wholesale Foods', $user->business_name);
    }

    public function test_farmer_can_list_product_and_buyer_can_bid()
    {
        // 1. Create Farmer
        $farmer = User::create([
            'name' => 'Somil Farmer',
            'email' => 'somil_farmer@example.com',
            'password' => Hash::make('password123'),
            'role' => 'farmer',
            'farm_name' => 'Somil Organic Farms',
            'phone' => '+91 8888888888',
            'state' => 'Punjab',
            'city' => 'Ludhiana',
            'is_profile_setup' => true,
        ]);

        // 2. Create Buyer
        $buyer = User::create([
            'name' => 'Somil Buyer',
            'email' => 'somil_buyer@example.com',
            'password' => Hash::make('password123'),
            'role' => 'buyer',
            'business_name' => 'Somil Wholesale Foods',
            'phone' => '+91 9999999999',
            'state' => 'Maharashtra',
            'city' => 'Pune',
            'is_profile_setup' => true,
        ]);

        // 3. Farmer Lists a Product
        $this->actingAs($farmer);
        $listResponse = $this->post('/products', [
            'crop_name' => 'Wheat',
            'quantity' => 100,
            'base_price' => 2000,
            'location' => 'Ludhiana Mandi, Punjab',
        ]);

        $listResponse->assertRedirect(route('dashboard'));

        $product = Product::where('crop_name', 'Wheat')->first();
        $this->assertNotNull($product);
        $this->assertEquals(2000, $product->base_price);
        $this->assertEquals($farmer->id, $product->user_id);

        // 4. Buyer places a bid
        $this->actingAs($buyer);
        
        // Test validation: Bid must be higher than base price
        $badBidResponse = $this->post("/products/{$product->id}/bid", [
            'amount' => 1900,
        ]);
        $badBidResponse->assertSessionHasErrors('amount');

        // Place a valid bid
        $goodBidResponse = $this->post("/products/{$product->id}/bid", [
            'amount' => 2100,
        ]);
        $goodBidResponse->assertRedirect(route('dashboard', ['tab' => 'my-bids']));

        $bid = Bid::where('product_id', $product->id)->first();
        $this->assertNotNull($bid);
        $this->assertEquals(2100, $bid->amount);
        $this->assertEquals($buyer->id, $bid->buyer_id);
        $this->assertEquals('pending', $bid->status);
    }
}
