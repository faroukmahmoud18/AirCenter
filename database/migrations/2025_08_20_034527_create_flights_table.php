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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('balloon_id')->constrained('balloons');
            $table->foreignId('pilot_id')->constrained('pilots');
            $table->enum('flight_type', ['sunrise_1', 'sunrise_2']);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('duration')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'canceled'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
