<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Restaurant.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('restaurant')->attempt($credentials)) {
        /** @var \App\Models\Restaurant|null $restaurant */
            $restaurant = Auth::guard('restaurant')->user();
            if ($restaurant && $restaurant->status === 'inactive') {
                $restaurant->update(['status' => 'active']);
            }
            return redirect()->route('restaurant.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\Restaurant|null $restaurant */
        $restaurant = Auth::guard('restaurant')->user();
        if ($restaurant) {
            $restaurant->update(['status' => 'inactive']);
        }
        Auth::guard('restaurant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('restaurant.login');
    }
}
