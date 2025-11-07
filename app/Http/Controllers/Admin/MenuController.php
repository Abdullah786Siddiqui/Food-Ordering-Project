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
        return view('Admin.MenuLIst');
    }

    public function getMenuItems()
    {
        $menuCategories = MenuCategory::with('items')->get();
        return response()->json([
            'status' => true,
            'data' => $menuCategories
        ]);
    }
}
