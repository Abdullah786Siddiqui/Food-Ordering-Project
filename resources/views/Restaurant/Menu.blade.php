@extends('layouts.Restaurant.restaurant')
@section('restaurant')



<style>
 .scroll::-webkit-scrollbar {
    display: none;
}


</style>

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


<div class="max-w-7xl mx-auto px-2 ">
    <h2 class="text-2xl font-bold text-gray-800 mb-2"> Categories</h2>
    
    <div class="flex space-x-3 pb-4 overflow-x-auto scroll pt-2" id="category-container">
       @forelse ($restaurantCategories as $pivotRow)
       @php
          $category = $pivotRow->category;
       @endphp
    <div 
        onclick="getMenuItem({{ $category->id }}, '{{ $category->category_name }}')"
        class="category-item flex flex-shrink-0 items-center p-2 w-[150px] h-[64px]
               bg-white rounded-xl shadow-md cursor-pointer transition-all duration-300
               hover:shadow-xl hover:scale-105 border border-gray-100"
        data-category-id="{{ $category->id }}" 
        data-category-name="{{ $category->category_name }}"
    >
        <img 
            src="{{ asset('storage/' . $category->category_image) }}"
            class="w-10 h-10 rounded-xl object-cover"
            alt="{{ $category->category_name }}"
        >

        <div class="flex flex-col justify-center ml-2">
            <span class="font-semibold text-sm text-gray-800 leading-snug">{{ $category->category_name }}</span>
            <span class="text-xs text-gray-500 mt-0.5">{{ $category->menu_items_count }} items</span>
        </div>
    </div>
@empty
    <div class="w-full flex flex-col items-center justify-center py-6 text-center opacity-80">
        <div class="text-5xl mb-3">📭</div>
        <p class="text-xl font-semibold text-gray-700">No categories yet found</p>
        <p class="text-sm text-gray-500 mt-1">Hit the “Add Category” button to start building your menu.</p>
    </div>
@endforelse

        </div>

<div class="flex items-center justify-between mb-2 mt-4">
  <h2 class="text-2xl font-bold text-gray-800">Menu Items</h2>
  
  <!-- Add icon with no background, black plus -->
<div id="addMenubtn">

  </div>
</div>



    <div class="pb-4 pt-2 " id="menu-container">
        </div>
    
   
</div>

