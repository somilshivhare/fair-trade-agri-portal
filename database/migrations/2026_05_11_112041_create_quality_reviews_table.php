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
        Schema::create('quality_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('batch_number')->unique();
            $table->string('authority_name')->nullable();
            $table->string('parameter_name')->default('Moisture Content');
            $table->float('measured_value');
            $table->string('permissible_range')->default('10.0% - 13.5%');
            $table->integer('quality_score')->default(0);
            $table->text('review_notes')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('documents')->nullable(); // JSON list of files
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_reviews');
    }
};
