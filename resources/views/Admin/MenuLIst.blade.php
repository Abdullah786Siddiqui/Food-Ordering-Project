@extends('layouts.Admin.admin')
@section('admin')
<style>
@keyframes toast-blink {
  0%   { transform: translate(-50%, -60px); opacity: 0; }
  20%  { transform: translate(-50%, 0); opacity: 1; }
  80%  { transform: translate(-50%, 0); opacity: 1; }
  100% { transform: translate(-50%, -60px); opacity: 0; }
}

.toast-animate {
  animation: toast-blink 2s ease-in-out forwards;
}
</style>
  <!-- Header / Top Bar -->
 <header class="mb-6 mt-2 bg-gradient-to-r from-indigo-50 via-purple-50 to-transparent rounded-xl p-3 sm:p-4 border border-indigo-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-3 shadow-sm">
    <div class="w-full sm:w-auto">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800 flex items-center gap-2 flex-wrap">
            Menu Management <span class="text-2xl sm:text-3xl text-indigo-600">🍿</span>
        </h1>
        <p class="text-gray-600 text-sm mt-1 sm:mt-0">
            Manage details for your menu items
        </p>
    </div>

    <button
        onclick="openModal()"
        type="button"
        class="w-full sm:w-auto mt-2 sm:mt-0 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition-colors duration-200 cursor-pointer">
        Add Category
    </button>
</header>

    <!-- Main Content Area: Sidebar and Menu Grid -->
 
        <div class="flex flex-col lg:flex-row gap-8">

          <!-- Sidebar Filters (Left Column) -->
<aside class="w-full lg:w-64 bg-white p-6 rounded-2xl shadow-lg border border-gray-200 flex-shrink-0">

    <!-- Filter Header -->
    <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-4">
        <h2 class="text-base font-bold text-blue-600 tracking-wide uppercase">Filter</h2>
        <button class="text-sm font-semibold text-emerald-500 hover:text-emerald-600 transition-colors duration-200" onclick="resetCategories()">Reset All</button>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input 
            type="text" 
            placeholder="Search categories..." 
            class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm transition duration-200"
            oninput="filterCategories(this.value)"
        >
    </div>

    <!-- Categories -->
    <div class="space-y-4">
        <div class="text-xs font-semibold uppercase text-gray-400 tracking-wider">Categories</div>
<div id="categories-container" class="space-y-1">
@forelse ($categories as $category)
    <div class="group flex items-center justify-between p-2 rounded-lg cursor-pointer 
            bg-blue-50/40 hover:bg-blue-100 transition-all duration-200">

    <!-- Text takes ALL remaining space -->
    <div onclick="getMenuItem({{ $category->id }}, '{{ $category->category_name }}')"
         class="flex-grow text-gray-700 font-medium group-hover:text-blue-700 transition-colors duration-200">
        {{ $category->category_name }}
    </div>

    <!-- Delete icon stays small & right aligned -->
    <i class="ri-delete-bin-5-line text-red-500 cursor-pointer ml-3 
           transition-colors duration-200"
       onclick="deleteCategory({{ $category->id }}, this)">
    </i>

</div>

@empty
    <p class="text-sm text-gray-500 text-center">No categories found.</p>
@endforelse
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
               <div id="MenuItem" >

 

</div>

            </div>
        </div>


        <div id="default-modal" tabindex="-1" aria-hidden="true"
    class=" hidden fixed inset-0 z-50 flex items-center justify-center 
    overflow-y-auto px-4 py-6 backdrop-blur-[2px] bg-black/40">

    <!-- Modal Wrapper -->
    <div class="relative w-full max-w-2xl bg-white :bg-gray-800 
        rounded-2xl shadow-2xl border border-gray-200 :border-gray-700 
        overflow-hidden animate-scale-in">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 
            border-b border-gray-200 :border-gray-700 bg-gray-50 :bg-gray-900/40">
            
         <h3  class="text-xl font-bold text-gray-900 :text-white flex items-center gap-2">
  Add Menu Category📍
