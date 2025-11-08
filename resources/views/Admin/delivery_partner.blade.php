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
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $deliverypartner->count() }}</h2>
        <p class="text-xs text-gray-500 mt-1">128 need attention</p>
      </div>


      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Active Restaurants</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{  $deliverypartner->where('status', 'active')->count() }}</h2>
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
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $deliverypartner->where('status', 'inactive')->count() }}</h2>
        <p class="text-xs text-gray-500 mt-1">+45 today</p>
      </div>

    </div>

@endsection