<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Delivery_partner\AuthController as DeliveryAuthController;
use App\Http\Controllers\Delivery_partner\delivery_partnerController;
use App\Http\Controllers\Restaurant\AuthController as RestaurantAuthController;
use App\Http\Controllers\Restaurant\RestaurentController;
use App\Http\Controllers\Admin\RestaurantController as RestaurantAdminController;
use Illuminate\Support\Facades\Route;

// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('RedirectAuth:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('custom_auth:admin')->group(function () {
        //DASHBOARD
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        // ===== RESTAURANT PREFIX =====
        Route::prefix('restaurants')->name('restaurants.')->group(function () {
            // GET All Main Restaurant 
            Route::get('/', [RestaurantAdminController::class, 'getMainRestaurant'])->name('main');
            // GET All Specific Restaurant Branches
            Route::get('/branches/{id}', [RestaurantAdminController::class, 'restaurantBranches'])->name('branches');
            // GET All Specific Restaurant Data
            Route::get('/{restaurant}/location/{location}/edit', [RestaurantAdminController::class, 'editRestaurant'])->name('location.edit');
            //UPDATE Specific Restaurant
            Route::put('/{restaurant}', [RestaurantAdminController::class, 'updateRestaurant'])->name('update');
        });

        //MENU ROUTES
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.list');
        Route::get('/menuCategory', [MenuController::class, 'getMenuItems']);


        // ADMIN Logout
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