</h3>


            <button type="button" onclick="closeModal()"
                class="text-gray-400 hover:text-gray-700 :hover:text-gray-200 
                hover:bg-gray-200/60 :hover:bg-gray-600/60 transition rounded-lg w-9 h-9 flex items-center justify-center cursor-pointer"
                >
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <!-- Body -->
       <!-- Body -->
<div class="px-4 pt-4 space-y-7">


<form id="categoryForm" enctype="multipart/form-data">
    @csrf

    <div class="mb-6">
        <label for="categoryName" class="block mb-2 text-lg font-bold text-gray-800 :text-gray-100">
            ✨ Category Name
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
            </span>
            <input type="text" name="category_name" id="categoryName" placeholder="e.g. Italian, Fast Food"
                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl shadow-sm text-gray-800
                   focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 ease-in-out">
        </div>
        <p class="mt-1 text-sm text-red-600" id="categoryNameError"></p>
    </div>

    <div class="mb-8">
        <label for="categoryImage" class="block mb-2 text-lg font-bold text-gray-800 :text-gray-100">
            📸 Category Image 
        </label>
        <div class="flex items-center justify-center w-full">
            <label class="relative flex flex-col items-center justify-center w-full h-36 border-2 border-indigo-400 border-dashed rounded-xl cursor-pointer bg-indigo-50 hover:bg-indigo-100 transition duration-200 ease-in-out overflow-hidden">
                <div id="uploadPlaceholder" class="flex flex-col items-center justify-center p-4 h-full w-full">
                    <svg class="w-8 h-8 mb-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <p class="text-sm text-indigo-700"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-indigo-500">PNG, JPG, SVG (MAX. 1MB)</p>
                </div>
                <img id="imagePreview" src="#" alt="Category Image Preview"
                     class="absolute inset-0 w-full h-full object-contain rounded-xl hidden">
                <input id="categoryImage" name="category_image" type="file" class="hidden" accept="image/*"/>
            </label>
        </div>
        <p class="mt-1 text-sm text-red-600" id="categoryImageError"></p>
    </div>

   <div class="flex justify-end items-center gap-4 pt-4 border-t border-gray-200">
    <button type="button" onclick="closeModal()"
            class="px-6 py-2.5 rounded-xl text-gray-700 bg-gray-200 hover:bg-gray-300 transition duration-200 ease-in-out">
        Cancel
    </button>
    <button id="saveCategoryBtn" type="submit"
            class="px-6 py-2.5 rounded-xl text-white font-medium bg-indigo-600 hover:bg-indigo-700 shadow-lg transition duration-200 ease-in-out cursor-pointer">
        🚀 Save Category
    </button>
</div>

</form>
<p class="mt-2 text-green-600" id="successMessage"></p>


</div>

    </div>
</div>
<!-- Delete Modal -->
<script>
    const categoryContainer = document.getElementById("categories-container");


async function loadMenuCategory() {
    let skeletons = '';
    for (let i = 0; i < 3; i++) {
        skeletons += `
            <div class="flex items-center justify-between p-2 gap-2 rounded-xl bg-white border border-gray-100 shadow-sm animate-pulse mb-2">
                <label class="flex items-center gap-3 w-full">
                    <span class="w-4 h-4 rounded bg-gray-200"></span>
                    <span class="h-4 w-28 bg-gray-200 rounded"></span>
                </label>
                <span class="w-7 h-7 bg-gray-200 rounded-full ml-2"></span>
            </div>
            `;
    }
    categoryContainer.innerHTML = skeletons;
    
    try {
        const response = await fetch(`/admin/menu`, {
    headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    credentials: 'same-origin' // send cookies for auth
});
        const result = await response.json();
        console.log(result)
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        const menuCategory = result.categories || []
       

        let categoriesHTML = "";
        
            
          
            // Agar categories hain, tabhi loop chalao aur categoriesHTML banao
            menuCategory.forEach(category => { 
            
                 categoriesHTML += `
                   <div class="group flex items-center justify-between p-2 rounded-lg cursor-pointer 
            bg-blue-50/40 hover:bg-blue-100 transition-all duration-200">

    <!-- Text takes ALL remaining space -->
    <div onclick="getMenuItem(${category.id}, '${category.category_name}')"
         class="flex-grow text-gray-700 font-medium group-hover:text-blue-700 transition-colors duration-200">
       ${category.category_name}
    </div>

    <!-- Delete icon stays small & right aligned -->
    <i class="ri-delete-bin-5-line text-red-500 cursor-pointer ml-3 
           transition-colors duration-200"
       onclick="">
    </i>

</div>`;
               

            }); // End forEach loop
         
       
       

        categoryContainer.innerHTML = categoriesHTML;




    } catch (error) {
        console.error("Error loading categories:", error);
        categoryContainer.innerHTML = `<p class="text-red-500 p-4">Failed to load categories. Please try again.</p>`;
    }
}








