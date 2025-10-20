<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\City;
use App\Models\DeliveryPartner;
use App\Models\Province;
use App\Models\Restaurant;
use App\Models\RestaurantLocation;
use App\Models\RestaurantTiming;
use App\Models\User;
use App\Models\UserLocation;
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

        $province = Province::create([
            'province_name' => 'sindh',
            'status' => 'inactive',
        ]);

        $city =  City::create([
            'province_id' => $province->id,
            'city_name' => 'karachi',
            'status' => 'inactive',

        ]);

        $user = User::create([
            'full_name' => 'user',
            'email' => 'user@gmail.com',
            'phone_number' => '03160116389',
            'status' => 'inactive',
            'password' => Hash::make('123')
        ]);

        UserLocation::create([
            'user_id' => $user->id,
            'city_id' => $city->id,
            'address' => 'Suujani sector L-1 plot L-8',
            'country' => 'Pakistan',
            'latitude' => '25.0102241',
            'longitude' => '67.0628654',
            'is_primary' => true,
            'is_current' => true,
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $restaurant = Restaurant::create([
            'name' => 'Pizza Max',
            'email' => 'pizzamax@gmail.com',
            'phone_number' => '03160116389',
            'image' => 'restaurants/restaurant1.jpg',
            'status' => 'inactive',
            'rating' => 4.7,
            'password' => Hash::make('123'),
        ]);

        $res_location = RestaurantLocation::create([
            'restaurant_id' => $restaurant->id,
            'city_id' => 1,
            'province_id' => 1,
            'address' => 'noth karachi sector 5-D plot-208',
            'locality' => 'north Karachi',
            'latitude' => '25.0115000',
            'longitude' => '67.0640000'
        ]);

        RestaurantTiming::create([
            'restaurant_location_id' => $res_location->id,
            'week_day' => 'Moday to Sunday',
            'opening_time' => '09:00:00',
            'closing_time' => '21:00:00',

        ]);


        DeliveryPartner::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'cnic' => '4240179256693',
            'phone_number' => '03160116389',
            'dob'=> '1998-05-12',
            'password' => Hash::make('123'),
        ]);

        
    }
}
