
<aside id="logo-sidebar" class="fixed top-0 left-0  z-40 w-64    h-screen   pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
   <li class="m-0">
  <a href="{{ route('restaurant.dashboard') }}"
     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 group">
    <i class="ri-dashboard-line text-lg text-gray-500 group-hover:text-red-800"></i>
    <span class="ms-2 group-hover:text-red-800">Dashboard</span>
  </a>
</li>



 <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
            <i class="ri-shopping-bag-3-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Orders</span>
            </a>
         </li>
              <li>
  <!-- Doctors Dropdown Button -->
  <button type="button" 
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group 
   hover:bg-red-50 group dark:text-white dark:hover:bg-gray-700" 
    aria-controls="dropdown-doctors" data-collapse-toggle="dropdown-doctors">
   <i class="ri-restaurant-line"></i>
    <span class="flex-1 ms-3 text-left whitespace-nowrap">Menu</span>
    <svg class="w-4 h-4 ms-auto text-gray-500 transition-transform group-hover:text-gray-900 
      dark:text-gray-400 dark:group-hover:text-white" 
      fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
    </svg>
  </button>

  <!-- Doctors Dropdown Menu -->
  <ul id="dropdown-doctors" class="hidden py-2 space-y-2">
    <li>
  <a href="#"
    class="flex items-center gap-2 w-full p-2 pl-11 text-gray-900 transition duration-75 rounded-lg 
    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
    <i class="ri-user-add-line text-md"></i>
    Add Menu
  </a>
</li>

    <li>
   <a href="#"
    class="flex items-center gap-2 w-full p-2 pl-11 text-gray-900 transition duration-75 rounded-lg 
    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
    <i class="ri-list-radio text-md"></i>
    List Menu
  </a>
    </li>
  </ul>
</li>

          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
            <i class="ri-menu-search-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Categories</span>
            </a>
         </li>

         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
             <i class="ri-hand-coin-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Earnings</span>
            </a>
         </li>


          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
            <i class="ri-feedback-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Reviews</span>
            </a>
         </li>

        

          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
             <i class="ri-user-line text-lg group-hover:text-red-800"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Reports</span>
            </a>
         </li>

          
<div class="mt-48">
       <hr class=" border-gray-300 mx-2 my-2 dark:border-gray-600">
 <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-gray-700 group">
             <i class="ri-settings-2-line"></i>
               <span class="flex-1 ms-2 whitespace-nowrap">Settings</span>
            </a>
         </li>
<li>
  <form method="POST" action="{{ route('restaurant.logout') }}">
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
