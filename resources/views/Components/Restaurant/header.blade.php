<nav class="fixed top-0 left-0 z-50 w-full bg-white border-b border-gray-200 :bg-gray-900 :border-gray-700 shadow-sm">
  <div class="flex items-center justify-between px-2 py-3 lg:px-6">
    
    <!-- Left: Sidebar toggle + Logo -->
 <div class="flex items-center gap-2">
      <!-- Sidebar toggle -->
      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" 
        aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 
        focus:outline-none focus:ring-2 focus:ring-gray-100 :text-gray-400 
        :hover:bg-gray-700 :focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
          <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 
             010 1.5H2.75A.75.75 0 012 4.75zm0 
             10.5a.75.75 0 01.75-.75h7.5a.75.75 
             0 010 1.5h-7.5a.75.75 0 
             01-.75-.75zM2 10a.75.75 0 
             01.75-.75h14.5a.75.75 0 
             010 1.5H2.75A.75.75 0 012 10z"/>
        </svg>
      </button>

     <!-- Logo -->
<a href="{{ route('admin.dashboard') }}" class="flex items-center text-2xl font-bold tracking-tight text-gray-800  transition-colors ">
 Restaurant <span class="text-red-600  ml-1">Panel</span>
</a>

    </div>



    

    <!-- Right: User menu -->
    <div class="flex items-center gap-4 px-6 max-sm:px-2 max-sm:gap-2">
      <button
  type="button"
  class="relative flex items-center justify-center w-10 h-10 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:shadow-md  :bg-gray-800 :text-gray-100 :border-gray-600 :hover:bg-gray-700 transition"
  aria-expanded="false"
  data-dropdown-toggle="dropdown-notifications"
>
  
  
  <!--  mode Icon -->
  <i class="ri-sun-line text-xl"></i>


</button>
      <div class="relative flex items-center">
  <!-- Notification Button -->
<button
  type="button"
  class="relative flex items-center justify-center w-10 h-10 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:shadow-md  :bg-gray-800 :text-gray-100 :border-gray-600 :hover:bg-gray-700 transition"
  aria-expanded="false"
  data-dropdown-toggle="dropdown-notifications"
>
  <span class="sr-only">Open notifications</span>
  
  <!-- Bell Icon -->
  <i class="ri-notification-3-line text-xl"></i>

  <!-- Notification Badge -->
  <span
    class="absolute -top-2 -right-2 flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-red-600 border-2 border-white rounded-full :border-gray-800"
  >
    3
  </span>
</button>



  <!-- Dropdown -->
  <div class="absolute right-0 z-50 hidden mt-2 w-80 text-sm bg-white divide-y divide-gray-100 rounded-md shadow-lg :bg-gray-800 :divide-gray-700"
      id="dropdown-notifications">
      <div class="px-4 py-3 font-medium text-gray-900 :text-white">Notifications</div>
      <ul class="py-1 max-h-60 overflow-y-auto">
          <li class="px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">
              <p class="text-gray-700 :text-gray-300">New comment on your post</p>
              <p class="text-xs text-gray-500 :text-gray-400">5 minutes ago</p>
          </li>
          <li class="px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">
              <p class="text-gray-700 :text-gray-300">New follower: John Doe</p>
              <p class="text-xs text-gray-500 :text-gray-400">10 minutes ago</p>
          </li>
          <li class="px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">
              <p class="text-gray-700 :text-gray-300">Server maintenance scheduled</p>
              <p class="text-xs text-gray-500 :text-gray-400">1 hour ago</p>
          </li>
      </ul>
      <div class="px-4 py-2 text-center">
          <a href="#" class="text-red-600 :text-red-400 hover:underline">View all</a>
      </div>
  </div>
</div>

      <button type="button" 
        class="flex items-center text-sm bg-gray-200 rounded-full focus:ring-4 
        focus:ring-gray-300 :bg-gray-700 :focus:ring-gray-600 hover:opacity-90"
        aria-expanded="false" data-dropdown-toggle="dropdown-user">
        <span class="sr-only">Open user menu</span>
        <img class="w-9 h-9 rounded-full object-cover" 
          src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" 
          alt="user photo">
      </button>

      <!-- Dropdown -->
     <div class="absolute right-0 z-50 hidden mt-2 w-48 text-sm list-none bg-white divide-y divide-gray-100 
  rounded-md shadow-lg :bg-gray-800 :divide-gray-700" id="dropdown-user">
  <div class="px-4 py-3">
    <p class="font-medium text-gray-900 :text-white">Neil Sims</p>
    <p class="text-xs text-gray-500 truncate :text-gray-400">neil.sims@flowbite.com</p>
  </div>
  <ul class="py-1">
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">Dashboard</a></li>
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">Settings</a></li>
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 :hover:bg-gray-700 :hover:text-white">Earnings</a></li>

      <form method="POST" action="{{ route('restaurant.logout') }}">
    @csrf
    <li>
        <button type="submit" 
            class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100 
            :text-gray-300 :hover:bg-gray-700 :hover:text-white">
            Logout
        </button>
    </li>
</form>

  </ul>
</div>

    </div>

  </div>
</nav>

