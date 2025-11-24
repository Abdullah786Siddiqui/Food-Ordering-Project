<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
{   
    $categories = Category::all();

    if (request()->wantsJson() || request()->ajax()) {
        return response()->json([
            'status' => true,
            'categories' => $categories
        ]);
    } else {
        return view('Admin.MenuLIst',compact('categories'));
    }
}


public function getMenuItems($id)
{
    try {
       
        // Check if category exists
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found.'
            ], 404); // Not found
        }

        // Fetch menu items
        $menuItems = MenuItem::where('category_id', $id)->get();

        return response()->json([
            'status' => true,
            'category' => $category->category_name,
            'count' => $menuItems->count(),
            'menu_items' => $menuItems
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'status' => false,
            'message' => 'Something went wrong.',
            'error' => $e->getMessage()
        ], 500); // Server error
    }
}


public function addCategory(Request $request)
{
    $validated = $request->validate([
        'category_name' => 'required|string|unique:categories,category_name',
        'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
    ]);

    $imagePath = null;
    if ($request->hasFile('category_image')) {
        $imagePath = $request->file('category_image')->store('category', 'public');
    }

    $category = Category::create([
        'category_name' => $validated['category_name'],
        'category_image' => $imagePath,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Category added successfully ✅',
        'category' => $category
    ]);
}



    // public function deleteCategory($id)
    // {
    //     $category = MenuCategory::find($id);
    //     $category->items()->delete();


    //     return redirect()->back()->with('success', 'Category deleted successfully.');
    // }
}