{{-- First Modal --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center
    overflow-y-auto px-4 py-6 backdrop-blur-[2px] bg-black/40">

    <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-gray-200
        overflow-hidden animate-scale-in">

        <div class="flex items-center justify-between px-6 py-4
            border-b border-gray-200 bg-gray-50">

            <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                Select Menu Categories 📍
            </h3>

            <button type="button"
                class="text-gray-400 hover:text-gray-700
                hover:bg-gray-200/60 transition rounded-lg w-9 h-9 flex items-center justify-center cursor-pointer"
                onclick="closeModal()">
                ✖
            </button>
        </div>

        <div class="px-6 py-4 space-y-7">

            <div class="mb-4">

            
            <div class="relative">

                <span class="absolute inset-y-0 left-0 flex items-center pl-3">

                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 5h-2M7 13h4"></path></svg>

                </span>

                <input type="text" id="categoryName" placeholder="e.g. Italian, Fast Food"

                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl shadow-sm text-gray-800

                           focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 ease-in-out

                           :bg-gray-800 :text-white :border-gray-600 :focus:ring-indigo-500"

                >

            </div>
<div class="mt-2">
    <span class="text-gray-500 text-sm">Selected:</span>
    <span id="selectedCategoryName" class=" px-2 py-0.5 bg-indigo-50 text-indigo-600 font-semibold text-sm rounded">
        
    </span>
</div>
<p class="mt-2 text-center text-red-500" id="categoryError"></p>


        </div>
        

            <div id="categoryList"  class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 ">
                </div>

        </div>

        <div class="flex justify-end gap-4 px-6 py-4 border-t border-gray-200">
            <button type="button" onclick="closeModal()"
                class="px-6 py-2.5 rounded-xl text-gray-700 bg-gray-200 hover:bg-gray-300 transition">
                Cancel
            </button>

            <button type="button" onclick="saveCategories()" id='saveselection'
                class="px-6 py-2.5 rounded-xl text-white font-medium bg-indigo-600 hover:bg-indigo-700 shadow-lg
                shadow-indigo-500/40 transition cursor-pointer">
               
            </button>
        </div>
    </div>
</div>




 
 {{-- Second Modal --}}

<div id="default-modal2" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center
     px-4 py-6 pt-10 backdrop-blur-[2px] bg-black/40 items-center   ">

    <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-gray-200
        overflow-hidden animate-scale-in mb-6 flex flex-col h-fit max-h-[90vh]">
        <div class="flex items-center justify-between px-6 py-4
            border-b border-gray-200 bg-gray-50 flex-shrink-0">
            <h3 id="heading" class="text-xl font-bold text-gray-900 flex items-center gap-2">
               
            </h3>

            <button type="button"
                class="text-gray-400 hover:text-gray-700
                hover:bg-gray-200/60 transition rounded-lg w-9 h-9 flex items-center justify-center cursor-pointer"
                onclick="closeModal2()">
                ✖
            </button>
        </div>

        <div class="px-6 py-4 flex-grow overflow-y-auto">
 <form id="addMenuform" method="post"  enctype="multipart/form-data">
@csrf
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3 flex flex-col items-center mb-2">
                    
                    <div id="image_upload_container"
                         class="w-full max-w-xs aspect-square border border-gray-300 rounded-xl overflow-hidden shadow-lg bg-gray-100 flex items-center justify-center cursor-pointer relative group transition"
                         onclick="document.getElementById('item_image_file').click()">
                        
                        <img id="item_image_preview" 
                             src="/storage/placeholder/Menu_item_Placeholder.jpg" 
                             alt="Menu Item Preview" 
                             class="w-full h-full object-cover transition duration-300 group-hover:opacity-75">

                        <div class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition duration-300">
                             <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L15 15m0 0l2.158-2.158a2 2 0 012.828 0L20 16m-4-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>

                    <input type="file" id="item_image_file" name="menu_item_image" accept="image/*" class="hidden">
                    
                </div>

                <div class="md:w-2/3">
                    
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Item Details 📝</h4>

                    <div class="space-y-4">
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="item_name" class="block text-sm font-medium text-gray-700 mb-1">Item Name</label>
                                <div class="relative mt-1">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    </span>
                                    <input type="text" id="item_name" name="item_name" required
                                        class="pl-10 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5
                                        focus:ring-indigo-500 focus:border-indigo-500 transition"
                                        placeholder="e.g., Spicy Chicken Burger">
                                </div>
                            </div>
                            
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                                <div class="relative mt-1">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 font-medium">$</span>
                                    <input type="number" step="0.01" id="price" name="price" required
                                        class="pl-8 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5
                                        focus:ring-indigo-500 focus:border-indigo-500 transition"
                                        placeholder="12.00">
                                </div>
                            </div>
                        </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status (Availability)</label>
                                <div class="relative mt-1">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a8 8 0 00-11.234 0L3 12h2.236l1.632-1.632a4 4 0 015.656 0l1.632 1.632h2.236l1.632-1.632a8 8 0 000-11.234z"></path></svg>
                                    </span>
                                    <select id="status" name="status" required
                                        class="pl-10 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5
                                        focus:ring-indigo-500 focus:border-indigo-500 transition bg-white appearance-none">
                                        <option value="active">Available</option>
                                        <option value="inactive">Unavailable</option>
                                    </select>
                                </div>
                            </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <div class="relative mt-1">
                                <span class="absolute top-2 left-3">
                                     <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                </span>
                                <textarea id="description" name="description" rows="3"
                                    class="pl-10 pt-2.5 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5
                                    focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="A brief detail about the menu item..."></textarea>
                            </div>
                        </div>
                        
                    </div>
                   

                </div>

                

            </div>
        </div>

        <div class="flex justify-end gap-4 px-6 py-4 border-t border-gray-200 bg-white flex-shrink-0">
            <button type="button" onclick="closeModal2()"
                class="px-6 py-2.5 rounded-xl text-gray-700 bg-gray-200 hover:bg-gray-300 transition">
                Cancel
            </button>

            <button type="submit"  id='Addmenu'
                class="px-6 py-2.5 rounded-xl text-white font-medium bg-indigo-600 hover:bg-indigo-700 shadow-lg
                shadow-indigo-500/40 transition cursor-pointer">
                Add Menu
            </button>
        </div>
        </form>
    </div>
</div> 

 <script>

        const preview = document.getElementById('item_image_preview');
const defaultImageSrc = preview.src;
    // JavaScript code for image preview
    document.getElementById('item_image_file').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = defaultImageSrc;
        }
    });


  

