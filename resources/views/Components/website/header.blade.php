<nav class="w-full bg-white shadow-sm py-3 px-5">
  <div class="flex items-center justify-between md:justify-start">

    <!-- MOBILE LEFT: USER ICON -->
    <div id="openDrawerBtn" class="flex items-center md:hidden mb-1 cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-width="1.5" d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5z" />
        <path stroke-linecap="round" stroke-width="1.5" d="M4 22c0-4 4-7 8-7s8 3 8 7" />
      </svg>
    </div>

    <!-- LOGO CENTER -->
    <div class="flex-1 flex justify-center md:justify-start">
      <img src="storage/logo/logo.png" alt="logo" class="h-10 w-auto md:h-12 object-contain" />
    </div>

    <!-- MOBILE RIGHT: CART ICON -->
    <div class="flex items-center md:hidden mt-2">
      <div class="relative cursor-pointer hover:opacity-80">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-width="1.5" d="M3 3h2l3 12h10l3-8H6" />
        </svg>
        <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-sm w-6 h-6 flex items-center justify-center rounded-full">3</span>
      </div>
    </div>

    <!-- DESKTOP RIGHT -->
    <div class="hidden md:flex items-center gap-6 ml-auto">
      <button class="border border-gray-300 px-4 py-2 rounded-lg text-sm hover:bg-gray-100">Log in</button>
      <button class="bg-pink-600 text-white px-5 py-2 rounded-lg text-sm hover:bg-pink-700">Sign up for free delivery</button>
    </div>
  </div>

  <!-- MOBILE ADDRESS BELOW LOGO -->
  <div class="md:hidden mt-4 flex items-center space-x-4 bg-white rounded-2xl p-3 shadow-lg border border-gray-200 hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out cursor-pointer">
    <i class="ri-map-pin-line text-blue-600 text-3xl flex-shrink-0 animate-bounce-slow"></i>
    <div>
      <span class="block text-gray-900 font-semibold text-lg">PTCL Telephone Exchange</span>
      <span class="block text-gray-500 text-sm">Islamabad, Pakistan</span>
    </div>
  </div>
</nav>

<!-- Drawer Overlay -->
<div id="drawerOverlay" class="fixed inset-0 bg-black/50 opacity-0 transition-opacity duration-300 hidden z-40"></div>



<!-- Bottom Drawer -->
<div id="drawer" class="fixed inset-x-0 bottom-0 bg-white rounded-t-3xl shadow-lg max-h-[80vh] overflow-y-auto transform translate-y-full transition-transform duration-300 z-50">
<div class="p-6 md:p-8 flex flex-col h-full justify-between">

  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <span class="text-xl font-bold text-pink-600">Quickfood</span>
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
<div class="space-y-3 mb-6">
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
    <button class="w-full bg-pink-600 text-white py-3 rounded-xl font-bold shadow-lg hover:bg-pink-700 transition duration-150 uppercase tracking-wider">
      Log in
    </button>
    <button class="w-full bg-white border-2 border-pink-600 text-pink-600 py-3 rounded-xl font-bold shadow-sm hover:bg-pink-50 transition duration-150 uppercase tracking-wider">
      Sign up
    </button>
  </div>

  <!-- Footer Text -->
  <p class="text-xs text-center text-gray-500 mt-8 px-4">
    By signing up, you agree to our 
    <a href="#" class="text-pink-600 hover:underline font-medium">Terms and Conditions</a> 
    and 
    <a href="#" class="text-pink-600 hover:underline font-medium">Privacy Policy.</a>
  </p>

</div>

<script>
  const openDrawerBtn = document.getElementById('openDrawerBtn');
  const closeDrawerBtn = document.getElementById('closeDrawerBtn');
  const drawer = document.getElementById('drawer');
  const drawerOverlay = document.getElementById('drawerOverlay');

// Open drawer
openDrawerBtn.addEventListener('click', () => {
  drawer.classList.remove('translate-y-full');
  drawerOverlay.classList.remove('hidden');
  // fade in
  setTimeout(() => {
    drawerOverlay.classList.remove('opacity-0');
  }, 10);
});

// Close drawer
const closeDrawer = () => {
  drawer.classList.add('translate-y-full');
  drawerOverlay.classList.add('opacity-0');
  // hide after fade-out
  setTimeout(() => drawerOverlay.classList.add('hidden'), 300);
};

closeDrawerBtn.addEventListener('click', closeDrawer);
drawerOverlay.addEventListener('click', closeDrawer);


  // Close drawer
  closeDrawerBtn.addEventListener('click', () => {
    drawer.classList.add('translate-y-full');
    drawerOverlay.classList.add('hidden');
  });

  // Close drawer when clicking overlay
  drawerOverlay.addEventListener('click', () => {
    drawer.classList.add('translate-y-full');
    drawerOverlay.classList.add('hidden');
  });
</script>