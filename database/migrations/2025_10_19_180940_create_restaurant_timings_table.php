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
        Schema::create('restaurant_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_location_id')->constrained('restaurant_locations')->onDelete('cascade');
            $table->text('week_day');
            $table->time('opening_time');
            $table->time('closing_time');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_timings');
    }
};