const categoryContainer = document.getElementById("category-container");
   const MenuContainer = document.getElementById("menu-container");
   MenuContainer.innerHTML = `    <div class="w-full flex flex-col items-center justify-center py-10 text-center opacity-80">
                    <div class="text-5xl mb-3">🍽️</div>
                   <p class="text-xl font-semibold text-gray-700">Select a category</p>
                   <p class="text-sm text-gray-500 mt-1">Choose a category from above to view its menu items.</p>
               </div>`;
       
     

// ✅ FIX 1: Default image variable define kiya gaya.
const defaultCategoryImg = 'default_category_img.png'; 

async function loadMenuCategory() {
    let skeletons = '';
    for (let i = 0; i < 6; i++) {
        skeletons += `
            <div class="flex flex-shrink-0 items-center p-2 w-[150px] h-[64px] bg-white rounded-xl shadow-md animate-pulse">
                <div class="w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="flex flex-col justify-center ml-2 space-y-1">
                    <span class="h-3 w-16 bg-gray-200 rounded"></span>
                    <span class="h-2 w-10 bg-gray-100 rounded"></span>
                </div>
            </div>
        `;
    }
    categoryContainer.innerHTML = skeletons;
    
    try {
        const response = await fetch(`/restaurant/restaurantCategory`);
        const result = await response.json();
        const menuCategory = Array.isArray(result) ? result : (result.restaurant_categories || []);

        let categoriesHTML = "";
        
            
           if (menuCategory.length === 0) {
            categoriesHTML = `
                <div class="w-full flex flex-col items-center justify-center py-6 text-center opacity-80">
                    <div class="text-5xl mb-3">📭</div>
                    <p class="text-xl font-semibold text-gray-700">No categories yet found </p>
                    <p class="text-sm text-gray-500 mt-1">Hit the “Add Category” button to start building your menu.</p>
                </div>`;
                
        } else {
            // Agar categories hain, tabhi loop chalao aur categoriesHTML banao
            menuCategory.forEach(pivotRow => { 
                const item = pivotRow.category; 
                // ... (baaki HTML generation logic) ...
                 categoriesHTML += `
                    <div onclick="getMenuItem(${item.id}, '${item.category_name}')"
                        class="category-item flex flex-shrink-0 items-center p-2 w-[150px] h-[64px]
                        bg-white rounded-xl shadow-md cursor-pointer transition-all duration-300
                        hover:shadow-xl hover:scale-105 border border-gray-100"
                        data-category-id="${item.id}" data-category-name="${item.category_name}">
                        
                        <img src="${item.category_image ? `/storage/${item.category_image}` : `/storage/${defaultCategoryImg}`}" 
                            class="w-10 h-10 rounded-xl object-cover"
                            alt="${item.category_name}">

                        <div class="flex flex-col justify-center ml-2">
                            <span class="font-semibold text-sm text-gray-800 leading-snug">${item.category_name}</span>
                            <span class="text-xs text-gray-500 mt-0.5">${item.menu_items_count || 0} items</span>
                        </div>
                    </div>`;
               

            }); // End forEach loop
         
        } // End ELSE block
       

        categoryContainer.innerHTML = categoriesHTML;




    } catch (error) {
        console.error("Error loading categories:", error);
        categoryContainer.innerHTML = `<p class="text-red-500 p-4">Failed to load categories. Please try again.</p>`;
    }
}


  
 

