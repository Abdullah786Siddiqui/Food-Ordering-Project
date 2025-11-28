{{-- https://docs.google.com/spreadsheets/d/16yb-LE-O_UVD3KtEACoj2AoRYbPYhu6PavCtwkOEma8/edit?gid=1613316536#gid=1613316536 --}}
<nav  class="w-full fixed top-0 scrollDiv bg-white  z-50 ">
    
    <div class="hidden lg:flex items-center justify-between max-w-8xl mx-auto py-2 px-6 space-x-6">

    <div class="relative w-full h-16 bg-white px-4">
  
  <!-- Logo absolute -->
  <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
    <img src="{{ asset('storage/logo/logo.png') }}" alt="logo" class="h-9 w-auto object-contain" />
  </div>

  <!-- Address center -->
  <div class="flex h-full justify-center items-center ">
    <div class="flex w-full max-w-2xl">
      <div class="flex items-center justify-center cursor-pointer  border border-gray-300 p-1.5 px-8 text-gray-900 rounded-lg hover:bg-gray-100 transition-colors duration-200 flex-1">
        <i class="ri-map-pin-line text-blue-600 text-2xl mr-2"></i>
        <span class="text-lg font-medium whitespace-nowrap">New Address Service Road W Islamabad</span>
      </div>
    </div>
  </div>

</div>


        
        <div class="flex items-center gap-2 flex-shrink-0">
            
            @auth
           
              <div class="flex items-center space-x-2 relative">
  <!-- User Dropdown -->
 <el-dropdown class="hidden lg:flex md:flex  relative overflow-hidden ">
 <!-- Trigger Button -->
<button
  class="inline-flex w-full items-center justify-center gap-2
         text-black font-semibold rounded-xl shadow-md
         px-4 py-2 text-sm md:text-base lg:text-lg
         hover:shadow-lg transition-shadow duration-200
         md:px-5 md:py-2 lg:px-6 lg:py-2 lg:mt-1
         bg-white border border-gray-200 hover:border-orange-500 cursor-pointer">
  My Account
  <svg 
    viewBox="0 0 20 20" fill="currentColor"
    class="w-5 h-5 text-gray-500 md:w-4 md:h-4 lg:w-5 lg:h-5 -mr-1"
  >
    <path 
      d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
      fill-rule="evenodd" clip-rule="evenodd"
    />
  </svg>
</button>



  <el-menu anchor="bottom end" popover
  class="m-0 w-60 origin-top-right rounded-xl bg-white p-0 shadow-2xl border border-gray-100
         transition-all duration-150
         ">

  <div class="py-2">

    <!-- Dashboard -->
    <a href="#"
      class="flex items-center px-4 py-2.5 text-sm text-gray-700 rounded-lg
             hover:bg-gradient-to-r hover:from-orange-50 hover:to-orange-100
             hover:text-orange-600 transition-all duration-150">
      <i class="ri-dashboard-line mr-3 text-orange-500 text-lg"></i>
      Dashboard
    </a>

    <!-- Profile -->
    <a href="#"
      class="flex items-center px-4 py-2.5 text-sm text-gray-700 rounded-lg
             hover:bg-gradient-to-r hover:from-orange-50 hover:to-orange-100
             hover:text-orange-600 transition-all duration-150">
      <i class="ri-user-3-line mr-3 text-orange-500 text-lg"></i>
      Profile
    </a>

    <!-- Settings -->
    <a href="#"
      class="flex items-center px-4 py-2.5 text-sm text-gray-700 rounded-lg
             hover:bg-gradient-to-r hover:from-orange-50 hover:to-orange-100
             hover:text-orange-600 transition-all duration-150">
      <i class="ri-settings-3-line mr-3 text-orange-500 text-lg"></i>
      Settings
    </a>

    <!-- Divider -->
    <div class="my-2 mx-4 border-t border-gray-200"></div>

    <!-- Logout -->
    <form method="POST" action="{{ route('user.logout') }}">
      @csrf
      <button type="submit"
        class="flex items-center w-full px-4 py-2.5 text-sm text-gray-700 rounded-lg
               hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100
               hover:text-red-600 transition-all duration-150">
        <i class="ri-logout-circle-r-line mr-3 text-red-500 text-lg"></i>
        Logout
      </button>
    </form>

  </div>
</el-menu>
</el-dropdown>

  <!-- Favorites Icon -->
  <button class="text-gray-600 hover:text-orange-500 transition ml-1 duration-150 text-3xl">
    <i class="ri-heart-line"></i>
  </button>
</div>



                {{-- <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" 
                        class="border border-gray-300 px-4 py-2 rounded-lg text-sm hover:bg-gray-100 inline-block text-center cursor-pointer font-medium text-gray-700">
                        Logout
                    </button>
                </form> --}}
            @else
                <a href="{{ route('user.login') }}" class="border border-gray-300 px-4 py-2 rounded-lg text-sm hover:bg-gray-100 inline-block text-center font-medium text-gray-700">
                    Log in
                </a>
                <a href="{{ route('user.register') }}" class="bg-orange-600 text-white px-5 py-2 rounded-lg text-sm hover:bg-orange-700 inline-block text-center font-semibold">
                    Sign up for free delivery
                </a>
            @endauth

           <div class="hidden md:flex items-center mt-2 ">
    @auth
        <!-- Authenticated User: Normal Cart Icon -->
        <div class="relative cursor-pointer hover:opacity-80" data-drawer-target="cart-drawer" data-drawer-show="cart-drawer" data-drawer-placement="right" aria-controls="cart-drawer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-width="1.5" d="M3 3h2l3 12h10l3-8H6" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-orange-600 text-white text-sm w-6 h-6 flex items-center justify-center rounded-full">5</span>
        </div>
    @else
        <!-- Guest: Dimmed and Disabled -->
        <div class="relative cursor-not-allowed opacity-50 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-width="1.5" d="M3 3h2l3 12h10l3-8H6" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-gray-400 text-white text-sm w-6 h-6 flex items-center justify-center rounded-full">0</span>
            
            <!-- Not allowed icon on hover -->
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-width="2" d="M12 8v4m0 4h.01M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z" />
                </svg>
            </div>
        </div>
    @endauth
</div>
        </div>

    </div>


    <div  class="lg:hidden pt-3  scrollDiv px-5 fixed top-0 z-50 w-full bg-white">
        
        <div class="flex items-center justify-between">

            <div class="flex items-center flex-shrink-0 mb-1">
                @auth
                    <div data-drawer-target="user-drawer" data-drawer-show="user-drawer" data-drawer-placement="left" aria-controls="user-drawer" class="cursor-pointer hover:opacity-80 p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-width="1.5" d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5z" />
                            <path stroke-linecap="round" stroke-width="1.5" d="M4 22c0-4 4-7 8-7s8 3 8 7" />
                        </svg>
                    </div>
                @else
                    <div id="openDrawerBtn" class="flex items-center cursor-pointer p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-width="1.5" d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5z" />
                            <path stroke-linecap="round" stroke-width="1.5" d="M4 22c0-4 4-7 8-7s8 3 8 7" />
                        </svg>
                    </div>
                @endauth
            </div>

            <div class="flex-grow flex justify-center">
                <a href="/">
                    <img src="{{ asset('storage/logo/logo.png') }}" alt="logo" class="h-9 w-auto object-contain" />
                </a>
            </div>
            
             <div class="lg:hidden  items-center  ">
    @auth
        <!-- Authenticated User: Normal Cart Icon -->
        <div class="relative cursor-pointer hover:opacity-80" data-drawer-target="cart-drawer" data-drawer-show="cart-drawer" data-drawer-placement="right" aria-controls="cart-drawer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-width="1.5" d="M3 3h2l3 12h10l3-8H6" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-orange-600 text-white text-sm w-6 h-6 flex items-center justify-center rounded-full">5</span>
        </div>
    @else
        <!-- Guest: Dimmed and Disabled -->
        <div class="relative cursor-not-allowed opacity-50 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-width="1.5" d="M3 3h2l3 12h10l3-8H6" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-gray-400 text-white text-sm w-6 h-6 flex items-center justify-center rounded-full">0</span>
            
            <!-- Not allowed icon on hover -->
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-width="2" d="M12 8v4m0 4h.01M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z" />
                </svg>
            </div>
        </div>
    @endauth
</div>

        </div>
<div class="flex justify-center mt-4">
  <div class="flex items-center justify-center space-x-5 bg-white p-2 cursor-pointer md:p-2 md:space-x-6">
    <i class="ri-map-pin-line text-blue-600 text-3xl md:text-4xl flex-shrink-0 animate-bounce-slow"></i>
    <div>
      <span class="block text-gray-900 font-semibold text-base md:text-xl">New Address Service Road</span>
      <span class="block text-gray-500 text-sm md:text-base">Islamabad, Pakistan</span>
    </div>
  </div>
</div>



    </div>
<script>
let lastScrollTop = 0;
const scrollDivs = document.querySelectorAll('.scrollDiv'); // multiple navbars
let ticking = false;
const offsetToHide = 10;

window.addEventListener('scroll', () => {
    const st = window.pageYOffset || document.documentElement.scrollTop;

    if (!ticking) {
        window.requestAnimationFrame(() => {
            scrollDivs.forEach(div => {
                if (st > lastScrollTop + offsetToHide) {
                    // scrolling down
                    div.style.transform = 'translateY(-100%)';
                } else if (st < lastScrollTop - offsetToHide || st === 0) {
                    // scrolling up
                    div.style.transform = 'translateY(0)';
                }
            });

            lastScrollTop = st <= 0 ? 0 : st;
            ticking = false;
        });
        ticking = true;
    }
});

</script>
</nav>



{{-- @php
    function activeTab($route) {
        return request()->routeIs($route)
            ? 'border-orange-600 text-orange-600 '
            : 'border-transparent text-gray-500';
    }
@endphp

<nav class="bg-white w-full border-b border-gray-200 md:mt-2 shadow-lg">
 <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 scrollbar-hide">
<div class="flex gap-16 overflow-x-auto">

  <div class="flex gap-16 overflow-x-auto">

    <!-- Delivery -->
    <a href="{{ route('user.home') }}" class="group flex flex-col items-center relative">
        <div class="flex gap-2 items-center mb-3">
            <i class="ri-e-bike-2-line text-2xl
                {{ request()->routeIs('user.home') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
            </i>
            <span class="text-sm font-medium
                {{ request()->routeIs('user.home') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
                Delivery
            </span>
        </div>
        <!-- underline -->
        <span class="absolute bottom-0 h-1 bg-orange-600 transition-all duration-300
                     {{ request()->routeIs('user.home') ? 'w-full opacity-100' : 'w-2/5 opacity-0 group-hover:opacity-100 group-hover:w-1/2' }}">
        </span>
    </a>

    <!-- Pick-up -->
    <a href="{{ route('user.pickup') }}" class="group flex flex-col items-center relative">
        <div class="flex gap-2 items-center">
            <i class="ri-walk-line text-2xl
                {{ request()->routeIs('user.pickup') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
            </i>
            <span class="text-sm font-medium
                {{ request()->routeIs('user.pickup') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
                Pick-up
            </span>
        </div>
        <span class="absolute bottom-0 h-1 bg-orange-600 transition-all duration-300
                     {{ request()->routeIs('user.pickup') ? 'w-full opacity-100' : 'w-2/5 opacity-0 group-hover:opacity-100 group-hover:w-1/2' }}">
        </span>
    </a>

<a href="{{ route('user.caterers') }}" class="group flex flex-col items-center relative">
    <div class="flex gap-2 items-center mb-3">
        <i class="ri-hotel-line text-2xl
            {{ request()->routeIs('user.caterers') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
        </i>
        <span class="text-sm font-medium
            {{ request()->routeIs('user.caterers') ? 'text-orange-600' : 'text-gray-500 group-hover:text-orange-600' }}">
            Caterers
        </span>
    </div>
    <!-- underline -->
    <span class="absolute bottom-0 h-1 bg-orange-600 transition-all duration-300
                 {{ request()->routeIs('user.caterers') ? 'w-full opacity-100' : 'w-2/5 opacity-0 group-hover:opacity-100 group-hover:w-1/2' }}">
    </span>
</a>




    <!-- Caterers -->
    {{-- <a href=""
       class="flex gap-2 items-center border-b-4 {{ activeTab('user.caterers') }} hover:border-orange-600 hover:text-orange-600 transition-all duration-300 flex-shrink-0">
        <i class="ri-hotel-line text-2xl mb-1"></i>
        <span class="text-sm font-medium">Caterers</span>
    </a> --}}
{{-- 
</div>

</div>

</nav> --}} 



<!-- Drawer Overlay -->
<div id="drawerOverlay" class="fixed inset-0 bg-black/50 opacity-0 transition-opacity duration-300 hidden z-40"></div>



<!-- Bottom Drawer -->
<div id="drawer" class="fixed inset-x-0 bottom-0 bg-white rounded-t-3xl shadow-lg max-h-[80vh] overflow-y-auto transform translate-y-full transition-transform duration-300 z-50">
<div class="p-6 md:p-8 flex flex-col h-full justify-between">

  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <span class="text-xl font-bold text-orange-600">Quickfood</span>
    <button id="closeDrawerBtn" class="text-gray-400 hover:text-gray-700 focus:outline-none " >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Welcome Section -->
  <div class="text-center mb-8">
    <h2 class="text-3xl font-bold text-gray-900">Welcome!</h2>
    <p class="text-md text-gray-500 mt-1">Sign up or log in to continue</p>
  </div>

  <!-- Social Buttons -->
<div class="space-y-3 mb-2">
  <button class="w-full flex items-center justify-center bg-blue-600 text-white py-3 rounded-xl font-semibold shadow-md hover:bg-blue-700 transition duration-150">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mr-2" fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.353c-.349 0-.647.228-.647.659v1.341h2l-.307 2h-1.693v5h-2v-5h-1.693v-2h1.693v-1.603c0-1.233.985-2.26 2.222-2.26h1.778v2z"/>
    </svg>
    <span class="ml-4">
    Continue with Facebook

    </span>
  </button>

  <button class="w-full flex items-center justify-center bg-white border border-gray-200 py-3 px-4 rounded-xl shadow-md hover:bg-gray-50 transition duration-150">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png" alt="Google Logo" class="h-5 w-5 mr-3">
    
    <span class="text-gray-800 font-semibold text-sm">
      Continue with Google
    </span>
  </button>

  <button class="w-full flex items-center justify-center bg-black text-white py-3 rounded-xl font-semibold shadow-md hover:bg-gray-800 transition duration-150">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 2.2c3.27 0 6.13 2.19 7.42 5.14.07.16.11.33.11.5v7.22c0 .44-.36.8-.8.8H5.27c-.44 0-.8-.36-.8-.8V7.84c0-.17.04-.34.11-.5 1.29-2.95 4.15-5.14 7.42-5.14zm0-2.2c-4.42 0-8 3.58-8 8v8c0 4.42 3.58 8 8 8s8-3.58 8-8V8c0-4.42-3.58-8-8-8zM12 3.6c-2.4 0-4.4 1.79-4.8 4.19-.04.2-.06.4-.06.61v6.2c0 .22.18.4.4.4h8.8c.22 0 .4-.18.4-.4V8.4c0-.21-.02-.41-.06-.61-.4-2.4-2.4-4.19-4.8-4.19zM12 5.2c1.99 0 3.6 1.61 3.6 3.6s-1.61 3.6-3.6 3.6-3.6-1.61-3.6-3.6 1.61-3.6 3.6-3.6z"/>
      <path d="M12 6.4c-1.33 0-2.4 1.07-2.4 2.4s1.07 2.4 2.4 2.4 2.4-1.07 2.4-2.4-1.07-2.4-2.4-2.4z"/>
    </svg>
    Continue with Apple
  </button>
</div>


  <!-- OR Divider -->
  <div class="flex items-center my-6">
    <hr class="flex-grow border-t border-gray-200">
    <span class="px-3 text-sm font-medium text-gray-400">OR</span>
    <hr class="flex-grow border-t border-gray-200">
  </div>

  <!-- Auth Buttons -->


  <div class="space-y-3 mb-6">

    <a href="{{ route('user.login') }}" class="w-full bg-orange-600 text-white py-3 rounded-xl font-bold shadow-lg hover:bg-orange-700 transition duration-150 uppercase tracking-wider text-center block">
        Log in
    </a>
    <a href="{{ route('user.register') }}" class="w-full bg-white border-2 border-orange-600 text-orange-600 py-3 rounded-xl font-bold shadow-sm hover:bg-orange-50 transition duration-150 uppercase tracking-wider text-center block">
        Sign up
    </a>
</div>


  <!-- Footer Text -->
  <p class="text-xs text-center text-gray-500 mt-8 px-4">
    By signing up, you agree to our 
    <a href="#" class="text-orange-600 hover:underline font-medium">Terms and Conditions</a> 
    and 
    <a href="#" class="text-orange-600 hover:underline font-medium">Privacy Policy.</a>
  </p>

</div>
</div>

<div id="cart-drawer"
     class="fixed top-0 right-0 z-50 h-screen w-full lg:w-96 p-4 bg-white 
            transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col overflow-y-auto">

    
   <div class="flex justify-between items-center   border-gray-200  bg-white  backdrop-blur-sm">
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Your Cart</h2>
  <button 
    id="cart-drawer-close" 
    data-drawer-hide="cart-drawer" 
    aria-controls="cart-drawer" 
    class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 transition duration-150 flex items-center justify-center">
    <i class="ri-close-line text-2xl cursor-pointer"></i>
</button>

</div>

<div class="w-full max-w-md h-100 overflow-y-scroll space-y-4 mt-4 pb-8  " style="scrollbar-width: none; -ms-overflow-style: none;">
 

    <div class="w-full bg-white p-3 rounded-xl border border-gray-300">

        <!-- Header / Restaurant Info -->
        <div class="flex justify-between items-start space-x-4">
            <div class="flex items-start space-x-3">
                <img 
                    class="rounded-full w-12 h-12 object-cover flex-shrink-0" 
                    src="storage/category/pizza.jpg" 
                    alt="Restaurant/Dish Placeholder"
                    onerror="this.onerror=null; this.src='https://placehold.co/50x50/38a169/ffffff?text=R';"
                >
                
                <div>
                    <div class="font-bold text-lg text-gray-800">Saas Bahu Ka Chatkhara</div>
                    <div class="text-sm text-gray-600 flex items-center space-x-2 mt-1">
                        <span>40-60 mins</span>
                        <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                        <span class="text-orange-600 flex items-center font-medium">
                            Free
                        </span>
                    </div>
                </div>
            </div>

           <button class="text-gray-400 hover:text-red-500 transition duration-150 focus:outline-none p-2 rounded-full">
  <i class="ri-delete-bin-6-line text-2xl"></i>
</button>

        </div>

        <hr class="my-2 border-gray-100">

        <div class="mt-2 flex space-x-3 items-center">
            <img 
                class="w-14 h-14 object-cover rounded-xl shadow-md" 
                src="storage/menu/burger.jpg" 
                alt="Cart Item Placeholder"
                onerror="this.onerror=null; this.src='https://placehold.co/80x80/f97316/ffffff?text=I';"
            >
            <button class="w-14 h-14 flex items-center justify-center border border-gray-300 rounded-xl text-3xl text-gray-500 bg-gray-50 hover:bg-gray-100 transition shadow-sm focus:outline-none active:bg-gray-200">
                +
            </button>
        </div>

        <div class="mt-2 flex justify-between items-center">
            <div class="text-orange-600 font-semibold text-sm flex items-center">
                🏷️ Saving Rs.55.00
            </div>
            <div class="text-right">
                <span class="text-gray-500 line-through text-sm mr-1">Rs.550.00</span>
                <span class="text-orange-600 font-bold text-xl">Rs.495.00</span>
            </div>
        </div>

        <button class="w-full mt-3 py-3 border border-gray-800 text-gray-800 font-semibold rounded-xl transition hover:bg-gray-800 hover:text-white focus:outline-none shadow-md">
            Go to checkout
        </button>

    </div>

  
</div>



</div> 



{{-- USER DRAWER --}}
 <div id="user-drawer"
     class="fixed top-0 left-0 z-50 h-screen w-96 p-4 bg-white 
            transform -translate-x-full transition-transform duration-500 ease-in-out flex flex-col overflow-y-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Your Account</h2>

    <button 
        id="user-drawer-close-btn" data-drawer-hide="user-drawer" 
        aria-controls="user-drawer" 
        class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 transition duration-150 flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
</div>

  <div class="flex items-center space-x-4 mb-6 border-b pb-6">
    <img 
    src="storage/user/user1.jpeg" 
    alt="User Avatar" 
    class="w-20 h-20 rounded-full border-4 border-orange-500 shadow-lg">
    
    <div class="flex flex-col justify-center">
        <h3 class="text-lg font-semibold text-gray-800">Jane Doe</h3>
        <p class="text-sm text-gray-500">jane.doe@example.com</p>
    </div>
</div>

    <ul class="space-y-1 overflow-y-auto flex-grow">
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-wallet-3-line text-xl w-6 mr-3"></i> 
                Pandapay
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-vip-crown-line text-xl w-6 mr-3"></i>
                Subscribe to free delivery
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-file-list-3-line text-xl w-6 mr-3"></i>
                Orders & reordering
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-user-line text-xl w-6 mr-3"></i>
                Profile
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-coupon-line text-xl w-6 mr-3"></i>
                Vouchers
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-trophy-line text-xl w-6 mr-3"></i>
                panda rewards
            </a>
        </li>
        
        <li class="pt-4 border-t mt-4">
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-global-line text-xl w-6 mr-3"></i>
                English
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-question-line text-xl w-6 mr-3"></i>
                Help Center
            </a>
        </li>
        <li>
            <a href="#" class="w-full flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition duration-150">
                <i class="ri-logout-box-r-line text-xl w-6 mr-3"></i>
                Logout
            </a>
        </li>
    </ul>

    <p class="text-xs text-gray-400 mt-6 text-center px-2">
        &copy; 2025 Quickfood. All rights reserved.
    </p>
</div>








<script>
 
// --- User Drawer for authenticated users ---
// --- User Drawer for authenticated users ---
const userDrawer = document.getElementById('user-drawer');
const userIcons = document.querySelectorAll('[data-drawer-target="user-drawer"]');

userIcons.forEach(icon => {
    icon.addEventListener('click', () => {
        if (userDrawer) {
            userDrawer.classList.toggle('-translate-x-full'); // Tailwind-friendly
        }
    });
});


  // --- Drawer for guests ---
  const openDrawerBtn = document.getElementById('openDrawerBtn');
  const closeDrawerBtn = document.getElementById('closeDrawerBtn');
  const drawer = document.getElementById('drawer');
  const drawerOverlay = document.getElementById('drawerOverlay');

  if (openDrawerBtn) {
    openDrawerBtn.addEventListener('click', () => {
      drawer.classList.remove('translate-y-full');
      drawerOverlay.classList.remove('hidden');
      setTimeout(() => drawerOverlay.classList.remove('opacity-0'), 10);
    });
  }

  if (closeDrawerBtn) {
    closeDrawerBtn.addEventListener('click', () => {
      drawer.classList.add('translate-y-full');
      drawerOverlay.classList.add('opacity-0');
      setTimeout(() => drawerOverlay.classList.add('hidden'), 300);
    });
  }

  if (drawerOverlay) {
    drawerOverlay.addEventListener('click', () => {
      drawer.classList.add('translate-y-full');
      drawerOverlay.classList.add('opacity-0');
      setTimeout(() => drawerOverlay.classList.add('hidden'), 300);
    });
  }


 
</script> 
