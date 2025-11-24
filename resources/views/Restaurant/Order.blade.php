@extends('layouts.Restaurant.restaurant')
@section('restaurant')
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">

      <div class="bg-[#DBFCE7] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Orders</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m4 0h1v4h1m-6 4h6" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totalOrder }}</h2>
        <p class="text-xs text-gray-500 mt-1">All time orders</p>
      </div>

      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Orders Today</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $ordersToday }}</h2>
        <p class="text-xs text-gray-500 mt-1">Orders placed today</p>
      </div>

      <div class="bg-[#FEF9C2] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Orders This Month</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $ordersThisMonth }}</h2>
        <p class="text-xs text-gray-500 mt-1">This month's orders</p>
      </div>

      <div class="bg-[#E6F0FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Pending Today</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $pendingToday }}</h2>
        <p class="text-xs text-gray-500 mt-1">Waiting to be processed</p>
      </div>

      <div class="bg-[#DFF3FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Delivered</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $deliverOrders }}</h2>
        <p class="text-xs text-gray-500 mt-1">Completed deliveries</p>
      </div>

      <div class="bg-[#FFECEE] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Delivered This Month</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $deliverThisMonth }}</h2>
        <p class="text-xs text-gray-500 mt-1">Delivered cancelled</p>
      </div>

      <div class="bg-[#FFF7E6] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Cancelled</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.567-3 3.5S10.343 15 12 15s3-1.567 3-3.5S13.657 8 12 8z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $cancelledOrders }}</h2>
        <p class="text-xs text-gray-500 mt-1">Revenue from delivered orders</p>
      </div>

      <div class="bg-[#F0FFF4] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Cancelled This Month</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.567-3 3.5S10.343 15 12 15s3-1.567 3-3.5S13.657 8 12 8z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $cancelledThisMonth }}</h2>
        <p class="text-xs text-gray-500 mt-1">Cancelled current month</p>
      </div>

    </div>

     <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
      <!-- Status Dropdown -->
      <div class="flex items-center gap-3">
  <label for="order-status" class="text-sm font-semibold text-gray-800">Status:</label>
  <select 
    id="order-status" 
    name="order-status" 
    class="w-44 px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 text-sm font-medium shadow-sm 
           focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-all duration-200
           hover:border-gray-400"
  >
    <option value="">All</option>
    <option value="Pending">Pending</option>
    <option value="Delivered">Delivered</option>
    <option value="Cancelled">Cancelled</option>
  </select>
</div>

      <!-- Search Bar -->
      <div class="flex items-center gap-2 w-full md:w-1/3">
        <input type="text" name="order-search" id="order-search" placeholder="Search orders..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm" />
        <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm">Search</button>
      </div>
    </div>
    <div class="overflow-x-auto rounded-lg border border-gray-200">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400 border">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 :text-gray-400 border-0">
    <tr class="border-0">
        <th scope="col" class="px-4 py-3 border-0">
            <div class="flex items-center justify-center">
                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100">
                <label for="checkbox-all-search" class="sr-only">checkbox</label>
            </div>
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Order ID
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Customer Name
        </th>
      
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Total Amount
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Payment Mode
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Order Status
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Action
        </th>
    </tr>
</thead>
<tbody>
@forelse ($orders as $order )
      <tr class="bg-white :bg-gray-800 border border-gray-200 :border-gray-700 rounded-lg hover:bg-gray-50 :hover:bg-gray-700 transition-all duration-200">
            
            <!-- Checkbox -->
            <td class="px-4 py-3">
                <div class="flex items-center justify-center">
                    <input type="checkbox" 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 :focus:ring-blue-600 :bg-gray-700 :border-gray-600">
                    <label class="sr-only">Select row</label>
                </div>
            </td>

            <td class="px-6 py-3 text-sm font-medium text-gray-700 :text-gray-300">
                {{$order->id}}
            </td>

             
            <td class="px-6 py-3 text-sm font-medium text-gray-700 :text-gray-300">
                {{$order->user->full_name}}
            </td>

           

          
          

       
            <td class="px-6 py-3 text-sm text-gray-600 :text-gray-300">
                                               Rs:{{ $order->total_amount}}

            </td>

     
            <td class="px-6 py-3 text-sm text-gray-600 :text-gray-300">
                {{ $order->payment->payment_mode }}
            </td>
 <td class="px-6 py-3 text-sm text-gray-600 :text-gray-300">
  {{ $order->status }}
               
            </td>
            <!-- Actions -->
            <td class="px-6 py-3">
                <div class="flex items-center space-x-2">
                    <a href="#" class="inline-flex items-center px-3 py-1.5 bg-blue-100 :bg-blue-700 text-blue-800 :text-blue-200 rounded hover:bg-blue-200 :hover:bg-blue-600 text-xs font-semibold transition-colors duration-200">
                       <i class="ri-eye-line mr-1.5"></i> View
                    </a>
                    <button command="show-modal" commandfor="dialog1" class="inline-flex items-center px-3 py-1.5 bg-red-100 :bg-red-700 text-red-800 :text-red-200 rounded hover:bg-red-200 :hover:bg-red-600 text-xs font-semibold cursor-pointer transition-colors duration-200">
                        <i class="ri-delete-bin-6-line mr-1.5"></i> Delete
                    </button>
                   



                </div>
            </td>
        </tr>

@empty
  <tr>
    <td colspan="6" class="text-center py-4 text-gray-500 :text-gray-400">No Order found.</td>
</tr>
@endforelse
    </table>
    </div>
  
@endsection