let categories = []; // All available categories from the server
let existingCategory = []; // Categories already associated with the restaurant
let selectedCategories = []; // Categories selected in the modal
let categoryError; // Global variable for the error message element

// Utility function to update the selected category name display
function updateSelectedNameDisplay() {
    const selectedNameSpan = document.getElementById('selectedCategoryName');
    
    selectedNameSpan.textContent = selectedCategories.length
        ? selectedCategories.map(id => categories.find(c => c.id === id)?.category_name || '').join(', ')
        : 'None';
        
    // Save button text update (optional)
    const saveButton = document.getElementById('saveselection');
    if (saveButton) {
        saveButton.textContent = `Save Selection (${selectedCategories.length})`;
    }
}

async function openModal() {
    // Initialize global variables
    categories = []; 
    existingCategory = [];
    selectedCategories = []; // Start fresh selection every time modal opens
    categoryError = document.getElementById('categoryError'); // Set the error element

    // Clear previous selection display and error
    updateSelectedNameDisplay(); 
    if (categoryError) categoryError.innerHTML = ""; // Improvement: Clear error on open

    // Show modal
    document.getElementById('default-modal').classList.remove('hidden');

    const container = document.getElementById('categoryList');
   container.innerHTML = ''; // clear existing


for (let i = 0; i < 6; i++) {
    const sk = document.createElement('div');
    sk.className = `
        relative px-3 py-2 rounded-lg shadow-sm border border-gray-200 
        bg-gray-100 animate-pulse w-full h-8 overflow-hidden
    `;

    sk.innerHTML = `
        <div class="absolute inset-0 bg-gray-300 rounded-md"></div>
        <div class="relative z-10 h-3 w-20 bg-gray-200 rounded-md"></div>
        <div class="absolute inset-0 bg-white/20 backdrop-blur-sm rounded-lg"></div>
    `;

    container.appendChild(sk);
}


    try {
        const res = await fetch('/restaurant/allCategory');
        const result = await res.json();

        // Populate global variables
        categories = result.categories || [];
        existingCategory = result.restaurant_categories || []; // IDs of existing categories

        container.innerHTML = '';

        if (categories.length === 0) {
            container.innerHTML = `<p class="text-red-500 text-sm">No Category Item Found</p>`;
            return;
        }

        let modalCategoryHTML = '';

        categories.forEach(cat => {
            const isExisting = existingCategory.includes(cat.id);
            // Check if it's in selectedCategories (though selectedCategories is currently empty on open)
            const isSelected = selectedCategories.includes(cat.id); 
            
            // Fallback image path for modal categories
            const categoryImage = cat.category_image ? `/storage/${cat.category_image}` : `/storage/${defaultCategoryImg}`;


            // Add 'data-category-id' for easier access/update later if needed
            modalCategoryHTML += `
                <div 
                    id="cat-${cat.id}"
                    onclick="toggleCategory(${cat.id})"
                    data-category-id="${cat.id}"
                    class="relative flex items-center justify-center px-3 py-2 rounded-lg shadow-sm border border-gray-200 font-semibold transition 
                        ${isExisting ? 'opacity-50 pointer-events-none' : 'cursor-pointer hover:shadow-md'}
                        ${isSelected && !isExisting ? 'border-indigo-600 ring-2 ring-indigo-600' : ''}" 
                    style="background: url('${categoryImage}') center/cover no-repeat"
                >
                    
                    <span class="relative z-10 text-sm text-white">${cat.category_name}</span>
                    <div class="absolute inset-0 bg-black/50 rounded-lg"></div> {{-- Improvement: Increased opacity for better text visibility --}}
                </div>
            `;
        });

        container.innerHTML = modalCategoryHTML;
        
        // Update Save button text
        document.getElementById('saveselection').textContent = `Save Selection (${selectedCategories.length})`;


    } catch (err) {
        console.error("Error loading categories:", err);
        container.innerHTML = `<p class="text-red-500 text-sm">Failed to load categories.</p>`;
    }
}

