     window.addEventListener('DOMContentLoaded', () => {
         // Function to read a cookie by name
         function getCookie(name) {
             const value = `; ${document.cookie}`;
             const parts = value.split(`; ${name}=`);
             if (parts.length === 2) return parts.pop().split(';').shift();
         }

         // Get userlocation cookie
         const savedLocation = getCookie("userlocation");

         if (savedLocation) {
             // parse JSON if stored as JSON string
             const location = JSON.parse(savedLocation);

             // set element text
             const addressEl = document.getElementById("Address");
             if (addressEl) {
                 addressEl.textContent = location.fullAddress || 'New Address Service Road W Islamabad';
             }
         }
     });



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


      const dropdownBtn = document.getElementById('userDropdownBtn');
                 const dropdownMenu = document.getElementById('userDropdownMenu');

                 dropdownBtn.addEventListener('click', () => {
                     // Toggle 'hidden' class for basic functionality
                     const isHidden = dropdownMenu.classList.toggle('hidden');

                     // Add/Remove transition classes for smooth animation
                     if (!isHidden) {
                         // Show menu and apply transition start classes
                         setTimeout(() => {
                             dropdownMenu.classList.remove('opacity-0', 'scale-95');
                             dropdownMenu.classList.add('opacity-100', 'scale-100');
                         }, 10); // Small delay for the transition to catch
                     } else {
                         // Apply transition end classes before hiding
                         dropdownMenu.classList.remove('opacity-100', 'scale-100');
                         dropdownMenu.classList.add('opacity-0', 'scale-95');

                         // Hide menu completely after transition finishes (200ms)
                         setTimeout(() => {
                             dropdownMenu.classList.add('hidden');
                         }, 200);
                     }
                 });

                 // Optional: Close dropdown if clicked outside
                 window.addEventListener('click', function(e) {
                     if (e.target !== dropdownBtn && !dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                         if (!dropdownMenu.classList.contains('hidden')) {
                             // Smooth close when clicking outside
                             dropdownMenu.classList.remove('opacity-100', 'scale-100');
                             dropdownMenu.classList.add('opacity-0', 'scale-95');
                             setTimeout(() => {
                                 dropdownMenu.classList.add('hidden');
                             }, 200);
                         }
                     }
                 });