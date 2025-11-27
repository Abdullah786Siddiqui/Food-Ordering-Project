@extends('layouts.User.user')
@section('user')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<div class="relative w-full h-[360px] sm:h-[400px] lg:h-[450px]">
  <!-- Swiper Carousel -->
  <div class="swiper mySwiper w-full h-full">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        {{-- <img src="storage/crosel/main1.png" class="w-full h-full object-cover rounded-lg" />
      </div>
      <div class="swiper-slide">
        <img src="storage/crosel/main2.png" class="w-full h-full object-cover rounded-lg" />
      </div> --}}
      <div class="swiper-slide">
        <img src="storage/crosel/main1.png" class="w-full h-full object-cover rounded-lg" />
      </div>
    </div>
  </div>

  <!-- Overlay with Gradient -->
  <div class="absolute inset-0 bg-black/40 rounded-lg"></div>

  <!-- Centered Text and Search -->
<div class="absolute inset-0 z-10 flex flex-col items-center justify-start sm:justify-center px-4 text-center text-white pt-4 sm:pt-0 ">

    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">
     <span class="text-orange-500">Delicious Food</span> Effortlessly!
    </h1>

    <p class="mt-4 text-lg sm:text-xl text-black">
      Discover amazing dishes or list your own in just a few clicks!
    </p>

 <!-- Search Bar -->
<div class="mt-6 w-full max-w-4xl mx-auto bg-white p-4 sm:p-6 rounded-3xl shadow-lg">
  <!-- Quick Filters Section -->
  <div class="flex flex-wrap justify-center sm:justify-between mb-4 items-center gap-2 sm:gap-4">
    <!-- Hidden on mobile text -->
    <p class="text-sm font-semibold text-gray-700 hidden sm:block">Choose Your Preferences:</p>

    <div class="flex flex-wrap justify-center gap-2 sm:gap-4 w-full sm:w-auto">
      <!-- Category Dropdown -->
      <el-dropdown class="inline-block w-full sm:w-auto">
        <button class="inline-flex w-full sm:w-auto justify-center gap-x-1.5 rounded-md bg-white px-2 py-2 sm:px-3 sm:py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          Category
          <svg viewBox="0 0 20 20" fill="currentColor" class="-mr-1 h-5 w-5 text-gray-400">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </button>
        <el-menu anchor="bottom end" popover class="m-0 w-56 origin-top-right rounded-md bg-white p-0 shadow-lg outline outline-1 outline-black/5">
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pizza</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sushi</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Burgers</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Desserts</a>
          </div>
        </el-menu>
      </el-dropdown>

      <!-- Restaurant Dropdown -->
      <el-dropdown class="inline-block w-full sm:w-auto">
        <button class="inline-flex w-full sm:w-auto justify-center gap-x-1.5 rounded-md bg-white px-2 py-2 sm:px-3 sm:py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          Restaurant
          <svg viewBox="0 0 20 20" fill="currentColor" class="-mr-1 h-5 w-5 text-gray-400">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </button>
        <el-menu anchor="bottom end" popover class="m-0 w-56 origin-top-right rounded-md bg-white p-0 shadow-lg outline outline-1 outline-black/5">
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Domino's</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">McDonald's</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Subway</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Starbucks</a>
          </div>
        </el-menu>
      </el-dropdown>

      <!-- Veg/Non-Veg Dropdown -->
      <el-dropdown class="inline-block w-full sm:w-auto">
        <button class="inline-flex w-full sm:w-auto justify-center gap-x-1.5 rounded-md bg-white px-2 py-2 sm:px-3 sm:py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          Filter
          <svg viewBox="0 0 20 20" fill="currentColor" class="-mr-1 h-5 w-5 text-gray-400">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </button>
        <el-menu anchor="bottom end" popover class="m-0 w-56 origin-top-right rounded-md bg-white p-0 shadow-lg outline outline-1 outline-black/5">
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Veg</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Non-Veg</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Vegan</a>
          </div>
        </el-menu>
      </el-dropdown>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="flex flex-col sm:flex-row items-stretch bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 gap-2 sm:gap-0">
    <input
      type="text"
      placeholder="Search for food, recipes, or sellers"
      class="flex-1 px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 placeholder-gray-400 transition"
    />
    <button class="bg-orange-500 text-white px-6 py-3 text-base hover:bg-orange-600 transition font-semibold flex items-center justify-center gap-2 rounded-lg sm:rounded-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
      </svg>
      Search
    </button>
  </div>
</div>




  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    effect: "fade",
    fadeEffect: { crossFade: true },
    autoplay: { delay: 2500, disableOnInteraction: false },
    loop: true,
  });
</script>




@endsection
