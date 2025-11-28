@extends('layouts.User.user')
@section('user')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

<div class="relative w-full h-[360px] sm:h-[400px] lg:h-[450px] mt-20 sm:mt-6">

  <!-- Swiper Carousel -->
  <div class="swiper mySwiper w-full h-full rounded-3xl ">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="storage/crosel/main1.png" class="w-full h-full object-cover rounded-lg" />
      </div>
      {{-- <div class="swiper-slide">
        <img src="storage/crosel/main2.png" class="w-full h-full object-cover rounded-lg" />
      </div>
      <div class="swiper-slide">
        <img src="storage/crosel/main1.png" class="w-full h-full object-cover rounded-lg" />
      </div> --}}
    </div>
  </div>

  <!-- Overlay with Gradient -->
  {{-- <div class="absolute inset-0 bg-black/40 "></div> --}}

  <!-- Centered Text and Search -->
<div class="absolute inset-0 z-20 flex flex-col items-center justify-start sm:justify-center px-2 text-center text-white pt-4 sm:pt-0 ">
<h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">
  <span class="text-orange-500">Delicious Food</span> <span class="text-gray-600">Effortlessly!</span>
</h1>


<p class="mt-4 text-lg sm:text-xl text-black">
  Discover amazing dishes or list your own in just a few clicks!
</p>

 <!-- Search Bar -->
<div class="mt-6 sm:mt-2 w-full max-w-4xl mx-auto bg-white py-4 px-2 sm:p-6 rounded-3xl shadow-lg">

    <!-- Search Bar -->
  <div id="searchBar" class="flex items-stretch bg-white rounded-xl shadow-md overflow-hidden sm:gap-0">
    <input
      type="text"
         id="searchInput"
      placeholder="Search for food, recipes, or sellers"
      class="flex-1 px-4 text-black py-3 text-base border border-gray-300 rounded-r-0 rounded-l-2 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 placeholder-gray-400 transition"
    />
   <button class="bg-orange-500 text-white px-4 py-3 text-base hover:bg-orange-600 transition 
               font-semibold flex items-center justify-center rounded-l-0 cursor-pointer">

  <i class="ri-search-ai-2-line text-2xl"></i> 

</button>

  </div>


  <!-- Quick Filters Section -->
  <div class="flex flex-wrap justify-center sm:justify-between mt-3 items-center gap-2 sm:gap-4">
    <!-- Hidden on mobile text -->
    <p class="text-sm font-semibold text-gray-700 hidden sm:block">Choose Your Preferences:</p>

<div class="flex  justify-center gap-4 ">
    
    <!-- Dropdown 1: Category -->
   <div class="dropdown-component relative inline-block text-left" id="dropdown-category">
                    <button type="button" 
                            class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            aria-expanded="false" 
                            aria-haspopup="true">
                        <span class="button-text">Category</span> 
                        <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div class="dropdown-menu origin-top-left absolute left-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                                transition-all duration-200 ease-out 
                                opacity-0 translate-y-1 scale-95 pointer-events-none   z-50"
                         role="menu" 
                         aria-orientation="vertical">
                        
                        <div class="p-2">
                            <input type="text" 
                                   placeholder="Search Category..."
                                   class="search-input w-full p-2 text-black border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400">
                        </div>
                        
                        <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                            <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Pizza</a>
                            <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Sushi</a>
                            <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Burgers</a>
                            <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Desserts</a>
                            <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Salads</a>
                        </div>
                    </div>
                </div>
    
    <!-- Dropdown 2: Restaurant -->
    <div class="dropdown-component relative inline-block text-left" id="dropdown-cuisine">
        <button type="button" 
                class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                aria-expanded="false" 
                aria-haspopup="true">
            <span class="button-text">Restaurant</span> 
            <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                    transition-all duration-200 ease-out 
                    opacity-0 translate-y-1 scale-95 pointer-events-none"
             role="menu" 
             aria-orientation="vertical">
            
            <!-- Re-added Search Box (UI only) -->
            <div class="p-2">
                <input type="text" 
                       placeholder="Search Cuisine..."
                       class="search-input w-full p-2 text-black border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400">
            </div>

            <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Italian</a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Japanese</a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Mexican</a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Thai</a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Indian</a>
            </div>
        </div>
    </div>

    
    
    <!-- Dropdown 3: Price Range (No Search Box) -->
    <div class="dropdown-component relative inline-block text-left" id="dropdown-price">
        <button type="button" 
                class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                aria-expanded="false" 
                aria-haspopup="true">
            <span class="button-text ">Price </span> 
            <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                    transition-all duration-200 ease-out 
                    opacity-0 translate-y-1 scale-95 pointer-events-none"
             role="menu" 
             aria-orientation="vertical">
            
            <div class="p-2">
                 <div class="text-sm text-gray-500 p-2">Select a range:</div>
            </div>

            <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Low </a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">Medium </a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem">High </a>
                <a href="#" class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150" role="menuitem"> </a>
            </div>
        </div>
    </div>
