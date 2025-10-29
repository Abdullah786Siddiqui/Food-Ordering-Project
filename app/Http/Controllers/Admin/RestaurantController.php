<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a Main Restaurant List
     */
    public function index()
    {
        $restaurants = Restaurant::with([
            'locations' => function ($query) {
                $query->where('is_main', 1)->with('timing');
            }
        ])->get();


        return view('Admin.restaurantList', compact('restaurants'));
    }


    /**
     * Display a Restaurant branches List
     */
    public function restaurantBranches($id)
    {
        $res_branch = RestaurantLocation::with(['restaurant', 'timing', 'city'])
            ->where('is_main', 0)
            ->where('restaurant_id', $id)
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $res_branch
        ]);
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function editRestaurant(Restaurant $restaurant, RestaurantLocation $location)
    {
        // ✅ Safety check: location must belong to same restaurant
        if ($location->restaurant_id !== $restaurant->id) {
            abort(404);
        }

        // ✅ Load all nested relationships for the location
        $location->load([
            'city',
            'province',
            'timing',
        ]);

        //   return response()->json([
        //     'status' => 'success',
        //     'data'   => $location
        // ]);

        return view('Admin.updateRestaurant', compact('restaurant', 'location'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Restaurant $restaurant)
{
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'phone_number'  => 'required|string|max:20',
        'status'        => 'required|string',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        'city_id'       => 'required|integer',
        'province_id'   => 'required|integer',
        'locality'      => 'required|string|max:255',
        'address'       => 'required|string',
        'latitude'      => 'required|string',
        'longitude'     => 'required|string',
        'week_day'      => 'required|string|max:50',
        'opening_time'  => 'required',
        'closing_time'  => 'required',
    ]);

    // Handle image
    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($restaurant->image ?? '');
        $validated['image'] = $request->file('image')->store('restaurants', 'public');
    } else {
        $validated['image'] = $restaurant->image;
    }

    // Update restaurant
    $restaurant->update([
        'name'         => $validated['name'],
        'email'        => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'status'       => $validated['status'],
        'image'        => $validated['image'],
    ]);

    // Update location
    $location = $restaurant->locations()->first();
    if ($location) {
        $location->update([
            'city_id'     => $validated['city_id'],
            'province_id' => $validated['province_id'],
            'locality'    => $validated['locality'],
            'address'     => $validated['address'],
            'latitude'    => $validated['latitude'],
            'longitude'   => $validated['longitude'],
        ]);

        // Update or create timing
        $timing = $location->timing;
        if ($timing) {
            $timing->update([
                'week_day'     => $validated['week_day'],
                'opening_time' => $validated['opening_time'],
                'closing_time' => $validated['closing_time'],
            ]);
        } else {
            $location->timing()->create([
                'week_day'     => $validated['week_day'],
                'opening_time' => $validated['opening_time'],
                'closing_time' => $validated['closing_time'],
            ]);
        }
    }

    return redirect()->route('admin.restaurants.index')
                     ->with('success', 'Restaurant updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
