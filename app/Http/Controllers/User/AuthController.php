<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   


    public function showLoginForm()
    {
        return view('Website.auth.login');
    }

    public function showRegisterForm()
    {
        return view('Website.auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            /** @var \App\Models\User|null $user */
            $user = Auth::guard('web')->user();
            if ($user->status === 'inactive') {
                $user->update(['status' => 'active']);
            }
            return redirect()->route('user.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function register(Request $request)
    {
        // 1️⃣ Validation
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 2️⃣ Create new user
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3️⃣ Auto-login after registration
        Auth::guard('web')->login($user);

        // 4️⃣ Redirect to home
        return redirect()->route('user.home');
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::guard('web')->user();
        if ($user) {
            $user->update(['status' => 'inactive']);
        }
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }
}
