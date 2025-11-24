<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a Main Restaurant List
     */
    public function getMainRestaurant()
    {
        $restaurants = Restaurant::with([
            'locations' => function ($query) {
                $query->where('is_main', 1)->with('timing');
            }
        ])->paginate(20);
        $totalRestaurant  = Restaurant::count();
        $activeRestaurant = Restaurant::where('status', 'active')->count();
        $InactiveRestaurant = Restaurant::where('status', 'inactive')->count();


        return view('Admin.restaurantList', compact(
            'restaurants',
            'totalRestaurant',
            'activeRestaurant',
            'InactiveRestaurant'

        ));
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
     * Show the form for editing the specified Restaurant.
     */
    public function editRestaurant(Restaurant $restaurant, RestaurantLocation $location)
    {

        // ✅ Load all nested relationships for the location
        $location->load([
            'city',
            'province',
            'timing',
        ]);



        return view('Admin.updateRestaurant', compact('restaurant', 'location'));
    }


    /**
     * Update the specified resource Restaurant.
     */
    public function updateRestaurant(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'location_id'   => 'required|integer',
            'name'          => 'required|string|max:255',
            'branch_email'         => 'required|email|max:255',
            'branch_phone_number'  => 'required|string|max:20',
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

        $location = RestaurantLocation::where('id', $validated['location_id'])
            ->where('restaurant_id', $restaurant->id)
            ->first();

        if (!$location) {
            return back()->with('error', 'Specified location not found for this restaurant.');
        }

        DB::beginTransaction();

        try {
            // Image handling
            if ($request->hasFile('image')) {
                if ($restaurant->image) {
                    Storage::disk('public')->delete($restaurant->image);
                }
                $imagePath = $request->file('image')->store('restaurants', 'public');
            } else {
                $imagePath = $restaurant->image;
            }

            // Restaurant fill
            $restaurant->fill([
                'name'         => $validated['name'],

                'status'       => $validated['status'],
                'image'        => $imagePath,
            ]);

            // Location fill
            $location->fill([
                'city_id'             => $validated['city_id'],
                'province_id'         => $validated['province_id'],
                'locality'            => $validated['locality'],
                'address'             => $validated['address'],
                'latitude'            => $validated['latitude'],
                'longitude'           => $validated['longitude'],
                'branch_email'        => $validated['branch_email'] ?? $location->branch_email,
                'branch_phone_number' => $validated['branch_phone_number'] ?? $location->branch_phone_number,
            ]);

            // Timing fill
            $timing = $location->timing;
            if ($timing) {
                $timing->fill([
                    'week_day'     => $validated['week_day'],
                    'opening_time' => $validated['opening_time'],
                    'closing_time' => $validated['closing_time'],
                ]);
            }

            // Check if anything changed
            if (!$restaurant->isDirty() && !$location->isDirty() && (!$timing || !$timing->isDirty())) {
                DB::rollBack();
                return redirect()
                    ->route('admin.restaurants.main')
                    ->with('success', 'Nothing to update!');
            }

            // Save changes
            if ($restaurant->isDirty()) $restaurant->save();
            if ($location->isDirty()) $location->save();
            if ($timing && $timing->isDirty()) $timing->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong while updating.')->withInput();
        }

        return redirect()
            ->route('admin.restaurants.main')
            ->with('success', 'Restaurant updated successfully!');
    }
}
