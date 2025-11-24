<?php

use App\Http\Middleware\CustomAuth;
use App\Http\Middleware\RedirectAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
       $middleware->alias([

            'custom_auth' => CustomAuth::class,
            'RedirectAuth' => RedirectAuth::class




        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
