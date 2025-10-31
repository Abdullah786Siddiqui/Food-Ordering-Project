@extends('layouts.Admin.admin')
@section('admin')
  <!-- Header / Top Bar -->
     <header class="mb-6 mt-2 bg-gradient-to-r from-indigo-50 via-purple-50 to-transparent rounded-xl p-2 px-4 border border-indigo-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 max-sm:gap-1 shadow-sm">
  <div class="w-full sm:w-auto">
    <h1 class="text-2xl  max-sm:text-xl font-bold text-gray-800 flex items-center gap-2 flex-wrap">
      Menu Management <span class="text-indigo-600  text-3xl">🍿</span>
    </h1>
    <p class="text-gray-600 text-sm mt-1 sm:mt-0.5">
      Manage details for your menu items
      <span class="font-semibold text-indigo-700"></span>
    </p>
  </div>

  <button
    type="submit" 
    class="w-full sm:w-auto mt-3 sm:mt-0 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition-all duration-200 cursor-pointer">
    Add Menu 
  </button>
</header>

    <!-- Main Content Area: Sidebar and Menu Grid -->
 
        <div class="flex flex-col lg:flex-row gap-8">

          <!-- Sidebar Filters (Left Column) -->
<aside class="w-full lg:w-64 bg-white p-6 rounded-2xl shadow-lg border border-gray-200 flex-shrink-0">

    <!-- Filter Header -->
    <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-4">
        <h2 class="text-base font-bold text-blue-600 tracking-wide uppercase">Filter</h2>
        <button class="text-sm font-semibold text-emerald-500 hover:text-emerald-600 transition-colors duration-200">Reset All</button>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input 
            type="text" 
            placeholder="Search categories..." 
            class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm transition duration-200"
        >
    </div>

    <!-- Categories -->
    <div class="space-y-4">
        <div class="text-xs font-semibold uppercase text-gray-400 tracking-wider">Categories</div>

      <div class="space-y-2">
    @forelse ($categories as $category)
        <label  class="flex items-center text-sm font-semibold text-blue-600 cursor-pointer hover:text-blue-700 transition duration-200 p-2 rounded-lg hover:bg-blue-50">
            <input type="checkbox"  onchange="handleCategoryItem(this, '{{ $category->id }}')" class="w-4 h-4 rounded border-gray-300 focus:ring-2 focus:ring-blue-500 text-blue-500">
            <span class="ml-3">{{ $category->category_name }}</span>
        </label>
    @empty
        <p class="text-xs text-gray-400 italic">No categories found</p>
    @endforelse
</div>

    </div>

</aside>


            <!-- Menu Grid (Right Column) -->
            <div class="flex-grow">
                
                <!-- Menu Grid Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-800 tracking-wide">MENU LAYOUT </h2>
                    <div class="flex items-center space-x-2 text-gray-500">
                         <!-- Grid View Active -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <!-- List View Inactive -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer hover:text-blue-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                </div>
                  <div id="skeleton"></div>
                <!-- Product Grid -->
               <div id="MenuItem"  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

 

 


 

