<?php


namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderPayment;
use Illuminate\Support\Facades\Auth;

class RestaurentController extends Controller
{
  public function index()
  {

    $restaurant = Auth::guard('restaurant')->user();
    $restaurantId = $restaurant->id;
    $totalOrder = Order::where('restaurant_id', $restaurantId)->count();
    $totalMenu = MenuItem::where('restaurant_id', $restaurantId)->count();
    $totalEarning = OrderPayment::whereHas('order', function ($q) use ($restaurantId) {
      $q->where('restaurant_id', $restaurantId);
    })->where('payment_status', 'success') 
      ->sum('amount');




    return view('Restaurant.dashboard', compact('totalOrder', 'restaurant', 'totalMenu', 'totalEarning'));
  }
}
