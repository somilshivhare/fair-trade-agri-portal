<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id')->nullable();
            $table->string('name');
            $table->string('category');
            $table->string('variety')->nullable();
            $table->float('quantity');
            $table->string('unit');
            $table->float('price');
            $table->string('quality');
            $table->dateTime('harvest_date');
            $table->text('location')->nullable(); 
            $table->text('images')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('available');
            $table->timestamps();
        });

        Schema::create('market_prices', function (Blueprint $table) {
            $table->id();
            $table->string('commodity');
            $table->string('variety')->nullable();
            $table->string('market')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->float('min_price')->nullable();
            $table->float('max_price')->nullable();
            $table->float('modal_price');
            $table->float('arrival_quantity')->nullable();
            $table->string('trend')->nullable();
            $table->dateTime('price_date');
            $table->timestamps();
        });

        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('farmer_id')->nullable();
            $table->float('bid_price');
            $table->float('quantity');
            $table->float('total_amount');
            $table->string('delivery_location')->nullable();
            $table->float('transport_cost')->default(0);
            $table->string('status')->default('pending');
            $table->float('counter_price')->nullable();
            $table->text('counter_message')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('transporter_id')->nullable();
            $table->string('order_number')->unique();
            $table->float('total_amount');
            $table->float('transport_cost')->default(0);
            $table->string('order_status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('tracking_id')->nullable();
            $table->string('courier_name')->nullable();
            $table->dateTime('estimated_delivery')->nullable();
            $table->text('timeline')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('transport_details')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->string('title')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->text('data')->nullable();
            $table->timestamps();
        });

        Schema::create('kyc_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('aadhar_number')->nullable();
            $table->string('aadhar_front_image')->nullable();
            $table->string('aadhar_back_image')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('status')->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_verifications');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('bids');
        Schema::dropIfExists('market_prices');
        Schema::dropIfExists('products');
    }
};
