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
        Schema::create('delivery_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cnic', 15)->unique();
            $table->string('phone_number', 20)->unique();
            $table->date('dob')->nullable();
            $table->enum('vehical', ['bike', 'cycle'])->default('bike');
            $table->enum('status', ['inactive', 'active', 'blocked'])->default('inactive');
               $table->decimal('rating', 2, 1)
              ->default(0.0);
              
        $table->enum('gender', ['male', 'female', 'other'])
              ->nullable();
             $table->integer('total_deliveries')->default(0);
             $table->string('profile_image')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_partners');
    }
};
