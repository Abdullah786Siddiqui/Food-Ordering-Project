<?php


namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;

class RestaurentController extends Controller
{
      public function index (){
        return view('Restaurant.dashboard');
    }
}