function showToast(message) {
    // Create toast container
  const toast = document.createElement('div');
toast.className = `fixed top-3 z-[9999] max-w-xs bg-white border border-gray-200 rounded-xl shadow-xl toast-animate flex items-center p-3 space-x-3`;
toast.style.left = "50%";
toast.style.transform = "translateX(-50%)";  // <-- this centers it
toast.innerHTML = `
    <div class="shrink-0">
        <svg class="w-5 h-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
        </svg>
    </div>
    <div>
        <p class="text-sm font-medium text-gray-800 whitespace-nowrap">${message}</p>
    </div>
`;
    document.body.appendChild(toast);

    // Remove toast after animation ends (2s)
    setTimeout(() => {
        toast.remove();
    }, 2000);
}

    function openModal (){
            document.getElementById('default-modal').classList.remove('hidden');

const form = document.getElementById('categoryForm');
const nameInput = document.getElementById('categoryName');
const imageInput = document.getElementById('categoryImage');
const nameError = document.getElementById('categoryNameError');
const imageError = document.getElementById('categoryImageError');
const imagePreview = document.getElementById('imagePreview');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');

// Image preview
imageInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (!file) {
        imagePreview.classList.add('hidden');
        uploadPlaceholder.classList.remove('hidden');
        return;
    }
    const reader = new FileReader();
    reader.onload = ev => {
        imagePreview.src = ev.target.result;
        imagePreview.classList.remove('hidden');
        uploadPlaceholder.classList.add('hidden');
    };
    reader.readAsDataURL(file);
});

// Form submit via JS
form.addEventListener('submit', async e => {
    e.preventDefault();

    // Clear old messages
    nameError.textContent = '';
    imageError.textContent = '';
    successMessage.textContent = '';

    const formData = new FormData(form);
const saveBtn = document.getElementById('saveCategoryBtn');
    saveBtn.innerHTML = "Saving...";
    saveBtn.disabled = true;
    saveBtn.classList.add('opacity-60', 'cursor-not-allowed');
    try {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const res = await fetch('/admin/addCategory', {
            method: 'POST',
             headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': token
    },
            body: formData
        });

        const data = await res.json();

        if (!res.ok) {
            // Laravel returns errors in JSON with 422 status
            if (data.errors) {
                if (data.errors.category_name) nameError.textContent = data.errors.category_name[0];
                if (data.errors.category_image) imageError.textContent = data.errors.category_image[0];
            }
            return;
        }

        form.reset();
       closeModal();
       loadMenuCategory()
       showToast('Category added successfully ✅');
        imagePreview.classList.add('hidden');
        uploadPlaceholder.classList.remove('hidden');

    } catch (err) {
        console.error(err);
        alert('Something went wrong!');
    }  finally {
        saveBtn.innerHTML = "🚀 Save Category";
        saveBtn.disabled = false;
        saveBtn.classList.remove('opacity-60', 'cursor-not-allowed');
    }
});
    }


    function closeModal (){
    document.getElementById('default-modal').classList.add('hidden');


    }


