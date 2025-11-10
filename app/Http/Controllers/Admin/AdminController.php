<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPartner;
use App\Models\Restaurant;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers   = User::count();
        $totaldeliverypartner  = DeliveryPartner::count();
        $totalRestaurant  = Restaurant::count();


        return view('Admin.dashboard', compact(
            'totalUsers',
            'totaldeliverypartner',
            'totalRestaurant'
        ));
    }
}
