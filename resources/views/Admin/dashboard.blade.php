@extends('layouts.Admin.admin')
@section('admin')
<section >
  <div class=" rounded-lg :bg-gray-800 ">
    
   

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      <!-- Total Users -->
      <div class="bg-[#FAE8FF] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Users</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totalUsers  }}</h2>
        <p class="text-xs text-gray-500 mt-1">+150 this month</p>
      </div>

      <!-- Total Requests -->
      <div class="bg-[#DBFCE7] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Restaurant Partners</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m4 0h1v4h1m-6 4h6" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totalRestaurant }}</h2>
        <p class="text-xs text-gray-500 mt-1">128 need attention</p>
      </div>

      <!-- Total Patients -->
      <div class="bg-[#FEF9C2] rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
        <div class="flex justify-between items-center">
          <span class="text-md font-bold text-gray-600">Total Delivey Partners</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
          </svg>
        </div>
        <h2 class="mt-3 text-3xl font-bold text-gray-900">{{ $totaldeliverypartner }}</h2>
        <p class="text-xs text-gray-500 mt-1">+45 today</p>
      </div>

    </div>


    <!-- Load Tailwind CSS -->
  
    <style>
        /* Custom CSS to match the smooth shadows and font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        
        
        
        /* Utility for the circular food icons */
        .food-icon {
            background-color: #fff8e1; /* Very light yellow background */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 9999px;
            overflow: hidden;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5); /* White ring effect */
        }

        /* Define the primary teal color for the chart */
        .chart-primary {
            color: #0d9488; /* Teal-600 */
        }
    </style>

    <div class="max-w-7xl mx-auto">
        <!-- Main Dashboard Container -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

          <!-- Sales Analytics Chart Component -->
<div class="lg:col-span-2 bg-white p-6 rounded-3xl shadow-xl">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Sales Analytics</h2>
    <div class="relative">
      <select class="appearance-none bg-white border border-gray-200 text-sm py-1.5 pl-3 pr-8 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer">
        <option>This Week</option>
        <option>This Month</option>
        <option>This Year</option>
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </div>
    </div>
  </div>

  <!-- Chart -->
  <div class="relative h-[350px]">
    <canvas id="salesChart"></canvas>
  </div>

  <!-- X-Axis Labels -->
  {{-- <div class="flex justify-between text-gray-600 font-medium text-sm pt-4 pl-2">
    <span>Tue</span>
    <span>Wed</span>
    <span>Thu</span>
    <span>Fri</span>
    <span>Sat</span>
    <span>Sun</span>
    <span>Mon</span>
  </div> --}}
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('salesChart').getContext('2d');

  const gradient = ctx.createLinearGradient(0, 0, 0, 400);
  gradient.addColorStop(0, 'rgba(13, 148, 136, 0.25)'); // teal-600 light
  gradient.addColorStop(1, 'rgba(13, 148, 136, 0)');

  const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon'],
      datasets: [
        {
          label: 'Sales',
          data: [200, 320, 260, 340, 290, 310, 370],
          borderColor: '#0d9488',
          backgroundColor: gradient,
          fill: true,
          tension: 0.4, // creates that smooth wave curve
          borderWidth: 2,
          pointBackgroundColor: '#0d9488',
          pointBorderColor: '#fff',
          pointHoverRadius: 6,
          pointRadius: 4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#fff',
          titleColor: '#111',
          bodyColor: '#111',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          displayColors: false,
          usePointStyle: true,
          callbacks: {
            title: () => '',
            label: (context) => [
              `Expense: $${(context.parsed.y * 0.3).toLocaleString()}`,
              `Income: $${(context.parsed.y * 5.7).toLocaleString()}`,
            ],
          },
        },
      },
      scales: {
        x: {
          grid: { display: false },
          ticks: { color: '#6b7280' },
        },
        y: {
          beginAtZero: true,
          ticks: { color: '#6b7280', callback: (v) => v + 'k' },
          grid: { color: '#f3f4f6' },
        },
      },
    },
  });
</script>


            <!-- 2. Side Panel (Right Column) -->
            <div class="lg:col-span-1 flex flex-col gap-6">

                <!-- Most Popular Items Card -->
                <div class="bg-white p-6 rounded-3xl shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Most Popular Items</h3>
                    
                    <!-- Item List -->
                    <div class="space-y-4">
                        <!-- Item 1: Special Chicken -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="food-icon bg-red-100">
                                   <img src="https://i.pinimg.com/736x/c9/c5/01/c9c5013a47c78dde12d22a8659cdb945.jpg"  alt="">
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Special Chicken</p>
                                    <p class="text-xs text-gray-500">3251 Orders · <span class="chart-primary font-semibold">$1,236</span> earned</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 2: Chew Mein -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="food-icon bg-yellow-100">
                                    <img src="https://i.pinimg.com/736x/95/9d/07/959d075f1d43263e53f1bbff0dee4baf.jpg"  alt="">
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Chew Mein</p>
                                    <p class="text-xs text-gray-500">3251 Orders · <span class="chart-primary font-semibold">$1,189</span> earned</p>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3: BBQ Pork -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="food-icon bg-red-200">
                                            <img src="https://i.pinimg.com/1200x/61/d5/b3/61d5b30bcb5f67cec5888d538751db2e.jpg"  alt="">
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">BBQ Pork</p>
                                    <p class="text-xs text-gray-500">3251 Orders · <span class="chart-primary font-semibold">$2,154</span> earned</p>
                                </div>
                            </div>
                        </div>

                        <!-- Item 4: Masala Pasta -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="food-icon bg-orange-100">
                                         <img src="https://i.pinimg.com/736x/66/d2/cd/66d2cd1642ef44ff621fdc4d9a14fa09.jpg"  alt="">
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Masala Pasta</p>
                                    <p class="text-xs text-gray-500">3251 Orders · <span class="chart-primary font-semibold">$1,233</span> earned</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Boy Card -->
                <div class="bg-white p-6 rounded-3xl shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Delivery Boy</h3>
                    
                <div class="flex -space-x-2 overflow-hidden">
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://placehold.co/40x40/5eead4/white?text=A" alt="Avatar 1">
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://placehold.co/40x40/fcd34d/white?text=B" alt="Avatar 2">
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://placehold.co/40x40/f472b6/white?text=C" alt="Avatar 3">
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://placehold.co/40x40/8b5cf6/white?text=D" alt="Avatar 4">
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://placehold.co/40x40/10b981/white?text=E" alt="Avatar 5">
</div>

                </div>
            </div>

        </div>
    </div>


  </div>
</section>
@endsection
