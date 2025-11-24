<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\City;
use App\Models\DeliverPartnerLocation;
use App\Models\DeliveryPartner;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Models\OrderPayment;
use App\Models\Province;
use App\Models\Restaurant;
use App\Models\RestaurantCategoryPivot;
use App\Models\RestaurantLocation;
use App\Models\RestaurantTiming;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Starter extends Seeder
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
            'gender' => 'male',
            'profile_image' => 'user/user1.jpeg',
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
            'profile_image' => 'admins/admin1.jpg',
            'password' => Hash::make('123'),
        ]);

        $restaurant = Restaurant::create([
            'name' => 'Kababjees',
            'email' => 'Kababjees@gmail.com',
            'image' => 'restaurants/restaurant1.jpg',
            'status' => 'inactive',
            'rating' => 4.9,
            'password' => Hash::make('123'),
        ]);

        $res_location = RestaurantLocation::create([
            'restaurant_id' => $restaurant->id,
            'city_id' => 1,
            'province_id' => 1,
            'address' => 'Bharia sector 5-D plot-208',
            'locality' => 'Bharia',
            'branch_phone_number' => '0360419389',
            'branch_email' => 'Kababjees@gmail.com',
            'latitude' => '25.0115000',
            'longitude' => '67.0640000',
            'is_main' => true
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
            'profile_image' => 'delivery_boy/delivery_boy.png',
            'dob' => '1998-05-12',
            'rating' => 4.7,
            'gender' => 'male',
            'password' => Hash::make('123')
        ]);

        DeliverPartnerLocation::create([
            'delivery_partner_id' => 1,
            'city_id' => 1,
            'province_id' => 1,
            'address' => 'noth karachi sector 5-D plot-208',
            'locality' => 'north Karachi',
            'latitude' => '25.0115000',
            'longitude' => '67.0640000'
        ]);

        $Category = Category::create([
            'category_name' => 'Haleem',
            'category_image' => 'category/haleem.jpg'
        ]);

        $menuItem = MenuItem::create([
            'restaurant_id' => 1,
            'category_id' => 1,
            'item_name' => 'beef Haleem',
            'description' => 'Spicy beef Haleem with Onion',
            'image_url' => 'menu/haleem.jpg',
            'price' => 450.00,
            'rating' => 4.7,
            'status' => 'active'
        ]);

        RestaurantCategoryPivot::create([
            'restaurant_id' => 1,
            'category_id' => 1
        ]);
      

        $order = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant->id,
            'delivery_partner_id' => 1,
            'total_amount' => 1000.00,
            'payment_mode' => 'COD',
            'payment_status' => 'paid',
            'status' => 'delivered',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menuItem->id,
            'product_name' => $menuItem->item_name,
            'price' => $menuItem->price,
            'quantity' => 2,
            'amount' => $menuItem->price * 2,
        ]);

        OrderAddress::create([
            'order_id' => $order->id,
            'address' => 'Sector L-1, Plot L-8, Karachi',
            'locality' => 'Surjani Town',
            'city_id' => $city->id,
            'latitude' => '25.0102241',
            'longitude' => '67.0628654',
        ]);

        OrderPayment::create([
            'order_id' => $order->id,
            'payment_mode' => 'COD',
            'payment_status' => 'success',
        ]);
    }
}