</div>


  </div>


</div>




  </div>
</div>
<div class="-mt-2 lg:-mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4  max-w-8xl mx-auto px-4  relative inset-0 z-10 ">




    <!-- First Card -->
   <div class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
    <div class="work_prosses_thumb flex-shrink-0 w-16 ">
        <img class="w-full h-auto" src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-5214.webp" alt="icon">
    </div>

    <div class="work_prosses_txt whitespace-normal">
        <h4 class="text-xl font-semibold mb-1 text-gray-800">
            Search Product
        </h4>

        <p class="text-gray-600 text-lg whitespace-normal">
            Unlocking you effect product searching
        </p>
    </div>
</div>


    <!-- Second Card -->
   <!-- Second Card -->
<div class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
    <div class="work_prosses_thumb flex-shrink-0 w-16 ">
        <img class="w-full h-auto" src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7737.webp" alt="icon">
    </div>

    <div class="work_prosses_txt">
        <h4 class="text-xl font-semibold mb-1 text-gray-800">
            Add to Cart
        </h4>
        <p class="text-gray-600 text-lg flex flex-wrap">
            Add to Cart for Instant Retail Gratification
        </p>
    </div>
</div>

<!-- Third Card -->
<div class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
    <div class="work_prosses_thumb flex-shrink-0 w-16 ">
        <img class="w-full h-auto" src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7531.webp" alt="icon">
    </div>

    <div class="work_prosses_txt">
        <h4 class="text-xl font-semibold mb-1 text-gray-800">
            Enjoy Food
        </h4>
        <p class="text-gray-600 text-lg flex flex-wrap">
            A Journey to Enjoying Food’s Delights
        </p>
    </div>
</div>

<!-- Fourth Card -->
<div class="work_prosses_item border h-32 py-6 bg-white px-4 border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
    <div class="work_prosses_thumb flex-shrink-0 w-16 ">
        <img class="w-full h-auto" src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7223.webp" alt="icon">
    </div>

    <div class="work_prosses_txt">
        <h4 class="text-xl font-semibold mb-1 text-gray-800">
            Flexible Payment
        </h4>
        <p class="text-gray-600 text-lg flex flex-wrap">
            Pay online with Multiple credit Cards or Cash!
        </p>
    </div>
</div>


</div>



{{-- <div class="flex">
<div class="bg-white px-5 py-3 rounded-2xl shadow-xl w-80 mx-auto">
    
    <div class="flex items-start space-x-4 md:space-x-6">
        
        <div class="flex-shrink-0">
         
            <img 
                src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-5214.webp" 
                alt="3D Search Magnifier Icon" 
                class="w-16 h-16 object-cover" 
            />
        </div>
        
        <div>
            <h2 class="text-xl font-extrabold text-gray-900 mb-1 leading-tight">
                Search Product
            </h2>
            
            <p class="text-sm text-gray-600">
                Unlocking your effective product searching experience.
            </p>
        </div>
    </div>
    
</div> --}}

</div>

