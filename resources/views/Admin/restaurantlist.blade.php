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
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totalRestaurant }}</h2>
        <p class="text-xs text-gray-500 mt-1">128 need attention</p>
      </div>


      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Active Restaurants</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $activeRestaurant }}</h2>
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
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $InactiveRestaurant }}</h2>
        <p class="text-xs text-gray-500 mt-1">+45 today</p>
      </div>

    </div>


    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-4">
 
    <div class="overflow-x-auto rounded-lg border border-gray-200">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400 border">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 :text-gray-400 border-0">
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
            Phone
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Status
        </th>
        <th scope="col" class="px-6 py-3 border-0">
            Days
        </th>
          <th scope="col" class="px-6 py-3 border-0">
            Timing
        </th>
        <th scope="col" class="px-14 py-3 border-0">
            Action
        </th>
    </tr>
</thead>

      <tbody>

@forelse ($restaurants as $restaurant)
 
        <tr class="bg-white :bg-gray-800 border border-gray-200 :border-gray-700 rounded-lg hover:bg-gray-50 :hover:bg-gray-700 transition-all duration-200">
            
            <!-- Checkbox -->
            <td class="w-4 p-2">
                <div class="flex items-center justify-center">
                    <input  type="checkbox" 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 :focus:ring-blue-600 :bg-gray-700 :border-gray-600">
                    <label class="sr-only">Select row</label>
                </div>
            </td>

            <!-- Restaurant Name & Email -->
             @php $location = $restaurant->locations->first(); @endphp
            <th scope="row" class="flex flex-col lg:flex-row items-center px-2 py-2 text-gray-900 :text-white">
                <img class="w-10 h-10 rounded-full object-cover border border-gray-300 :border-gray-600"   src="{{ asset('storage/' . $restaurant->image) }}"  alt="Restaurant image">
                <div class="mt-1 sm:mt-0 sm:ms-2 text-center sm:text-left">
                    <div class="text-sm font-semibold truncate">{{ $restaurant->name }}</div>
                    <div class="text-xs text-gray-500 :text-gray-400 truncate">{{ $location->branch_email ?? '' }}</div>
                </div>
            </th>

            <!-- Location -->
            <td class="px-2 py-2 text-gray-700 :text-gray-300 text-sm font-medium">{{$location->branch_phone_number ?? 'N/A' }}</td>

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
            <td class="px-2 py-2 space-y-0.5 text-xs text-gray-600 :text-gray-300">
             {{ $location->timing->week_day ?? '' }}
            </td>
            <td class="px-2 py-2 space-y-0.5 text-xs text-gray-600 :text-gray-300">
             
                    {{ $location->timing->opening_time ?? '' }} - {{ $location->timing->closing_time ?? '' }}
               
            </td>

            <!-- Actions -->
            <td >
                <div class="flex items-center justify-start gap-1">
                <a  href="{{ route('admin.restaurants.location.edit', [$restaurant->id, $location->id])}}"

                   class="flex items-center px-2 py-1 bg-blue-100 :bg-blue-700 text-blue-800 :text-blue-200 rounded hover:bg-blue-200 :hover:bg-blue-600 text-xs font-semibold">
                    <i class="ri-edit-line mr-1"></i> Edit
                </a>
                <button command="show-modal" commandfor="dialog1"
                        class="flex items-center px-2 py-1 bg-red-100 :bg-red-700 text-red-800 :text-red-200 rounded hover:bg-red-200 :hover:bg-red-600 text-xs font-semibold cursor-pointer">
                    <i class="ri-delete-bin-6-line mr-1"></i> Delete
                </button>
<button onclick="restaurantBranches('{{ $restaurant->id }}', '{{ $restaurant->name }}')"data-modal-target="default-modal" data-modal-toggle="default-modal"
    class="flex items-center px-2 py-1 bg-blue-50 :bg-blue-900 text-blue-700 :text-blue-200 rounded hover:bg-blue-100 cursor-pointer :hover:bg-blue-800 text-xs font-semibold">
    <i class="ri-more-fill mr-1"></i> More
</button>



                </div>
            </td>

        </tr>
        


@empty
<tr>
    <td colspan="6" class="text-center py-4 text-gray-500 :text-gray-400">No restaurants found.</td>
</tr>
@endforelse
</tbody>
</table>
    </div>

<div id="default-modal" tabindex="-1" aria-hidden="true"
    class=" hidden fixed inset-0 z-50 flex items-center justify-center 
    overflow-y-auto px-4 py-6 backdrop-blur-[2px] bg-black/40">

    <!-- Modal Wrapper -->
    <div class="relative w-full max-w-2xl bg-white :bg-gray-800 
        rounded-2xl shadow-2xl border border-gray-200 :border-gray-700 
        overflow-hidden animate-scale-in">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 
            border-b border-gray-200 :border-gray-700 bg-gray-50 :bg-gray-900/40">
            
         <h3 id="modalHeading" class="text-xl font-bold text-gray-900 :text-white flex items-center gap-2">
  
