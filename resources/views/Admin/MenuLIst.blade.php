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
  data-modal-target="default-modal" data-modal-toggle="default-modal"
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

      <div id='category' class="space-y-2">
        
    

</div>

    </div>

</aside>


            <!-- Menu Grid (Right Column) -->
            <div id class="flex-grow">
                
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
                  <div id="EmtyItem"></div>

                <!-- Product Grid -->
               <div id="MenuItem"  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

 

</div>

            </div>
        </div>


        <div id="default-modal" tabindex="-1" aria-hidden="true"
    class=" hidden fixed inset-0 z-50 flex items-center justify-center 
    overflow-y-auto px-4 py-6 backdrop-blur-[2px] bg-black/40">

    <!-- Modal Wrapper -->
    <div class="relative w-full max-w-2xl bg-white dark:bg-gray-800 
        rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 
        overflow-hidden animate-scale-in">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 
            border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40">
            
         <h3  class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
  Menu Management Category📍
</h3>


            <button type="button"
                class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 
                hover:bg-gray-200/60 dark:hover:bg-gray-600/60 transition rounded-lg w-9 h-9 flex items-center justify-center cursor-pointer"
                data-modal-hide="default-modal">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <!-- Body -->
       <!-- Body -->
<div class="px-6 py-6 space-y-5">

    <!-- Category Name -->
    <form action="{{ route('admin.category.add') }}" method="POST">
        @csrf
    <div>
        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">
            Category Name
        </label>
        <input type="text" name="category" value="{{ old('category') }}" id="categoryName" placeholder="e.g. Biryani"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 
            dark:bg-gray-900 dark:text-white dark:border-gray-700"
            >
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
        <button type="button" data-modal-hide="default-modal"
            class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300
            dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
            Cancel
        </button>

        <button id="saveCategoryBtn" type="submit"
            class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 cursor-pointer">
            Save Category
        </button>
    </div>
    </form>

</div>

    </div>
</div>
<!-- Delete Modal -->


  <script>
    let menuCategory = [];
   
    async function loadMenuItem() {
        // Show loader before fetching data
        // Show skeletons before fetching data
        let skeletons = '';
        for (let i = 0; i < 5; i++) {
            skeletons += `
            <div class="flex items-center justify-between p-2 rounded-xl bg-white border border-gray-100 shadow-sm animate-pulse mb-2">
                <label class="flex items-center gap-3 w-full">
                    <span class="w-4 h-4 rounded bg-gray-200"></span>
                    <span class="h-4 w-28 bg-gray-200 rounded"></span>
                </label>
                <span class="w-7 h-7 bg-gray-200 rounded-full ml-2"></span>
            </div>
            `;
        }
        document.querySelector("#category").innerHTML = skeletons;
        const emtyMenu = document.querySelector("#EmtyItem");
        emtyMenu.innerHTML = "";
        try {
            const response = await fetch(`/admin/menuCategory`);
            const result = await response.json();
            menuCategory = result.data; 
            let categories = "";
         menuCategory.forEach(category => {
    categories += `
    <div class="flex items-center justify-between p-2 rounded-lg hover:bg-blue-50">
        <label for="category-${category.id}" class="flex items-center text-sm font-semibold text-blue-600 cursor-pointer hover:text-blue-700 transition duration-200">
            <input type="checkbox" id="category-${category.id}" value="${category.id}" onchange="handleMenuItem()" class="w-4 h-4 rounded border-gray-300 focus:ring-2 focus:ring-blue-500 text-blue-500">
            <span class="ml-3">${category.category_name}</span>
        </label>
        <i class="ri-delete-bin-5-line text-red-500 cursor-pointer ml-2" data-modal-target="delete-modal-${category.id}" data-modal-toggle="delete-modal-${category.id}"></i>

       
    </div>
    `;
});

            document.querySelector("#category").innerHTML = categories;
            // show placeholder when no category is selected
            emtyMenu.innerHTML = `
                 <div class="w-full flex flex-col items-center justify-center py-10 text-center opacity-70">
                        <div class="text-4xl mb-3">📂</div>
                        <p class="text-lg font-semibold text-gray-600">Please select a category</p>
                        <p class="text-sm text-gray-400 mt-1">Start by choosing at least one</p>
                </div>`;
        } catch (error) {
            document.querySelector("#category").innerHTML = `<div class='text-red-500 text-center py-4'>Failed to load categories</div>`;
        }
    }
loadMenuItem();
function handleMenuItem() {

    let skeleton = document.querySelector("#skeleton");
    let menuContainer = document.querySelector("#MenuItem");
    // ensure emtyMenu exists in this scope (was previously declared only inside loadMenuItem)
    const emtyMenu = document.querySelector("#EmtyItem");

    let checkboxes = document.querySelectorAll("#category input:checked");
    let checkedIds = [...checkboxes].map(i => i.value);

    if (checkedIds.length === 0) {
                // no categories selected -> clear items and show placeholder
                skeleton.innerHTML = "";
                menuContainer.innerHTML = "";
                emtyMenu.innerHTML = `
                <div class="w-full flex flex-col items-center justify-center py-10 text-center opacity-70">
                    <div class="text-4xl mb-3">📂</div>
                    <p class="text-lg font-semibold text-gray-600">Please select a category</p>
                    <p class="text-sm text-gray-400 mt-1">Start by choosing at least one</p>
                </div>`;

                return;
    }

    let items = [];

    checkedIds.forEach(id => {
        let category = menuCategory.find(c => c.id == id);
        if (category && category.items?.length) {
            items.push(...category.items);
        }
    });

    if (items.length === 0) {
        menuContainer.innerHTML = "";
        skeleton.innerHTML = `
        <div class="w-full flex flex-col items-center justify-center py-10 text-center opacity-70">
            <div class="text-4xl mb-3">🍴</div>
            <p class="text-lg font-semibold text-gray-600">No menu items found</p>
            <p class="text-sm text-gray-400 mt-1">Try selecting another category</p>
        </div>
        `;
        // ensure placeholder cleared when no items found for selected category
        emtyMenu.innerHTML = "";
        return;
    }

    skeleton.innerHTML = "";

    // we've got items -> hide placeholder
    emtyMenu.innerHTML = "";

    let html = "";
    items.forEach(Menu => {
        html += `
        <div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative hover:shadow-xl transition duration-300">
            <span class="absolute top-0 right-0 mt-2 mr-2 bg-emerald-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-md z-10">
                ${Menu.price ?? "—"}
            </span>

            <img src="/storage/${Menu.image_url}"
                class="w-28 h-28 object-cover rounded-full mb-2 border-4 border-white shadow-md">

            <h3 class="text-lg font-bold text-gray-800 mb-1">${Menu.item_name}</h3>
            
            <div class="star-rating text-sm mb-1">★★★★★</div>

            <p class="text-center text-xs text-gray-500 mb-2 h-8 overflow-hidden line-clamp-2 px-1">
                ${Menu.description ?? ""}
            </p>

            <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 shadow-md">
                View more
            </button>
            
        </div>

        `;
    });

    menuContainer.innerHTML = html;
}




    

</script>


@endsection