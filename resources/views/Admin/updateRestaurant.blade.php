@extends('layouts.Admin.admin')
@section('admin')
 


      <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
          <input type="hidden" name="location_id" value="{{ $location->id }}">

  <header class="mb-6 mt-2 bg-gradient-to-r from-indigo-50 via-purple-50 to-transparent rounded-xl p-2 px-4 border border-indigo-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 max-sm:gap-1 shadow-sm">
  <div class="w-full sm:w-auto">
    <h1 class="text-2xl  max-sm:text-xl font-bold text-gray-800 flex items-center gap-2 flex-wrap">
      Restaurant Management <span class="text-indigo-600  text-3xl">🍕</span>
    </h1>
    <p class="text-gray-600 text-sm mt-1 sm:mt-0.5">
      Manage details for 
      <span class="font-semibold text-indigo-700">{{ $restaurant->name }}</span>
    </p>
  </div>

  <button
    type="submit" 
    class="w-full sm:w-auto mt-3 sm:mt-0 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition-all duration-200 cursor-pointer">
    Save Changes
  </button>
</header>


            
            
          <div class="bg-white shadow-lg rounded-2xl border border-gray-100 p-8 max-sm:p-2 lg:p-10 mb-4 ">
    <h2 class="text-2xl font-bold text-indigo-600 mb-8 flex items-center">
        <span class="mr-3 text-3xl">🔑</span> Core Restaurant Details
    </h2>

    <!-- Two-column layout -->
    <div class="flex flex-col lg:flex-row gap-10 items-start">

       <!-- Left side: Large Image -->
<div class="flex-shrink-0 w-full lg:w-1/3 flex flex-col items-center">
  <div class="relative group w-full">
    <!-- Image -->
    <img 
      id="preview-image"
      src="{{ asset('storage/' . $restaurant->image) }}"  
      alt="Restaurant Banner Image"
      class="w-full h-72 object-cover rounded-2xl border-4 border-gray-100 shadow-lg transition-all duration-300"
    >

    <!-- Overlay with Button -->
    <div class="absolute inset-0 rounded-2xl hidden group-hover:flex items-center justify-center bg-black/30">
      <label for="image" 
             class="bg-white text-indigo-700 font-semibold px-5 py-2 rounded-full shadow cursor-pointer hover:bg-indigo-50 transition">
        <i class="ri-camera-line mr-2"></i> Change Image
      </label>
    </div>
  </div>

  <!-- Hidden Input -->
  <input type="file" id="image" name="image" accept="image/*" class="hidden">

  <!-- Info -->
  <p class="mt-3 text-sm text-gray-500 text-center">
    Recommended: <span class="font-semibold">1200×600px</span> — Max 5MB (JPG/PNG)
  </p>
</div>

<!-- JS Preview Script -->
<script>
  document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview-image');

    if (file) {
      const reader = new FileReader();
      reader.onload = e => preview.src = e.target.result;
      reader.readAsDataURL(file);
    }
  });
</script>


        <!-- Right side: Form Fields -->
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

            <div>
                <label for="name" class="block mb-2 font-medium text-gray-700">
                    Restaurant Name <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $restaurant->name) }}"
 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
            </div>

            <div>
                <label for="email" class="block mb-2 font-medium text-gray-700">
                    Email Address <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="branch_email" value="{{ old('branch_email', $location->branch_email)}} "
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                       @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
            </div>

            <div>
                <label for="phone_number" class="block mb-2 font-medium text-gray-700">
                    Phone Number <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="phone_number" name="branch_phone_number" value="{{ old('branch_phone_number', $location->branch_phone_number) }}" 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                       @error('phone_number')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
            </div>

            <div>
                <label for="rating" class="block mb-2 font-medium text-gray-700">Current Rating</label>
                <div class="flex items-center space-x-2 w-full px-4 py-2.5 border border-yellow-300 rounded-xl bg-yellow-50 text-yellow-800 cursor-default">
                    <span class="text-yellow-500 text-xl">★</span> 
                    <span class="font-semibold text-lg">{{ $restaurant->rating }}</span>
                    <span class="text-sm text-yellow-700 ml-auto">(Read-only)</span>
                </div>
            </div>

            <div>
                <label for="status" class="block mb-2 font-medium text-gray-700">Operational Status</label>
                <div class="relative">
                    <select id="status" name="status" value="{{  $restaurant->status }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl appearance-none bg-white transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                        <option value="active">Active </option>
                        <option value="inactive" selected>Inactive </option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
               
            </div>



        </div>
    </div>