</h3>


            <button type="button"
                class="text-gray-400 hover:text-gray-700 :hover:text-gray-200 
                hover:bg-gray-200/60 :hover:bg-gray-600/60 transition rounded-lg w-9 h-9 flex items-center justify-center cursor-pointer"
                data-modal-hide="default-modal">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 max-sm:px-2 py-5 space-y-5">

            <!-- Search -->
            <div>
                <input type="text"
                    placeholder="Search location..."
                    class="w-full rounded-lg border border-gray-300 :border-gray-600 
                    px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                    outline-none :bg-gray-700 :text-white placeholder-gray-500 
                    :placeholder-gray-400 bg-gray-50"  />
            </div>

            <!-- Table -->
            <div class="overflow-hidden border border-gray-200 :border-gray-700 rounded-xl">
                <table class="w-full text-sm text-left text-gray-600 :text-gray-200" id="branchesTable">

                    <thead class="text-xs uppercase bg-gray-100 :bg-gray-700 
                        text-gray-700 :text-gray-200 tracking-wide">
                        <tr>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">City</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Timing</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 :divide-gray-700">

                      

                     

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
function restaurantBranches(restaurantId , restaurantName) {
    const tbody = document.querySelector("#branchesTable tbody");
    const modalHeading = document.getElementById("modalHeading");
    // Update heading dynamically
    modalHeading.textContent = `${restaurantName} Locations 📍`;
tbody.innerHTML = `
<tr class="animate-pulse bg-white :bg-gray-800">
    <!-- Checkbox -->
    <td class="px-4 py-3">
        <div class="h-4 w-4 bg-gray-300 :bg-gray-700 rounded-full mx-auto"></div>
    </td>
    <!-- Name & Email -->
    <td class="px-4 py-3">
        <div class="h-4 bg-gray-300 rounded-full :bg-gray-700 mb-2 w-28"></div>
        <div class="h-3 bg-gray-300 rounded-full :bg-gray-700 w-20"></div>
    </td>
    <!-- Phone -->
    <td class="px-4 py-3">
        <div class="h-4 bg-gray-300 rounded-full :bg-gray-700 w-20 mx-auto"></div>
    </td>
   
    <!-- Days -->
    <td class="px-4 py-3">
        <div class="h-4 bg-gray-300 rounded-full :bg-gray-700 w-24 mx-auto"></div>
    </td>
    <!-- Timing -->
    <td class="px-4 py-3">
        <div class="h-4 bg-gray-300 rounded-full :bg-gray-700 w-32 mx-auto"></div>
    </td>
    <!-- Actions -->
    <td class="px-4 py-3">
        <div class="flex items-center justify-center gap-2">
            <div class="h-4 w-12 bg-gray-300 rounded-full :bg-gray-700"></div>
            <div class="h-4 w-12 bg-gray-300 rounded-full :bg-gray-700"></div>
        </div>
    </td>
</tr>
`;

    fetch(`/admin/restaurants/branches/${restaurantId}`, {
        method: "GET",
        headers: { "Accept": "application/json" },
        credentials: "include"
    })
    .then(res => res.json())
    .then(res => {
        let branches = "";
        res.data.forEach(branch => {
            branches += `
                <tr class="hover:bg-gray-50 :hover:bg-gray-800/60 transition">
                    <td class="px-4 py-3 font-medium">${branch.restaurant.name}</td>
                    <td class="px-4 py-3">${branch.city.city_name}</td>
                    <td class="px-4 py-3">${branch.address}</td>
                   <td class="px-4 py-3">
    ${branch.timing.week_day} (${branch.timing.opening_time} - ${branch.timing.closing_time})
</td>

                    <td class="px-4 py-3 text-right">
                        <div class="flex gap-1 max-sm:gap-2 max-sm:flex-col items-start">
                            <a href="/admin/restaurants/${branch.restaurant_id}/location/${branch.id}/edit"  class="flex items-center px-2 max-sm:px-4 py-1 bg-blue-100 :bg-blue-700 text-blue-800 :text-blue-200 rounded hover:bg-blue-200 :hover:bg-blue-600 text-xs font-semibold">
                                <i class="ri-edit-line mr-1"></i> Edit
                            </a>
                            <button command="show-modal" commandfor="dialog1"
                                    class="flex items-center px-2 py-1 bg-red-100 :bg-red-700 text-red-800 :text-red-200 rounded hover:bg-red-200 :hover:bg-red-600 text-xs font-semibold cursor-pointer">
                                <i class="ri-delete-bin-6-line mr-1"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = branches || `
<tr class="bg-white :bg-gray-800 border border-gray-200 :border-gray-700 rounded-lg">
    <td colspan="5" class="px-4 py-3 text-center text-gray-500 :text-gray-400">
        🍴 No branches found for this restaurant
    </td>
</tr>
`;
 
    })
    .catch(err => {
        console.error(err);
        tbody.innerHTML = "<tr><td colspan='5' class='text-center'>Failed to load branches</td></tr>";
    });
}

</script>

    
@endsection