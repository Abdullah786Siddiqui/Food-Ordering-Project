
<aside id="logo-sidebar" class="fixed top-0 left-0  z-40 w-64    h-screen   pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
      <ul class="space-y-2 font-medium">
   <li class="m-0">
  <a href="{{ route('admin.dashboard') }}"
     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 group">
    <i class="ri-dashboard-line text-lg text-gray-500 group-hover:text-blue-800"></i>
    <span class="ms-2 group-hover:text-blue-800">Dashboard</span>
  </a>
</li>

   <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-user-line text-lg group-hover:text-blue-800"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Users</span>
            </a>
         </li>

 <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-shopping-bag-3-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Orders</span>
            </a>
         </li>
          <li>
            <a href="{{ route('admin.restaurants.main') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-store-2-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Restaurant Partners</span>
            </a>
         </li>
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-e-bike-2-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Delivery Partners</span>
            </a>
         </li>
<li class="relative ">
  <!-- Parent button -->
  <input type="checkbox" id="menu-dropdown" class="peer hidden">
  <label for="menu-dropdown" class="flex items-center p-2  text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 cursor-pointer select-none">
    <i class="ri-restaurant-2-line text-lg"></i>
    <span class="flex-1 ms-2 whitespace-nowrap text-left">Menu</span>
    <svg class="w-4 h-4 ml-auto transition-transform duration-200 peer-checked:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </label>

  <!-- Dropdown -->
  <ul class=" space-y-2 pl-8 max-h-0 overflow-hidden transition-all duration-300 peer-checked:max-h-40">
    <li>
      <a href="#" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 dark:text-gray-300 dark:hover:bg-gray-700">
        <i class="ri-add-line text-xl me-2"></i>
        Add Menu
      </a>
    </li>
    <li>
      <a href="{{ route('admin.menu.list') }}" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 dark:text-gray-300 dark:hover:bg-gray-700">
        <i class="ri-list-check text-lg me-2"></i>
        Menu List
      </a>
    </li>
  </ul>
</li>


      


          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-coupon-line"></i> 
               <span class="flex-1 ms-2 whitespace-nowrap">Promotions</span>
            </a>
         </li>

           <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-refund-2-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Payments</span>
            </a>
         </li>

          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
            <i class="ri-file-chart-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Reports</span>
            </a>
         </li>

          
<div class="mt-32">
       <hr class=" border-gray-300 mx-2 my-2 dark:border-gray-600">
 <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 dark:hover:bg-gray-700 group">
             <i class="ri-settings-2-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Settings</span>
            </a>
         </li>
<li>
  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button
      type="submit"
      aria-label="Logout"
      class="flex items-center p-2 text-gray-700 rounded-lg transition-colors duration-200 hover:bg-red-50 hover:text-red-900 dark:text-gray-200 dark:hover:bg-red-200 dark:hover:text-red-900 group w-full text-left"
    >
      <!-- Icon -->
      <svg
        class="shrink-0 w-5 h-5 text-red-500 transition-colors duration-200 group-hover:text-red-900"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 18 16"
        aria-hidden="true"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"
        />
      </svg>

      <!-- Text -->
      <span class="ms-2 whitespace-nowrap">Logout</span>
    </button>
  </form>
</li>

</div>
       
      </ul>
   </div>
</aside>
