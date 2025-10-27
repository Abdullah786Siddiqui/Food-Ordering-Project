@extends('layouts.Delivery_Partner.delivery_partner')
@section('delivery_partner')
 

<main class="space-y-6">

<!-- Header -->
<section class="bg-white/80 backdrop-blur-md shadow-sm border border-gray-100 p-5 rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center">
  <div>
    <h1 class="text-2xl font-extrabold text-gray-800">
      Welcome, <span class="text-blue-600">Ride 👋</span>
    </h1>
    <p class="text-gray-500 text-sm mt-1">
      Track your deliveries, earnings & performance all in one place.
    </p>
  </div>

  <!-- Toggle Switch -->
  <div class="mt-4 sm:mt-0 flex items-center gap-3">
    <span class="text-sm font-medium text-gray-600">Status:</span>
    <button id="toggleBtn" class="relative inline-flex h-6 w-12 items-center rounded-full bg-gray-300 transition duration-300">
      <span id="toggleCircle" class="inline-block h-5 w-5 transform rounded-full bg-white shadow-md transition duration-300 translate-x-1"></span>
    </button>
    <span id="toggleStatus" class="text-sm font-semibold text-gray-700">OFF</span>
  </div>
</section>

<!-- JavaScript -->
<script>
  const toggleBtn = document.getElementById('toggleBtn');
  const toggleCircle = document.getElementById('toggleCircle');
  const toggleStatus = document.getElementById('toggleStatus');

  let isOn = false;

  toggleBtn.addEventListener('click', () => {
    isOn = !isOn;

    if (isOn) {
      toggleBtn.classList.replace('bg-gray-300', 'bg-blue-500');
      toggleCircle.classList.add('translate-x-6');
      toggleStatus.textContent = 'ON';
      toggleStatus.classList.replace('text-gray-700', 'text-blue-600');
    } else {
      toggleBtn.classList.replace('bg-blue-500', 'bg-gray-300');
      toggleCircle.classList.remove('translate-x-6');
      toggleStatus.textContent = 'OFF';
      toggleStatus.classList.replace('text-blue-600', 'text-gray-700');
    }
  });
</script>


  <!-- Stats Cards -->
  <section class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 p-5 rounded-2xl shadow-sm hover:shadow-md transition">
      <p class="text-gray-500 text-sm">Total Deliveries</p>
      <h2 class="text-2xl font-extrabold text-blue-700 mt-1">256</h2>
    </div>
    <div class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 p-5 rounded-2xl shadow-sm hover:shadow-md transition">
      <p class="text-gray-500 text-sm">Earnings (Today)</p>
      <h2 class="text-2xl font-extrabold text-green-700 mt-1">Rs. 3,120</h2>
    </div>
    <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-200 p-5 rounded-2xl shadow-sm hover:shadow-md transition">
      <p class="text-gray-500 text-sm">Active Orders</p>
      <h2 class="text-2xl font-extrabold text-yellow-700 mt-1">4</h2>
    </div>
    <div class="bg-gradient-to-r from-purple-50 to-purple-100 border border-purple-200 p-5 rounded-2xl shadow-sm hover:shadow-md transition">
      <p class="text-gray-500 text-sm">Customer Rating</p>
      <h2 class="text-2xl font-extrabold text-purple-700 mt-1">4.8 ⭐</h2>
    </div>
  </section>

 

  <!-- Earnings Summary -->
  <section class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-2xl p-6 shadow-sm">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Earnings Summary</h2>
    <div class="grid sm:grid-cols-3 gap-4 sm:gap-6">
      <div class="bg-green-50 rounded-xl p-4 text-center border border-green-100">
        <p class="text-sm text-gray-600">Today</p>
        <h3 class="text-xl font-bold text-green-700 mt-1">Rs. 3,120</h3>
      </div>
      <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100">
        <p class="text-sm text-gray-600">This Week</p>
        <h3 class="text-xl font-bold text-blue-700 mt-1">Rs. 18,640</h3>
      </div>
      <div class="bg-purple-50 rounded-xl p-4 text-center border border-purple-100">
        <p class="text-sm text-gray-600">This Month</p>
        <h3 class="text-xl font-bold text-purple-700 mt-1">Rs. 72,350</h3>
      </div>
    </div>
  </section>

  <!-- Notifications -->
  <section class="bg-white rounded-2xl shadow border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold text-gray-800">Recent Notifications</h2>
      <button class="text-sm text-blue-600 hover:underline">View All</button>
    </div>
    <ul class="space-y-4">
      <li class="flex items-start gap-3 bg-blue-50 rounded-lg p-3">
        <span class="text-blue-600 text-lg">📦</span>
        <p class="text-sm text-gray-700"><strong>New Delivery:</strong> Order #2035 assigned in Gulshan Area.</p>
      </li>
      <li class="flex items-start gap-3 bg-yellow-50 rounded-lg p-3">
        <span class="text-yellow-500 text-lg">⏰</span>
        <p class="text-sm text-gray-700"><strong>Reminder:</strong> Complete pending delivery before 7 PM.</p>
      </li>
      <li class="flex items-start gap-3 bg-green-50 rounded-lg p-3">
        <span class="text-green-600 text-lg">💰</span>
        <p class="text-sm text-gray-700"><strong>Weekly Bonus:</strong> You’re eligible for Rs. 2,000 bonus!</p>
      </li>
    </ul>
  </section>



</main>


















<nav class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-lg border-t border-gray-200 shadow-[0_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center py-3  md:hidden z-50">

  <!-- Status -->
  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-all duration-300 active:scale-90">
    <i class="ri-home-5-line text-2xl mb-1"></i>
    <span class="text-xs font-semibold">Status</span>
  </button>

  <!-- Deliveries -->
  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-all duration-300 active:scale-90">
    <i class="ri-truck-line text-2xl mb-1"></i>
    <span class="text-xs font-semibold">Deliveries</span>
  </button>

  <!-- Map -->
  <button class="flex flex-col items-center text-gray-500 px-2 hover:text-green-600 transition-all duration-300 active:scale-90">
    <i class="ri-map-2-line text-2xl mb-1"></i>
    <span class="text-xs font-semibold">Map</span>
  </button>

  <!-- History -->
  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-all duration-300 active:scale-90">
    <i class="ri-history-line text-2xl mb-1"></i>
    <span class="text-xs font-semibold">History</span>
  </button>

  <!-- Profile -->
  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-all duration-300 active:scale-90">
    <i class="ri-user-line text-2xl mb-1"></i>
    <span class="text-xs font-semibold">Profile</span>
  </button>

</nav>


@endsection