function toggleCategory(id) {
    if (categoryError) categoryError.innerHTML = ""; // Clear error on new selection attempt

    // Check if the category is an existing one (already associated)
    if (existingCategory.includes(id)) {
        if (categoryError) categoryError.innerHTML = "This Category is already added to the restaurant.";
        return; // Already exists, so don't allow selection/deselection
    }

    const categoryElement = document.getElementById(`cat-${id}`);

    // Toggle the selection in the global array
    const index = selectedCategories.indexOf(id);
    if (index === -1) {
        // Add category
        selectedCategories.push(id);
        // Visual feedback
        if (categoryElement) {
             categoryElement.classList.add('border-indigo-600', 'ring-2', 'ring-indigo-600');
        }
    } else {
        // Remove category
        selectedCategories.splice(index, 1);
        // Visual feedback
         if (categoryElement) {
            categoryElement.classList.remove('border-indigo-600', 'ring-2', 'ring-indigo-600');
        }
    }

    // Update the display of selected names and save button text
    updateSelectedNameDisplay();
}

function closeModal() {
    document.getElementById('default-modal').classList.add('hidden');
}

async function saveCategories() {
  
     if (selectedCategories.length === 0) {
        categoryError.innerHTML = "Please select at least one category.";
        return;
    }

    const saveBtn = document.getElementById('saveselection');
    saveBtn.innerHTML = "Saving...";
    saveBtn.disabled = true;
    saveBtn.classList.add('opacity-60', 'cursor-not-allowed');

    try {
        // Fix: Fetching token from meta tag (which was added in Blade section)
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch('/restaurant/saveCategories', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': token },
            body: JSON.stringify({ categories: selectedCategories })
        });
        const result = await response.json();

        if (response.ok) {
            closeModal();           // Close the modal
            selectedCategories = []; // Reset selection
            await loadMenuCategory();
        } else {
            alert(result.message || "Failed to save categories.");
        }
    } catch (err) {
        alert("Something went wrong. Please try again.");
        console.error(err);
    } finally {
        saveBtn.innerHTML = "Save Selection";
        saveBtn.disabled = false;
        saveBtn.classList.remove('opacity-60', 'cursor-not-allowed');
    }
}

const MenuItemsCache = {};
const activeRequests = {};
    let addbtnMenu = document.getElementById("addMenubtn")


