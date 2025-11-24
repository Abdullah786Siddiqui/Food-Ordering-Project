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
        Schema::create('deliver_partner_locations', function (Blueprint $table) {
            $table->id();
              $table->foreignId('delivery_partner_id')
                  ->constrained('delivery_partners')   // table name
                  ->onDelete('cascade');
             $table->foreignId('city_id')->nullable() ->constrained() ->onDelete('set null');
            $table->foreignId('province_id') ->nullable() ->constrained()->onDelete('set null');
            $table->text('address')->nullable();
            $table->text('locality')->nullable();
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
        Schema::dropIfExists('deliver_partner_locations');
    }
};
