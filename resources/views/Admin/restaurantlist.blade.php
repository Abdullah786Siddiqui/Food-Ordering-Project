@extends('layouts.Admin.admin')
@section('admin')
  <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

     

      <div class="bg-[#DBFCE7] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Restaurant Partners</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m4 0h1v4h1m-6 4h6" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $restaurants->count() }}</h2>
        <p class="text-xs text-gray-500 mt-1">128 need attention</p>
      </div>


      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Active Restaurants</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{  $restaurants->where('status', 'active')->count() }}</h2>
        <p class="text-xs text-gray-500 mt-1">+150 this month</p>
      </div>

      <!-- Total Patients -->
      <div class="bg-[#FEF9C2] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Inactive Restaurants</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $restaurants->where('status', 'inactive')->count() }}</h2>
        <p class="text-xs text-gray-500 mt-1">+45 today</p>
      </div>

    </div>


    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-4">
 

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-400 border-0">
    <tr class="border-0">
        <th scope="col" class="p-4 border-0">
            <div class="flex items-center">
                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100">
                <label for="checkbox-all-search" class="sr-only">checkbox</label>
            </div>
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Name
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Locality
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Status
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Days
        </th>
        <th scope="col" class="px-14 py-3 border-0">
            Action
        </th>
    </tr>
</thead>

      <tbody>
<tbody>
@forelse ($restaurants as $restaurant)
    @foreach($restaurant->locations as $location)
        <tr class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
            
            <!-- Checkbox -->
            <td class="w-4 p-2">
                <div class="flex items-center justify-center">
                    <input id="checkbox-{{ $restaurant->id }}-{{ $location->id }}" type="checkbox" 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-{{ $restaurant->id }}-{{ $location->id }}" class="sr-only">Select row</label>
                </div>
            </td>

            <!-- Restaurant Name & Email -->
            <th scope="row" class="flex flex-col sm:flex-row items-center px-2 py-2 text-gray-900 dark:text-white">
                <img class="w-10 h-10 rounded-full object-cover border border-gray-300 dark:border-gray-600"   src="{{ asset('storage/' . $restaurant->image) }}"  alt="Restaurant image">
                <div class="mt-1 sm:mt-0 sm:ms-2 text-center sm:text-left">
                    <div class="text-sm font-semibold truncate">{{ $restaurant->name }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $restaurant->email }}</div>
                </div>
            </th>

            <!-- Location -->
            <td class="px-2 py-2 text-gray-700 dark:text-gray-300 text-sm font-medium">{{ $location->locality }}</td>

            <!-- Status -->
            <td class="px-2 py-2 text-sm">
                <div class="flex items-center">
                    @if ($restaurant->status === "inactive")
                        <span class="h-2.5 w-2.5 rounded-full bg-red-500 me-1"></span> Offline
                    @else
                        <span class="h-2.5 w-2.5 rounded-full bg-green-500 me-1"></span> Online
                    @endif
                </div>
            </td>

            <!-- Timings -->
            <td class="px-2 py-2 space-y-0.5 text-xs text-gray-600 dark:text-gray-300">
                @foreach($location->timings as $timing)
                    <div>{{ $timing->week_day }}: {{ $timing->opening_time }} - {{ $timing->closing_time }}</div>
                @endforeach
            </td>

            <!-- Actions -->
            <td class="px-2 py-2 flex gap-1">
                <a href="{{ route('admin.restaurants.show' , $restaurant->id) }}"
                   class="flex items-center px-2 py-1 bg-blue-100 dark:bg-blue-700 text-blue-800 dark:text-blue-200 rounded hover:bg-blue-200 dark:hover:bg-blue-600 text-xs font-semibold">
                    <i class="ri-edit-line mr-1"></i> Edit
                </a>
                <button command="show-modal" commandfor="dialog"
                        class="flex items-center px-2 py-1 bg-red-100 dark:bg-red-700 text-red-800 dark:text-red-200 rounded hover:bg-red-200 dark:hover:bg-red-600 text-xs font-semibold">
                    <i class="ri-delete-bin-6-line mr-1"></i> Delete
                </button>
            </td>

        </tr>
    @endforeach
@empty
<tr>
    <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-400">No restaurants found.</td>
</tr>
@endforelse
</tbody>


@endsection