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
        // MongoDB indexes are created using the Schema builder or raw commands
        Schema::connection('mongodb')->table('market_prices', function (Blueprint $collection) {
            $collection->index('commodity');
            $collection->index('state');
            $collection->index('price_date');
            $collection->index(['commodity', 'variety', 'market', 'price_date']);
        });

        Schema::connection('mongodb')->table('products', function (Blueprint $collection) {
            $collection->index('category');
            $collection->index('location.state');
            $collection->index('price');
            $collection->index('status');
        });

        Schema::connection('mongodb')->table('notifications', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('is_read');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('market_prices', function (Blueprint $collection) {
            $collection->dropIndex(['commodity']);
            $collection->dropIndex(['state']);
            $collection->dropIndex(['price_date']);
        });
    }
};
