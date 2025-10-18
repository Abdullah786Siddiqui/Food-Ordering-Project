<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\DeliveryPartner;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        Restaurant::create([
            'name' => 'hamza',
            'email' => 'hamza@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DeliveryPartner::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
