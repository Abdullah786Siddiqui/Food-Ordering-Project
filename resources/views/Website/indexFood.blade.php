@extends('layouts.User.user')
@section('user')
    <div class="relative w-full h-[360px] sm:h-[400px] lg:h-[450px] mt-20 sm:mt-6">

        <!-- Swiper Carousel -->
        <div class="swiper mySwiper w-full h-full rounded-3xl ">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('storage/crosel/main2.png') }}" class="w-full h-full object-cover rounded-lg" />
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
        <div
            class="absolute inset-0 z-20 flex flex-col items-center justify-start sm:justify-center px-2 text-center text-white pt-4 sm:pt-0 ">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">
                <span class="text-orange-500">Discover Great Food</span>
                <span class="text-gray-600">Right Near You</span>

            </h1>

            <p class="mt-4 text-lg sm:text-xl text-black">
                Sign up now and enjoy free delivery on your first order. Tasty meals, zero hassle!
            </p>


            <style>
                #spinIcon {
                    display: inline-block;
                }

                .spin {
                    animation: rotate 1s linear infinite;
                }

                @keyframes rotate {
                    from {
                        transform: rotate(0deg);
                    }

                    to {
                        transform: rotate(360deg);
                    }
                }
            </style>

            <!-- Search Bar -->
            <div id="scrollsearchbar"
                class="mt-6 sm:mt-2 w-full max-w-4xl mx-auto bg-white py-4 px-2 sm:p-6 rounded-3xl shadow-lg">


                {{-- Search Bar Before Location Accept  --}}

                <div id="beforeSearchBar">
                    <div class="relative w-full">
                        <input type="text" id="searchbar" placeholder="Enter your Address"
                            class="w-full  px-4 pr-20 py-3 text-black text-base border border-gray-300 rounded-xl 
           focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-gray-300 
           placeholder-gray-400 transition"
                            oninput="fetchSuggestions(this.value)" />

                        <button onclick="handleLocateMe()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-1 
         text-black font-semibold cursor-pointer px-3 py-1 rounded-lg
         hover:bg-gray-200 transition">
                            <i id="spinIcon" class="ri-focus-3-line text-lg"></i>
                            <span>Locate me</span>
                        </button>

                        <!-- Dropdown container -->
                        <ul id="suggestionsList"
                            class="absolute z-50 bg-white w-full mt-1 rounded-xl border border-gray-300 max-h-60 overflow-y-auto hidden">
                        </ul>
                    </div>




                </div>
                <div id="findfood" class=" w-full max-w-4xl mx-auto flex justify-between items-center mt-3 gap-2">
                    <p class="text-gray-700 text-base  hidden lg:flex">Search for restaurants, dishes or sellers</p>
                    <a href="{{ route('user.home') }}" id="findfoodbtn"
                        class="bg-orange-500 w-full sm:w-56 md:w-64 lg:w-72 text-white px-4 py-2 rounded-lg transition font-semibold cursor-not-allowed opacity-50 pointer-events-none hover:bg-orange-600">
                        Find Food
                    </a>

                </div>

                <!-- Quick Filters Section -->
                <div id="quickFilter"
                    class="flex hidden flex-wrap justify-center sm:justify-between mt-3 items-center gap-2 sm:gap-4">
                    <!-- Hidden on mobile text -->
                    <p class="text-sm font-semibold text-gray-700 hidden sm:block">Choose Your Preferences:</p>

                    <div class="flex  justify-center gap-2 sm:gap-4 ">

                        <!-- Dropdown 1: Category -->
                        <div class="dropdown-component relative inline-block text-left" id="dropdown-category">
                            <button type="button"
                                class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                aria-expanded="false" aria-haspopup="true">
                                <span class="button-text">Category</span>
                                <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="dropdown-menu origin-top-left absolute left-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                                transition-all duration-200 ease-out 
                                opacity-0 translate-y-1 scale-95 pointer-events-none   z-50"
                                role="menu" aria-orientation="vertical">

                                <div class="p-2">
                                    <input type="text" placeholder="Search Category..."
                                        class="search-input w-full p-2 text-black border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400">
                                </div>

                                <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Pizza</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Sushi</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Burgers</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Desserts</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Salads</a>
                                </div>
                            </div>
                        </div>

                        <!-- Dropdown 2: Restaurant -->
                        <div class="dropdown-component relative inline-block text-left" id="dropdown-cuisine">
                            <button type="button"
                                class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                aria-expanded="false" aria-haspopup="true">
                                <span class="button-text">Restaurant</span>
                                <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                    transition-all duration-200 ease-out 
                    opacity-0 translate-y-1 scale-95 pointer-events-none"
                                role="menu" aria-orientation="vertical">

                                <!-- Re-added Search Box (UI only) -->
                                <div class="p-2">
                                    <input type="text" placeholder="Search Cuisine..."
                                        class="search-input w-full p-2 text-black border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400">
                                </div>

                                <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Italian</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Japanese</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Mexican</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Thai</a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Indian</a>
                                </div>
                            </div>
                        </div>



                        <!-- Dropdown 3: Price Range (No Search Box) -->
                        <div class="dropdown-component relative inline-block text-left" id="dropdown-price">
                            <button type="button"
                                class="dropdown-button cursor-pointer inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                aria-expanded="false" aria-haspopup="true">
                                <span class="button-text ">Price </span>
                                <svg class="dropdown-icon -mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-56 sm:w-64 rounded-xl shadow-2xl bg-white ring-1 ring-gray ring-opacity-5 divide-y divide-gray-100 
                    transition-all duration-200 ease-out 
                    opacity-0 translate-y-1 scale-95 pointer-events-none"
                                role="menu" aria-orientation="vertical">

                                <div class="p-2">
                                    <div class="text-sm text-gray-500 p-2">Select a range:</div>
                                </div>

                                <div class="py-1 max-h-60 overflow-y-auto category-list" role="none">
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Low </a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">Medium </a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem">High </a>
                                    <a href="#"
                                        class="category-item text-gray-700 block px-4 py-2 text-sm hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150"
                                        role="menuitem"> </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>




        </div>
    </div>
    <div id="cards"
        class="-mt-2 lg:-mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4  max-w-8xl mx-auto px-4  relative inset-0 z-10 ">




        <!-- First Card -->
        <div
            class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
            <div class="work_prosses_thumb flex-shrink-0 w-16 ">
                <img class="w-full h-auto"
                    src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-5214.webp"
                    alt="icon">
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
        <div
            class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
            <div class="work_prosses_thumb flex-shrink-0 w-16 ">
                <img class="w-full h-auto"
                    src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7737.webp"
                    alt="icon">
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
        <div
            class="work_prosses_item border h-32 py-6 px-4 bg-white border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
            <div class="work_prosses_thumb flex-shrink-0 w-16 ">
                <img class="w-full h-auto"
                    src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7531.webp"
                    alt="icon">
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
        <div
            class="work_prosses_item border h-32 py-6 bg-white px-4 border-gray-200 rounded-lg flex items-center gap-4 overflow-hidden">
            <div class="work_prosses_thumb flex-shrink-0 w-16 ">
                <img class="w-full h-auto"
                    src="https://risuvo.com/foodigo/uploads/custom-images/working-step--2025-03-12-09-57-57-7223.webp"
                    alt="icon">
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

    <script>
        const searchbar = document.getElementById('searchbar');

        searchbar.addEventListener('focus', () => {
            if (window.innerWidth <= 640) { // mobile only
                const topPos = afterSearchBar.offsetTop;
                window.scrollTo({
                    top: topPos,
                    behavior: 'smooth'
                });
            }
        });


        async function fetchSuggestions(query) {

            const list = document.getElementById('suggestionsList');

            const icon = document.getElementById("spinIcon");

            document.getElementById("spinIcon").classList.add("spin");




            if (!query) {
                list.innerHTML = '';
                list.classList.add('hidden');
                document.getElementById("spinIcon").classList.remove("spin");

                return;
            }

            try {
                const res = await fetch(
                    `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`);
                const data = await res.json();

                if (!data.length) {
                    list.innerHTML = '<li class="px-4 py-2 text-gray-500">No results found</li>';
                    list.classList.remove('hidden');
                    return;
                }

                list.innerHTML = data.map(place => `
      <li 
        class="px-4 py-3 hover:bg-orange-100 cursor-pointer text-black text-left transition"
        onclick="selectAddress('${place.display_name.replace(/'/g, "\\'")}', ${place.lat}, ${place.lon})"
      >
        ${place.display_name}
      </li>
    `).join('');

                list.classList.remove('hidden');
                document.getElementById("spinIcon").classList.remove("spin");

            } catch (err) {
                console.error(err);
                list.innerHTML = '<li class="px-4 py-2 text-red-500">Error fetching results</li>';
                list.classList.remove('hidden');
            }
        }

        function selectAddress(name, lat, lon) {
            document.getElementById('searchbar').value = name;
            document.getElementById('suggestionsList').classList.add('hidden');
            console.log('Selected:', name, lat, lon);
            // Yahan aap backend ya map ke liye lat/lon bhej sakte ho
        }

        // Optional: hide dropdown if clicked outside
        document.addEventListener('click', (e) => {
            if (!document.getElementById('searchInput').contains(e.target) && !document.getElementById(
                    'suggestionsList').contains(e.target)) {
                document.getElementById('suggestionsList').classList.add('hidden');
            }
        });

        async function handleLocateMe() {
            const icon = document.getElementById("spinIcon");
            icon.classList.add("spin");

            if (!navigator.geolocation) {
                console.log("Geolocation is not supported by your browser");
                icon.classList.remove("spin");
                return;
            }

            navigator.geolocation.getCurrentPosition(async (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                try {
                    const res = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`);
                    const data = await res.json();

                    const fullAddress = data.display_name || '';
                    let parts = fullAddress.split(',');
                    const shortAddress = parts.slice(0, 2).join(',').trim();

                    document.getElementById("searchbar").value = shortAddress;

                    const addressDetails = data.address || {};
                    const city = addressDetails.city || addressDetails.town || addressDetails.village || '';
                    const road = addressDetails.road || '';

                    const location = {
                        latitude: lat,
                        longitude: lon,
                        city,
                        road,
                        fullAddress: shortAddress
                    };

                    // Enable Find Food button
                    const btn = document.getElementById("findfoodbtn");
                    btn.classList.remove("opacity-50", "pointer-events-none", "cursor-not-allowed");
                    btn.classList.add("cursor-pointer");

                    // Remove any previous event listeners to avoid multiple triggers
                    btn.replaceWith(btn.cloneNode(true));
                    const newBtn = document.getElementById("findfoodbtn");

                    newBtn.addEventListener("click", async () => {
                        try {
                            const response = await fetch('/user/location', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    location
                                })
                            });

                            // Redirect if backend responds with redirect
                            if (response.redirected) {
                                window.location.href = response.url;
                            }
                        } catch (err) {
                            console.error("Error sending location to backend:", err);
                        }
                    });

                } catch (err) {
                    console.error(err);
                } finally {
                    icon.classList.remove("spin");
                }
            }, (error) => {
                console.log("Unable to retrieve your location: " + error.message);
                icon.classList.remove("spin");
            });
        }
    </script>
@endsection
