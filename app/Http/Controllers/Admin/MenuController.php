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

    public function addCategory(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|string|unique:menu_categories,category_name'
            ]);

            MenuCategory::create([
                'category_name' => $request->category,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Category added successfully ✅');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors ko flash karna
            $errors = $e->errors();
            // Get the first validation message to show in the toast popup
            $firstMessage = collect($errors)->flatten()->first();

            return redirect()
                ->back()
                ->withErrors($errors) // errors session mein store
                ->withInput() // purana input wapas le aayega
                ->with('error', $firstMessage ?? 'Validation failed');
        }
    }

    public function deleteCategory($id)
    {
        $category = MenuCategory::find($id);
        $category->items()->delete();


        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
