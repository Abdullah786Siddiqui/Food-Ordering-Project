@extends('layouts.Admin.admin')
@section('admin')
 <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

     

      <div class="bg-[#DBFCE7] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Users</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m4 0h1v4h1m-6 4h6" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totalUsers}}</h2>
        <p class="text-xs text-gray-500 mt-1">128 need attention</p>
      </div>


      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Active Users</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $activeUser }}</h2>
        <p class="text-xs text-gray-500 mt-1">+150 this month</p>
      </div>

      <!-- Total Patients -->
      <div class="bg-[#FEF9C2] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Inactive  Users</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $inactiveUser }}</h2>
        <p class="text-xs text-gray-500 mt-1">+45 today</p>
      </div>

    </div>
    <div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="w-full ove text-sm text-left rtl:text-right text-gray-500 :text-gray-400 border">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 :text-gray-400 border-0">
    <tr class="border-0">
        <th scope="col" class="px-4 py-3 border-0">
            <div class="flex items-center justify-center">
                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100">
                <label for="checkbox-all-search" class="sr-only">checkbox</label>
            </div>
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Name
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Phone
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Status
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            City
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Gender
        </th>
        <th scope="col" class="px-6 py-3 border-0 whitespace-nowrap">
            Action
        </th>
    </tr>
</thead>
<tbody>
@forelse ($users as $user )
      <tr class="bg-white :bg-gray-800 border border-gray-200 :border-gray-700 rounded-lg hover:bg-gray-50 :hover:bg-gray-700 transition-all duration-200">
            
            <!-- Checkbox -->
            <td class="px-4 py-3">
                <div class="flex items-center justify-center">
                    <input type="checkbox" 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 :focus:ring-blue-600 :bg-gray-700 :border-gray-600">
                    <label class="sr-only">Select row</label>
                </div>
            </td>

            <th scope="row" class="px-6 py-3">
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full object-cover border border-gray-300 :border-gray-600" 
                         src="{{ asset('storage/' . $user->profile_image) }}" 
                         alt="Partner image">
                    <div class="flex flex-col">
                        <div class="text-sm font-semibold text-gray-900 :text-white">{{ $user->full_name }}</div>
                        <div class="text-xs text-gray-500 :text-gray-400">{{ $user->email ?? '' }}</div>
                    </div>
                </div>
            </th>

            <!-- Phone -->
            <td class="px-6 py-3 text-sm font-medium text-gray-700 :text-gray-300">
                {{$user->phone_number ?? 'N/A' }}
            </td>

            <!-- Status -->
            <td class="px-6 py-3">
                <div class="flex items-center">
                    @if ($user->status === "inactive")
                        <span class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></span>
                        <span class="text-sm">Offline</span>
                    @else
                        <span class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></span>
                        <span class="text-sm">Online</span>
                    @endif
                </div>
            </td>

            <!-- Vehicle -->
            <td class="px-6 py-3 text-sm text-gray-600 :text-gray-300">
               karachi
            </td>
              <td class="px-6 py-3 text-sm text-gray-600 :text-gray-300">
                           {{$user->gender}}

            </td>

           
            <!-- Actions -->
            <td class="px-6 py-3">
                <div class="flex items-center space-x-2">
                    <a href="#" class="inline-flex items-center px-3 py-1.5 bg-blue-100 :bg-blue-700 text-blue-800 :text-blue-200 rounded hover:bg-blue-200 :hover:bg-blue-600 text-xs font-semibold transition-colors duration-200">
                        <i class="ri-edit-line mr-1.5"></i> Edit
                    </a>
                    <button command="show-modal" commandfor="dialog1" class="inline-flex items-center px-3 py-1.5 bg-red-100 :bg-red-700 text-red-800 :text-red-200 rounded hover:bg-red-200 :hover:bg-red-600 text-xs font-semibold cursor-pointer transition-colors duration-200">
                        <i class="ri-delete-bin-6-line mr-1.5"></i> Delete
                    </button>
                   



                </div>
            </td>
        </tr>

@empty
  <tr>
    <td colspan="6" class="text-center py-4 text-gray-500 :text-gray-400">No User found.</td>
</tr>
@endforelse
    </table>
    </div>
    
@endsection