async function getMenuItem(categoryId, categoryName) {
  addbtnMenu.innerHTML = ""
    // Fix: Highlight active category
    // 1. Remove highlight from all categories
    document.querySelectorAll('.category-item').forEach(el => {
        el.classList.remove('border-2', 'border-indigo-600', 'shadow-xl');
    });
    // 2. Add highlight to the clicked category
    const activeCategoryElement = document.querySelector(`[data-category-id="${categoryId}"]`);
    if (activeCategoryElement) {
        activeCategoryElement.classList.add('border-2', 'border-indigo-600', 'shadow-xl');
    }

    // Step 1: If already fetched → load from cache (NO API CALL)
    if (MenuItemsCache[categoryId]) {
        renderMenuItems(MenuItemsCache[categoryId], categoryId, categoryName);
        return;
    }

    // Step 2: If request is already running → ignore extra clicks
    if (activeRequests[categoryId]) return;
    activeRequests[categoryId] = true;

    // Step 3: Show skeleton (optional)
    MenuContainer.innerHTML = `
        <div class="w-full flex flex-col gap-3">
            ${[...Array(3)].map(() => `
                <div class="animate-pulse bg-gray-100 h-24 rounded-lg w-full"></div>
            `).join('')}
        </div>
    `;

    try {
        // Step 4: Single API call
        const res = await fetch(`/restaurant/restaurantMenu/${categoryId}`);
        const data = await res.json();
        const items = data.menu_items || [];
        console.log("Api call hoi");

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

            <div class="w-full flex items-center justify-center mt-3">
                <button 
                    class="px-6 py-2 bg-blue-400 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 transition cursor-pointer"
                    onclick="openModal2(${categoryId}, '${categoryName}')">
                    Add Item
                </button>
            </div>
        `;

        
        return;
    }else{

    MenuContainer.innerHTML = items.map(item => {
        
        
        return `
        <div class="flex items-start p-4  bg-white rounded-2xl shadow-xl border border-gray-100 mb-4 
                    transition hover:shadow-2xl hover:scale-[1.02] hover:bg-gray-50 cursor-pointer">
            
            <img src='/storage/${item.image_url}'
                 class="w-20 h-20 rounded-xl object-cover shadow-md">

            <div class="ml-4 flex-grow">
                <h3 class="font-extrabold text-lg text-gray-900 leading-tight">${item.item_name}</h3>
                <p class="text-sm text-gray-600 mt-1 line-clamp-2">${item.description || ''}</p>
                <span class="inline-flex items-center px-3 py-1 text-sm font-bold bg-indigo-500 
                             text-white rounded-full shadow-md mt-2">
                    Rs ${item.price || '0'}
                </span>
            </div>

        </div>
    `}).join('');

      let plusIcon = `
        <button onclick="openModal2(${categoryId}, '${categoryName}')" 
                class="flex items-center justify-center w-10 h-10 rounded-full hover:scale-110 transition transform cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    `;

    addbtnMenu.innerHTML = plusIcon; 

    }
}

const menuForm = document.getElementById('addMenuform');
let categoryId = null;
if (menuForm) {
menuForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // prevent default form submission

    const formData = new FormData(menuForm);
    console.log(formData);
    
    const MenuSavebtn = document.getElementById('Addmenu');
    MenuSavebtn.innerHTML = "Adding...";
    MenuSavebtn.disabled = true;
    MenuSavebtn.classList.add('opacity-60', 'cursor-not-allowed');
    try {
        // Make API call
       
        
        const response = await fetch(`/restaurant/addMenu/${categoryId}`, {
            method: 'POST',
            body: formData,
        });
   

        const result = await response.json(); // assuming your API returns JSON
        

        menuForm.reset();
        
       let catid = result.category.id;
let cat_name = result.category.name;
if (MenuItemsCache[catid]) {
    delete MenuItemsCache[catid];
}
loadMenuCategory(); 

getMenuItem(catid, cat_name);

closeModal2();
        

    } catch (error) {
        console.error('Error adding menu item:', error);
    } finally {
        MenuSavebtn.innerHTML = "Add Menu";
        MenuSavebtn.disabled = false;
        MenuSavebtn.classList.remove('opacity-60', 'cursor-not-allowed');
    
    }
});
}




    const heading = document.getElementById('heading');
    function openModal2(id,categoryName){
        categoryId = id;

    heading.textContent = `Add to ${categoryName} Menu📍`  
    document.getElementById('default-modal2').classList.remove('hidden');
    }



function closeModal2() {
    document.getElementById('default-modal2').classList.add('hidden');
    heading.textContent = ""
    const menuForm = document.getElementById('addMenuform');
        if (menuForm) {
            menuForm.reset(); 
        }
        
        preview.src = defaultImageSrc;

}



 </script> 

@endsection