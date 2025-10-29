<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Delivery_partner\AuthController as DeliveryAuthController;
use App\Http\Controllers\Delivery_partner\delivery_partnerController;
use App\Http\Controllers\Restaurant\AuthController as RestaurantAuthController;
use App\Http\Controllers\Restaurant\RestaurentController;
use Illuminate\Support\Facades\Route;

// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('RedirectAuth:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });


    Route::middleware('custom_auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/restaurants', RestaurantController::class)->except(['create', 'store', 'show']);
        Route::get('/restaurants/branches/{id}', [RestaurantController::class, 'restaurantBranches'])->name('restaurants.branches');
        Route::get('/restaurant/{restaurant}/location/{location}/edit', [RestaurantController::class,'editRestaurant' ])->name('restaurants.location.edit');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

// ===== RESTAURANT =====
Route::prefix('restaurant')->name('restaurant.')->group(function () {

    Route::middleware('RedirectAuth:restaurant')->group(function () {
        Route::get('/login', [RestaurantAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [RestaurantAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('custom_auth:restaurant')->group(function () {
        Route::get('/dashboard', [RestaurentController::class, 'index'])->name('dashboard');
        Route::post('/logout', [RestaurantAuthController::class, 'logout'])->name('logout');
    });
});

// ===== DELIVERY PARTNER =====
Route::prefix('delivery_partner')->name('delivery.')->group(function () {

    Route::middleware('RedirectAuth:delivery_partner')->group(function () {
        Route::get('/login', [DeliveryAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [DeliveryAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('custom_auth:delivery_partner')->group(function () {
        Route::get('/dashboard', [delivery_partnerController::class, 'index'])->name('dashboard');
        Route::post('/logout', [DeliveryAuthController::class, 'logout'])->name('logout');
    });
});

// ===== USER =====
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('RedirectAuth:web')->group(function () {
        Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit');
    });
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});

// ===== HOME PAGE =====
Route::view('/', 'website.index')->name('home');
