<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. MSP (Minimum Support Price) Records
        Schema::create('msp_prices', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('commodity');
            $blueprint->decimal('price_per_quintal', 12, 2);
            $blueprint->string('season'); // e.g., Kharif, Rabi
            $blueprint->string('year');   // e.g., 2024-25
            $blueprint->boolean('is_active')->default(true);
            $blueprint->timestamps();
        });

        // 2. Government Tenders
        Schema::create('tenders', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('tender_number')->unique();
            $blueprint->string('agency_name'); // e.g., FCI, NAFED
            $blueprint->string('commodity');
            $blueprint->decimal('target_quantity', 15, 2);
            $blueprint->decimal('fulfilled_quantity', 15, 2)->default(0);
            $blueprint->decimal('price_per_unit', 12, 2);
            $blueprint->string('location_state');
            $blueprint->string('procurement_center');
            $blueprint->dateTime('deadline');
            $blueprint->enum('status', ['open', 'closed', 'cancelled'])->default('open');
            $blueprint->text('description')->nullable();
            $blueprint->timestamps();
        });

        // 3. Procurements (Farmer Sales to Government/Agencies)
        Schema::create('procurements', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('receipt_number')->unique();
            $blueprint->foreignId('farmer_id')->constrained('users')->onDelete('cascade');
            $blueprint->foreignId('tender_id')->nullable()->constrained('tenders')->onDelete('set null');
            $blueprint->string('commodity');
            $blueprint->decimal('quantity', 15, 2);
            $blueprint->decimal('price_per_unit', 12, 2);
            $blueprint->decimal('total_amount', 15, 2);
            $blueprint->string('quality_grade')->nullable(); // e.g., Grade A, Grade B
            $blueprint->enum('status', ['pending', 'approved', 'rejected', 'payment_initiated', 'completed'])->default('pending');
            $blueprint->string('payment_reference')->nullable();
            $blueprint->dateTime('procured_at')->nullable();
            $blueprint->timestamps();
        });

        // 4. Warehouses & Storage
        Schema::create('warehouses', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('name');
            $blueprint->string('agency_owner');
            $blueprint->string('location_state');
            $blueprint->string('location_district');
            $blueprint->decimal('total_capacity', 15, 2);
            $blueprint->decimal('current_stock', 15, 2)->default(0);
            $blueprint->enum('status', ['available', 'full', 'maintenance'])->default('available');
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('procurements');
        Schema::dropIfExists('tenders');
        Schema::dropIfExists('msp_prices');
    }
};
