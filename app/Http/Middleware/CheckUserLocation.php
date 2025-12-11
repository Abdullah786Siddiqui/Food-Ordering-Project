<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    // public function handle(Request $request, Closure $next): Response
    {
        $cookies = $request->cookie('userlocation');
        $currentRoute = $request->route()->getName();

        if (! $cookies && $currentRoute !== 'user.location.show') {
            return redirect()->route('user.location.show');
        }

        if ($cookies && $currentRoute === 'user.location.show') {
            return redirect()->route('user.home');
        }

        return $next($request);
    }
}