const MenuItemsCache = {};
const activeRequests = {};
 let MenuContainer = document.getElementById("MenuItem")
  MenuContainer.innerHTML = `
                 <div class="w-full flex flex-col items-center justify-center py-10 text-center opacity-70">
                        <div class="text-4xl mb-3">📂</div>
                        <p class="text-lg font-semibold text-gray-600">Please select a category</p>
                        <p class="text-sm text-gray-400 mt-1">Start by choosing at least one</p>
                </div>`;

async function getMenuItem(categoryId, categoryName) {
     // Step 3: Show skeleton (optional)
     let menuloader = `<div id="itemsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Skeleton loader -->
    ${[1,2,3].map(() => `
        <div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative animate-pulse">
            <span class="absolute top-0 right-0 mt-2 mr-2 bg-gray-300 text-transparent text-xs font-bold px-4 py-1 rounded-full shadow-md">----</span>

            <div class="w-28 h-28 bg-gray-300 rounded-full mb-2 border-4 border-white shadow-md"></div>

            <div class="h-5 w-24 bg-gray-300 rounded mb-1"></div>
            
            <div class="h-4 w-16 bg-gray-300 rounded mb-1"></div>

            <div class="h-8 w-full bg-gray-300 rounded mb-2"></div>

            <div class="w-full py-2 bg-gray-300 rounded-lg"></div>
        </div>
    `).join('')}
</div>
`
    

    // Step 1: If already fetched → load from cache (NO API CALL)
    if (MenuItemsCache[categoryId]) {
        renderMenuItems(MenuItemsCache[categoryId], categoryId, categoryName);
        return;
    }

    // Step 2: If request is already running → ignore extra clicks
    if (activeRequests[categoryId]) return;
    activeRequests[categoryId] = true;

  MenuContainer.innerHTML = menuloader

    try {
        let menuloader = ""
        // Step 4: Single API call
        const res = await fetch(`/admin/getMenu/${categoryId}`, {
    headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    credentials: 'same-origin'
});
        const data = await res.json();
        const items = data.menu_items || [];
        console.log("Api call hoi");
        console.log(items);


        // Step 5: Cache category result
        MenuItemsCache[categoryId] = items;

        // Step 6: Render UI
        renderMenuItems(items, categoryId, categoryName);

    } catch (err) {
        console.error(err);
        MenuContainer.innerHTML = `
            <div class="text-red-500 text-center py-4 font-semibold">
                Failed to load menu items.
            </div>
        `;
    } finally {
        delete activeRequests[categoryId];
    }
}


// Render function (reuse for cache or fresh fetch)
function renderMenuItems(items, categoryId, categoryName) {
    
    if (items.length === 0) {
        MenuContainer.innerHTML = `
            <div class="w-full flex flex-col items-center justify-center py-4 text-center opacity-70">
                <div class="text-5xl mb-3">🍴</div>
                <p class="text-xl font-semibold text-gray-700">No Items Found</p>
                <p class="text-sm text-gray-500 mt-1">Add items for this category.</p>
            </div>

           
        `;

        
        return;
    }else{

   MenuContainer.innerHTML = `
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        ${items.map(item => `
            <div class="bg-white p-3 border border-gray-100 rounded-xl flex flex-col items-center relative hover:shadow-xl transition duration-300">
                <span class="absolute top-0 right-0 mt-2 mr-2 bg-emerald-500 text-white text-xs font-bold px-4 py-1 rounded-full shadow-md z-10">
                    ${item.price ?? "—"}
                </span>

                <img src="/storage/${item.image_url}"
                    class="w-28 h-28 object-cover rounded-full mb-2 border-4 border-white shadow-md">

                <h3 class="text-lg font-bold text-gray-800 mb-1">${item.item_name}</h3>
                
                <div class="star-rating text-sm mb-1">★★★★★</div>

                <p class="text-center text-xs text-gray-500 mb-2 h-8 overflow-hidden line-clamp-2 px-1">
                    ${item.description ?? ""}
                </p>

                <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 shadow-md">
                    View more
                </button>
            </div>
        `).join('')}
    </div>
`;


     
    


    }
}






    

</script>


@endsection