{{-- All Restaurent --}}


  <div class="max-w-8xl mx-auto px-4">
        <!-- Header Section -->
        <header class="flex justify-between items-center mb-6 sm:mb-10 pt-4">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800">All Restaurant</h1>
            <button class="px-4 py-2 bg-white text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-150 border border-gray-200 text-sm">
                View more
            </button>
        </header>

        <!-- Restaurant Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

           <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 
            w-full max-w-md mx-auto"> <div class="relative h-28">
        <img src="https://kababjeesfriedchicken.com/_next/image?url=https%3A%2F%2Fassets.indolj.io%2Fupload%2F1761988958-566642512-2644144789270118-7248347062835041410-n.jpg%3Fver%3D10&w=1920&q=90" 
             alt="Kababjees Food banner" class="w-full h-full object-cover">
        
        <span class="absolute top-2 left-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            Featured
        </span>
        <span class="absolute top-2 right-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            50% OFF
        </span>
        
        <div class="absolute bottom-0 left-3 transform translate-y-1/2 p-0.5 bg-white rounded-full shadow-lg border border-gray-200">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcIneOQOVaghfgZntvSsG-VMq-gMX1ZAQj9A&s" 
                 alt="Kababjees logo" class="w-12 h-12 rounded-full object-cover">
        </div>
    </div>
    
    <div class="p-3 pt-8">
        <div class="flex justify-between items-start">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                Kababjees
                <span class="text-blue-500 text-sm ml-1" title="Verified">&#10003;</span>
            </h2>
            <span class="text-sm font-semibold text-green-600 bg-green-100 px-2 py-0.5 rounded-full">
                Open
            </span>
        </div>

        <div class="flex justify-between items-center text-sm mt-1 mb-2">
            
            <div class="flex items-center text-gray-500">
                <svg class="w-3.5 h-3.5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="truncate">Banshal</span>
            </div>
            
            <div class="flex items-center">
                <span class="text-yellow-500 text-base mr-1">★★★★☆</span>
                <span class="font-bold text-gray-700">4.5</span>
                <span class="ml-1 text-gray-500 text-xs">(5)</span>
            </div>
        </div>
        
        <div class="flex justify-between items-center border-t pt-2">
            <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">30-45 min</span>
                <span class="mx-1 text-gray-300">|</span>
                <span class="font-medium">2.5 km</span>
            </div>
            
            <button class="text-gray-400 hover:text-red-500 transition duration-150 p-1 rounded-full focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </button>
        </div>
    </div>
</div>

    <!-- Card 2 -->
       <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 
            w-full max-w-md mx-auto"> <div class="relative h-28">
        <img src="https://kababjeesfriedchicken.com/_next/image?url=https%3A%2F%2Fassets.indolj.io%2Fupload%2F1761988958-566642512-2644144789270118-7248347062835041410-n.jpg%3Fver%3D10&w=1920&q=90" 
             alt="Kababjees Food banner" class="w-full h-full object-cover">
        
        <span class="absolute top-2 left-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            Featured
        </span>
        <span class="absolute top-2 right-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            50% OFF
        </span>
        
        <div class="absolute bottom-0 left-3 transform translate-y-1/2 p-0.5 bg-white rounded-full shadow-lg border border-gray-200">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcIneOQOVaghfgZntvSsG-VMq-gMX1ZAQj9A&s" 
                 alt="Kababjees logo" class="w-12 h-12 rounded-full object-cover">
        </div>
    </div>
    
    <div class="p-3 pt-8">
        <div class="flex justify-between items-start">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                Kababjees
                <span class="text-blue-500 text-sm ml-1" title="Verified">&#10003;</span>
            </h2>
            <span class="text-sm font-semibold text-green-600 bg-green-100 px-2 py-0.5 rounded-full">
                Open
            </span>
        </div>

        <div class="flex justify-between items-center text-sm mt-1 mb-2">
            
            <div class="flex items-center text-gray-500">
                <svg class="w-3.5 h-3.5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="truncate">Banshal</span>
            </div>
            
            <div class="flex items-center">
                <span class="text-yellow-500 text-base mr-1">★★★★☆</span>
                <span class="font-bold text-gray-700">4.5</span>
                <span class="ml-1 text-gray-500 text-xs">(5)</span>
            </div>
        </div>
        
        <div class="flex justify-between items-center border-t pt-2">
            <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">30-45 min</span>
                <span class="mx-1 text-gray-300">|</span>
                <span class="font-medium">2.5 km</span>
            </div>
            
            <button class="text-gray-400 hover:text-red-500 transition duration-150 p-1 rounded-full focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </button>
        </div>
    </div>
