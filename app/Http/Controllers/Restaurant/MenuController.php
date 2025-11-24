<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuCategory;
use App\Models\MenuCategoryPivot;
use App\Models\MenuItem;
use App\Models\MenuItemPivot;
use App\Models\Restaurant;
use App\Models\RestaurantCategoryPivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
       $restaurantCategories = $this->getRestaurantCategory(); 
    return view('Restaurant.Menu', compact('restaurantCategories'));
    }

 
    


public function getRestaurantCategory()
{
    $restaurantId = Auth::guard('restaurant')->id();

    $categories = RestaurantCategoryPivot::where('restaurant_id', $restaurantId)
        ->with(['category' => function ($q) {
            $q->withCount('menuItems');  
        }])
        ->get();
        
       

   
    if (request()->wantsJson() || request()->ajax()) {
        return response()->json([
            'status' => true,
            'restaurant_categories' => $categories
        ]);
    }

    
    return $categories;
}






  public function getAllCategory()
{
    $restaurantId = Auth::guard('restaurant')->id();

    // 1️⃣ Fetch all categories (active and inactive)
    $categories = Category::all();

    // 2️⃣ Fetch active categories for this restaurant
    $restaurantCategoryIds = RestaurantCategoryPivot::where('restaurant_id', $restaurantId)
        ->whereHas('category', function ($q) {
            $q->where('status', 'active');
        })
        ->pluck('category_id');

    // 3️⃣ Format response
    return response()->json([
        'status' => true,
        'categories' => $categories,
        'restaurant_categories' => $restaurantCategoryIds
    ]);
}

public function saveCategories(Request $request)
{
    $request->validate([
        'categories' => 'required|array',
        'categories.*' => 'integer|exists:categories,id',
    ]);

    $restaurantId = Auth::guard('restaurant')->id();

    foreach ($request->categories as $categoryId) {
        RestaurantCategoryPivot::updateOrCreate(
            [
                'restaurant_id' => $restaurantId,
                'category_id'   => $categoryId
            ],
            [] // no extra columns to update
        );
    }

    return response()->json([
        'status' => 'success',
        'msg' => 'Categories saved successfully'
    ]);
}

 public function getMenuItem($id)
{
    $restaurantId = Auth::guard('restaurant')->id();

    $menuItems = MenuItem::where('restaurant_id', $restaurantId)
        ->where('category_id', $id)
        ->get();

    return response()->json([
        'status' => true,
        'menu_items' => $menuItems
    ]);
}



public function addMenuItem(Request $request, $id)
{
    try {
        $restaurantId = Auth::guard('restaurant')->id();

        $validated = $request->validate([
            'item_name'       => 'required|string|max:255',
            'price'           => 'required|numeric|min:0',
            'status'          => 'required|in:active,inactive',
            'description'     => 'nullable|string|max:1000',
            'menu_item_image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Get category info
        $category = Category::findOrFail($id);

        $imagePath = null;
        if ($request->hasFile('menu_item_image')) {
            $imagePath = $request->file('menu_item_image')->store('menu', 'public');
        }

        $menuItem = MenuItem::create([
            'item_name'      => $validated['item_name'],
            'price'          => $validated['price'],
            'status'         => $validated['status'],
            'description'    => $validated['description'] ?? null,
            'image_url'     => $imagePath,
            'restaurant_id'  => $restaurantId,
            'category_id'    => $id
        ]);

        return response()->json([
            'status' => 'success',
            'msg'    => 'Menu Item saved successfully',
            'category' => [
                'id'   => $category->id,
                'name' => $category->name,
            ]
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'msg' => $e->getMessage()
        ], 500);
    }
}





}
