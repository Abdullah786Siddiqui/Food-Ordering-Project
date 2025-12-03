<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Restaurant;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function storeLocation(Request $request)
    {
        $location = $request->input('location'); 

        // Cookie set karein for 7 days
        $cookie = cookie('userlocation', json_encode($location), 60*24*7); // 7 days

       return redirect()->route('user.home')
        ->withCookie($cookie)
        ->with('location', $location) ; 
    }


  public function index(Request $request) {
   
    $restaurants = Restaurant::with('locations')->get();
    return view('Website.index', compact('restaurants'));
}

public function setLocation() {
    $restaurants = Restaurant::with('locations')->get();
    return view('Website.indexFood', compact('restaurants'));
}



// public function setlocation(Request $request)
// {
//     $userId = Auth::guard('web')->id();

//     $request->validate([
//         'latitude' => 'required|numeric',
//         'longitude' => 'required|numeric',
//         'city' => 'required|string'
//     ]);

//     // Name se ID fetch karo
//     $city = City::where('city_name', 'like' , $request->city)->first();

//     if (!$city) {
//         return response()->json(['status' => 'error', 'message' => 'Invalid city or country name']);
//     }

//    $location = UserLocation::create([
//     'user_id' => $userId,
//     'latitude' => $request->latitude,
//     'longitude' => $request->longitude,
//     'city_id' => $city->id
// ]);


//     return response()->json(['status' => 'success', 'data' => $location]);
// }


public function nearbyRestaurants(Request $request)
{
    $lat = $request->query('lat');
    $lng = $request->query('lng');

    $restaurants = Restaurant::with('locations')
        ->selectRaw("restaurants.*, 
            (6371 * acos(
                cos(radians(?)) 
                * cos(radians(locations.lat)) 
                * cos(radians(locations.lng) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(locations.lat))
            )) AS distance", [$lat, $lng, $lat])
        ->join('locations', 'locations.restaurant_id', '=', 'restaurants.id')
        ->orderBy('distance', 'asc')
        ->get();

    return response()->json($restaurants);
}






}