</div>

    <!-- Card 3 -->
       <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 
            w-full max-w-md mx-auto"> <div class="relative h-28">
        <img src="https://kababjeesfriedchicken.com/_next/image?url=https%3A%2F%2Fassets.indolj.io%2Fupload%2F1761988958-566642512-2644144789270118-7248347062835041410-n.jpg%3Fver%3D10&w=1920&q=90" 
             alt="Kababjees Food banner" class="w-full h-full object-cover">
        
        <span class="absolute top-2 left-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            Featured
        </span>
        <span class="absolute top-2 right-2 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow-md">
            50% OFF
        </span>
        
        <div class="absolute bottom-0 left-3 transform translate-y-1/2 p-0.5 bg-white rounded-full shadow-lg border border-gray-200">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcIneOQOVaghfgZntvSsG-VMq-gMX1ZAQj9A&s" 
                 alt="Kababjees logo" class="w-12 h-12 rounded-full object-cover">
        </div>
    </div>
    
    <div class="p-3 pt-8">
        <div class="flex justify-between items-start">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                Kababjees
                <span class="text-blue-500 text-sm ml-1" title="Verified">&#10003;</span>
            </h2>
            <span class="text-sm font-semibold text-green-600 bg-green-100 px-2 py-0.5 rounded-full">
                Open
            </span>
        </div>

        <div class="flex justify-between items-center text-sm mt-1 mb-2">
            
            <div class="flex items-center text-gray-500">
                <svg class="w-3.5 h-3.5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="truncate">Banshal</span>
            </div>
            
            <div class="flex items-center">
                <span class="text-yellow-500 text-base mr-1">★★★★☆</span>
                <span class="font-bold text-gray-700">4.5</span>
                <span class="ml-1 text-gray-500 text-xs">(5)</span>
            </div>
        </div>
        
        <div class="flex justify-between items-center border-t pt-2">
            <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">30-45 min</span>
                <span class="mx-1 text-gray-300">|</span>
                <span class="font-medium">2.5 km</span>
            </div>
            
            <button class="text-gray-400 hover:text-red-500 transition duration-150 p-1 rounded-full focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </button>
        </div>
        
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
  
const searchInput = document.getElementById('searchInput');
const searchBar = document.getElementById('searchBar');

searchInput.addEventListener('focus', () => {
  if (window.innerWidth <= 640) { // mobile only
    // Scroll the search bar to the top
    const topPos = searchBar.offsetTop; 
    window.scrollTo({
      top: topPos,
      behavior: 'smooth'
    });
  }
});



    // Get all dropdown components
    const dropdownComponents = document.querySelectorAll('.dropdown-component');
    
    // Function to handle the state logic for a single dropdown
    const createDropdownHandler = (container) => {
        const button = container.querySelector('.dropdown-button');
        const menu = container.querySelector('.dropdown-menu');
        const icon = container.querySelector('.dropdown-icon');
        const items = container.querySelectorAll('.category-item');
        const buttonText = container.querySelector('.button-text');
        
        let isOpen = false;
        
        // Function to toggle dropdown state
        const toggleDropdown = (state) => {
            isOpen = state !== undefined ? state : !isOpen;

            // Close all other open dropdowns
            if (isOpen) {
                 dropdownComponents.forEach(comp => {
                    if (comp !== container) {
                        const otherHandler = comp.handler;
                        // Check if handler exists and if the other dropdown is open
                        if (otherHandler && otherHandler.isOpen()) { 
                            otherHandler.toggleDropdown(false);
                        }
                    }
                });
            }

            // Tailwind classes for visibility and transition effects
            const hiddenClasses = ['opacity-0', 'translate-y-1', 'scale-95', 'pointer-events-none'];
            const visibleClasses = ['opacity-100', 'translate-y-0', 'scale-100'];

            if (isOpen) {
                // Open menu
                menu.classList.remove(...hiddenClasses);
                menu.classList.add(...visibleClasses);
                icon.classList.add('rotate-180');
                button.setAttribute('aria-expanded', 'true');
            } else {
                // Close menu
                menu.classList.remove(...visibleClasses);
                menu.classList.add(...hiddenClasses);
                icon.classList.remove('rotate-180');
                button.setAttribute('aria-expanded', 'false');
            }
        };

        // Event Listeners for this specific component
        button.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleDropdown();
        });

        // Item selection: update button text and close dropdown
        items.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const selectedValue = item.textContent.trim();
                buttonText.textContent = selectedValue; // Update button text
                toggleDropdown(false); // Close the dropdown
            });
        });
        
        // Expose toggle and isOpen for external use
        container.handler = { toggleDropdown, isOpen: () => isOpen };
        
        return { toggleDropdown, isOpen: () => isOpen };
    };

    // Initialize all dropdowns
    dropdownComponents.forEach(container => {
        createDropdownHandler(container);
    });

    // Global listener to close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        dropdownComponents.forEach(container => {
            const handler = container.handler;
            // Check if handler exists and if the other dropdown is open
            if (handler && handler.isOpen()) {
                if (!container.contains(e.target)) {
                    handler.toggleDropdown(false);
                }
            }
        });
    });

  </script>



@endsection
