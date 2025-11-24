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
        Schema::create('restaurant_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->foreignId('city_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->foreignId('province_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->text('address')->nullable();
            $table->text('locality')->nullable();
            $table->string('branch_email')->unique();
            $table->string('branch_phone_number', 20)->nullable();
            $table->boolean('is_main')->default(false);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_locations');
    }
};
