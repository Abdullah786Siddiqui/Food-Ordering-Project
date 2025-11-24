<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20  bg-white border-r border-gray-200 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="flex flex-col h-full justify-between px-3 pb-4 overflow-y-auto">
    
    <!-- Main navigation -->
    <ul class="space-y-2 font-medium">
      <li>
        <a href="{{ route('restaurant.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
          <i class="ri-dashboard-line text-lg text-gray-500 group-hover:text-blue-800"></i>
          <span class="ml-2 group-hover:text-blue-800">Dashboard</span>
        </a>
      </li>
    
      <li>
        <a href="{{ route('restaurant.order.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
          <i class="ri-shopping-bag-3-line"></i>
          <span class="ml-2">Orders</span>
        </a>
      </li>
    

   
      
      <li>
        <a href="{{ route('restaurant.menu.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
           <i class="ri-restaurant-2-line "></i>
          <span class="ml-2">Menu</span>
        </a>
      </li>

        <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
           <i class="ri-price-tag-3-line"></i>
          <span class="ml-2">Deals</span>
        </a>
      </li>



      <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
          <i class="ri-coupon-line"></i>
          <span class="ml-2">Earning</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
          <i class="ri-refund-2-line"></i>
          <span class="ml-2">Reviews</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
          <i class="ri-file-chart-line"></i>
          <span class="ml-2">Reports</span>
        </a>
      </li>
    </ul>

    <!-- Settings & Logout at bottom -->
    <div class="space-y-2 ">
      <hr class="border-gray-300">
      <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-50 group">
        <i class="ri-settings-2-line"></i>
        <span class="ml-2">Settings</span>
      </a>
      <form method="POST" action="{{ route('restaurant.logout') }}">
        @csrf
        <button type="submit" class="flex items-center p-2 w-full text-left mb-10 text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-900 group">
          <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
          </svg>
          Logout
        </button>
      </form>
    </div>

  </div>
</aside>
