<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index (){
         return view('Website.index');
    }

public function setlocation(Request $request)
{
    $userId = Auth::guard('web')->id();

    $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'city' => 'required|string'
    ]);

    // Name se ID fetch karo
    $city = City::where('city_name', 'like' , $request->city)->first();

    if (!$city) {
        return response()->json(['status' => 'error', 'message' => 'Invalid city or country name']);
    }

   $location = UserLocation::create([
    'user_id' => $userId,
    'latitude' => $request->latitude,
    'longitude' => $request->longitude,
    'city_id' => $city->id
]);


    return response()->json(['status' => 'success', 'data' => $location]);
}





}
