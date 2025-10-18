<?php

namespace App\Http\Controllers\Delivery_partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Delivery_partner.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('delivery_partner')->attempt($credentials)) {
            return redirect()->route('delivery.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('delivery_partner')->logout();
          $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('delivery.login');
    }
}

