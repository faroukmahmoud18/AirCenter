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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained('flights');
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone', 50)->nullable();
            $table->integer('seats_reserved');
            $table->enum('status', ['confirmed', 'pending', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
