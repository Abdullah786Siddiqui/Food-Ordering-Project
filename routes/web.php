<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Restaurant\AuthController as RestaurantAuthController;
use App\Http\Controllers\Restaurant\RestaurentController;
use App\Http\Controllers\Admin\RestaurantController as RestaurantAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Restaurant\MenuController as RestaurantMenuController;
use App\Http\Controllers\Restaurant\OrderController as RestaurantOrderController;
use App\Http\Controllers\User\UserController as MainUserController;
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
        Route::get('/getMenu/{id}', [MenuController::class, 'getMenuItems']);
        Route::post('/addCategory', [MenuController::class, 'addCategory'])->name('category.add');
        Route::post('/deleteCategory/{id}', [MenuController::class, 'deleteCategory'])->name('category.delete');

        //Delivery Partners
        Route::resource('/delivery', DeliveryController::class);
        //Order Management
        Route::resource('/order', OrderController::class);
        //User Management
        Route::resource('/user', UserController::class);






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


        //Order Management
        Route::resource('/order', RestaurantOrderController::class);
        //Menu Management
        Route::get('/menu', [RestaurantMenuController::class, 'index'])->name('menu.index');
        Route::post('/addMenu/{id}', [RestaurantMenuController::class, 'addMenuItem'])->name('menu.add');
        Route::get('/restaurantCategory', [RestaurantMenuController::class, 'getRestaurantCategory']);
        Route::get('/allCategory', [RestaurantMenuController::class, 'getAllCategory']);
        Route::post('/saveCategories', [RestaurantMenuController::class, 'saveCategories']);
        Route::get('/restaurantMenu/{id}', [RestaurantMenuController::class, 'getMenuItem']);


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

    // Location routes

    // Protected routes
    Route::middleware('userlocation')->group(function () {
        Route::get('/home', [MainUserController::class, 'index'])->name('home');
        Route::get('/location', [MainUserController::class, 'setLocation'])->name('location.show');
        Route::get('/restaurants/nearby', [MainUserController::class, 'nearbyRestaurants']);
        Route::view('/pickup', 'Website.pickupItem')->name('pickup');
        Route::view('/caterers', 'Website.caterers')->name('caterers');
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    });

    Route::post('/location', [MainUserController::class, 'storeLocation'])->name('location.store');




});

// ===== HOME PAGE =====

