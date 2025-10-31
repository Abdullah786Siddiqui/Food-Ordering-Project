<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::all();
        return view('Admin.MenuLIst', compact('categories'));
    }

    public function getMenuItems($id)
    {
         $menuItem = MenuItem::with('category')
        ->where('menu_categories_id', $id)
        ->get();

        if (!$menuItem) {
            return response()->json([
                'success' => false,
                'message' => 'Menu item not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $menuItem
        ], 200);
    }
}
