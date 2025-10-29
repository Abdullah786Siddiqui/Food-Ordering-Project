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
                $query->where('is_main', 1)->with('timings');
            }
        ])->get();
        return view('Admin.restaurantList', compact('restaurants'));
    }


    /**
     * Display a Restaurant branches List
     */
    public function restaurantBranches($id)
    {
        $res_branch = RestaurantLocation::with(['restaurant', 'timings', 'city'])
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
    public function edit(Restaurant $restaurant)
    {
        $restaurant->load('locations.city', 'locations.province', 'locations.timings');
        return view('Admin.updateRestaurant', compact('restaurant'));
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
            $validated['image'] = $restaurant->image; // keep old image
        }

        // Update restaurant
        $restaurant->fill([
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'status'       => $validated['status'],
            'image'        => $validated['image'],
        ]);
        $restaurantChanged = $restaurant->isDirty();
        if ($restaurantChanged) {
            $restaurant->save();
        }

        // Update location & timing
        $location = $restaurant->locations()->first();
        $locationChanged = false;
        $timingChanged = false;

        if ($location) {
            $location->fill([
                'city_id'     => $validated['city_id'],
                'province_id' => $validated['province_id'],
                'locality'    => $validated['locality'],
                'address'     => $validated['address'],
                'latitude'    => $validated['latitude'],
                'longitude'   => $validated['longitude'],
            ]);
            $locationChanged = $location->isDirty();
            if ($locationChanged) {
                $location->save();
            }

            $timing = $location->timings()->first();
            if ($timing) {
                $timing->fill([
                    'week_day'     => $validated['week_day'],
                    'opening_time' => $validated['opening_time'],
                    'closing_time' => $validated['closing_time'],
                ]);
                $timingChanged = $timing->isDirty();
                if ($timingChanged) {
                    $timing->save();
                }
            }
        }

        // Determine final message
        $message = ($restaurantChanged || $locationChanged || $timingChanged)
            ? 'Restaurant updated successfully!'
            : 'Everything is already up-to-date!';

        return redirect()->route('admin.restaurants.index')->with('success', $message);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