</div>

            {{-- <pre>{{ print_r($restaurant, true) }}</pre> --}}

          <div class="bg-white shadow-2xl rounded-2xl border border-gray-100 p-8 max-sm:p-2 lg:p-10 mb-4">
  <h2 class="text-2xl font-bold text-indigo-600 mb-8 flex items-center">
    <span class="mr-3 text-3xl">🗺️</span> Location & Mapping
  </h2>

  <!-- Flex Container: Left Form + Right Map -->
  <div class="flex flex-col lg:flex-row lg:items-start gap-10">

    <!-- Left Side: Input Form -->
    <div class="flex-1 space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- City -->
        <div>
          <label for="city_id" class="block mb-2 font-medium text-gray-700">
            City <span class="text-red-500">*</span>
          </label>
          <select id="city_id" name="city_id" 
            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <option value="1" selected>{{ $location->city->city_name  ?? '' }}</option>
          </select>
        </div>

        <!-- Province -->
        <div>
          <label for="province_id" class="block mb-2 font-medium text-gray-700">
            Province <span class="text-red-500">*</span>
          </label>
          <select id="province_id" name="province_id" 
            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <option value="1" selected>{{ $location->province->province_name  ?? '' }}
</option>
          </select>
        </div>

        <!-- Locality -->
        <div class="md:col-span-2">
          <label for="locality" class="block mb-2 font-medium text-gray-700">
            Locality / Area <span class="text-red-500">*</span>
          </label>
          <input type="text" id="locality" name="locality" value="{{old('locality', $location->locality ?? '')}}" 
            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
              @error('locality')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
        </div>
<!-- Address -->
<div class="md:col-span-2">
  <label for="address" class="block mb-2 font-medium text-gray-700">
    Full Street Address <span class="text-red-500">*</span>
  </label>
  <textarea 
    id="address" 
    name="address" 
    rows="2"
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl resize-none focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >{{ old('address', $location->address ?? '') }}</textarea>
  
  @error('address')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

<!-- Latitude -->
<div>
  <label for="latitude" class="block mb-2 font-medium text-gray-700">
    Latitude <span class="text-red-500">*</span>
  </label>
  <input 
    type="text" 
    id="latitude" 
    name="latitude" 
    value="{{ old('latitude', $location->latitude ?? '') }}" 
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >
  <p class="mt-1 text-xs text-gray-500">Use decimal format (e.g., 25.0115000)</p>
  
  @error('latitude')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

<!-- Longitude -->
<div>
  <label for="longitude" class="block mb-2 font-medium text-gray-700">
    Longitude <span class="text-red-500">*</span>
  </label>
  <input 
    type="text" 
    id="longitude" 
    name="longitude"  
    value="{{ old('longitude', $location->longitude ?? '') }}" 
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >
  <p class="mt-1 text-xs text-gray-500">Use decimal format (e.g., 67.0640000)</p>
  
  @error('longitude')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>


      </div>
    </div>
    <!-- Right Side: Map -->
  <div class="flex-1 flex items-center justify-center">
  <div class="w-full h-[400px] lg:h-[460px] rounded-xl overflow-hidden border border-gray-200">
    <iframe
      src="https://www.google.com/maps?q=24.9707535,67.0534067&z=15&hl=en&markers=25.0115000,67.0640000&output=embed"
      class="w-full h-full border-0 rounded-xl"
      allowfullscreen=""
      loading="lazy">
    </iframe>
  </div>
</div>


  </div>
</div>


            <div class="bg-white shadow-2xl rounded-2xl border border-gray-100 p-8 max-sm:p-2 lg:p-10">
                <h2 class="text-2xl font-bold text-indigo-600 mb-8 flex items-center">
                    <span class="mr-3 text-3xl">⏱️</span> Operating Hours
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                   <!-- Days Open -->
      
<div>
  <label for="week_day" class="block mb-2 font-medium text-gray-700">
    Days Open <span class="text-red-500">*</span>
  </label>
  <input 
    type="text" 
    id="week_day" 
    name="week_day"  
    value="{{ old('week_day', $location->timing->week_day ?? '') }}"
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >
  <p class="mt-1 text-xs text-gray-500">e.g., 'Mon-Sun' or 'Fri-Sun'.</p>

  @error('week_day')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

<!-- Opening Time -->
<div>
  <label for="opening_time" class="block mb-2 font-medium text-gray-700">
    Opening Time <span class="text-red-500">*</span>
  </label>
  <input 
    type="time" 
    id="opening_time" 
    name="opening_time"  
    value="{{ old('opening_time', $location->timing->opening_time ?? '') }}" 
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >

  @error('opening_time')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

<!-- Closing Time -->
<div>
  <label for="closing_time" class="block mb-2 font-medium text-gray-700">
    Closing Time <span class="text-red-500">*</span>
  </label>
  <input 
    type="time" 
    id="closing_time" 
    name="closing_time" 
    value="{{ old('closing_time', $location->timing->closing_time ?? '') }}" 
    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl transition duration-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
  >

  @error('closing_time')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

                </div>
            </div>


            {{-- <div class="flex justify-end space-x-4 pt-4">
                <button type="button" class="px-8 py-3 bg-white border border-gray-300 rounded-full text-gray-600 font-bold tracking-wider shadow-sm hover:bg-gray-100 transition duration-200">
                    Cancel
                </button>
                <button type="submit" class="px-8 py-3 bg-indigo-600 text-white font-bold tracking-wider rounded-full shadow-lg shadow-indigo-500/50 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition duration-200">
                    💾 Save Changes
                </button>
            </div> --}}
        </form>

  
@endsection