</div>

            </div>
        </div>
  <script>
 function handleCategoryItem(checkbox ,categoryId) {

    
     const Menubox = document.getElementById("MenuItem");
     const skeleton = document.getElementById("skeleton");

      if (!checkbox.checked) {
        Menubox.innerHTML = "";
        return;
    }
    Menubox.innerHTML = `<div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative animate-pulse">

  <!-- Price badge -->
  <span class="absolute top-0 right-0 mt-2 mr-2 bg-gray-300 rounded-full w-10 h-5"></span>

  <!-- Avatar -->
  <div class="w-28 h-28 rounded-full mb-2 bg-gray-300"></div>

  <!-- Title -->
  <div class="w-24 h-4 bg-gray-300 rounded mb-2"></div>

  <!-- stars -->
  <div class="w-20 h-3 bg-gray-300 rounded mb-2"></div>

  <!-- Description -->
  <div class="w-32 h-3 bg-gray-300 rounded mb-1"></div>
  <div class="w-28 h-3 bg-gray-300 rounded mb-3"></div>

  <!-- Button -->
  <div class="w-full h-8 bg-gray-300 rounded-lg"></div>

</div>

<div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative animate-pulse">

  <!-- Price badge -->
  <span class="absolute top-0 right-0 mt-2 mr-2 bg-gray-300 rounded-full w-10 h-5"></span>

  <!-- Avatar -->
  <div class="w-28 h-28 rounded-full mb-2 bg-gray-300"></div>

  <!-- Title -->
  <div class="w-24 h-4 bg-gray-300 rounded mb-2"></div>

  <!-- stars -->
  <div class="w-20 h-3 bg-gray-300 rounded mb-2"></div>

  <!-- Description -->
  <div class="w-32 h-3 bg-gray-300 rounded mb-1"></div>
  <div class="w-28 h-3 bg-gray-300 rounded mb-3"></div>

  <!-- Button -->
  <div class="w-full h-8 bg-gray-300 rounded-lg"></div>

</div>
<div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative animate-pulse">

  <!-- Price badge -->
  <span class="absolute top-0 right-0 mt-2 mr-2 bg-gray-300 rounded-full w-10 h-5"></span>

  <!-- Avatar -->
  <div class="w-28 h-28 rounded-full mb-2 bg-gray-300"></div>

  <!-- Title -->
  <div class="w-24 h-4 bg-gray-300 rounded mb-2"></div>

  <!-- stars -->
  <div class="w-20 h-3 bg-gray-300 rounded mb-2"></div>

  <!-- Description -->
  <div class="w-32 h-3 bg-gray-300 rounded mb-1"></div>
  <div class="w-28 h-3 bg-gray-300 rounded mb-3"></div>

  <!-- Button -->
  <div class="w-full h-8 bg-gray-300 rounded-lg"></div>

</div>
<div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative animate-pulse">

  <!-- Price badge -->
  <span class="absolute top-0 right-0 mt-2 mr-2 bg-gray-300 rounded-full w-10 h-5"></span>

  <!-- Avatar -->
  <div class="w-28 h-28 rounded-full mb-2 bg-gray-300"></div>

  <!-- Title -->
  <div class="w-24 h-4 bg-gray-300 rounded mb-2"></div>

  <!-- stars -->
  <div class="w-20 h-3 bg-gray-300 rounded mb-2"></div>

  <!-- Description -->
  <div class="w-32 h-3 bg-gray-300 rounded mb-1"></div>
  <div class="w-28 h-3 bg-gray-300 rounded mb-3"></div>

  <!-- Button -->
  <div class="w-full h-8 bg-gray-300 rounded-lg"></div>

</div>


`
    
   fetch(`/admin/menuItems/${categoryId}`, {
    method: "GET",
    headers: { "Accept": "application/json" },
    credentials: "include"
})

    .then(res => res.json())
    .then(res => {
        console.log(res)
        let MenuItems = "";
        res.data.forEach(Menu => {
            MenuItems += `
  <div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative hover:shadow-xl transition duration-300">
    <span class="absolute top-0 right-0 mt-2 mr-2 bg-emerald-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-md z-10">
      ${Menu.price}
    </span>
    <img src="https://ohsweetbasil.com/wp-content/uploads/2015/04/pizza-burger-ohsweetbasil.com-2i.jpg" class="w-28 h-28 object-cover rounded-full mb-2 border-4 border-white shadow-md">
    <h3 class="text-lg font-bold text-gray-800 mb-1"> ${Menu.item_name}</h3>
    <div class="star-rating text-sm mb-1">★★★★★</div>
    <p class="text-center text-xs text-gray-500 mb-2 h-8 overflow-hidden line-clamp-2 px-1">
     ${Menu.description}
    </p>
    <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 shadow-md">
   View more
    </button>
  </div>
            `;
        });

        Menubox.innerHTML = MenuItems || `
<tr class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
    <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
        🍴 No Menu Item found 
    </td>
</tr>
`;
 
    })
    .catch(err => {
        console.error(err);
        Menubox.innerHTML = "<pclass='text-center'>Failed to load Menu Item</p>";
    });
}
</script>


@endsection