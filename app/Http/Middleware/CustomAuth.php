<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {
        // Check if current guard is logged in
        if (!Auth::guard($guard)->check()) {

            // Check if *any* other guard is logged in (admin, restaurant, delivery, user)
            if (!$this->isAuthenticated($request)) {
                // No one logged in at all -> send to login page
                return redirect()->route('user.login');
            }

            // Someone else is logged in, but not this guard -> 403 Forbidden
            return abort(403, 'Unauthorized access');
        }

      

        // If correct guard is authenticated, continue
        return $next($request);
    }

    /**
     * Check if any guard (admin, restaurant, delivery, user) is authenticated.
     */
    private function isAuthenticated(Request $request): bool
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) {
                return true;
            }
        }

        return false;
    }
}
