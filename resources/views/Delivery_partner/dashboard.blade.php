@extends('layouts.Delivery_Partner.delivery_partner')
@section('delivery_partner')
    Hi I am a Delivery Partner
    <nav class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm border-t border-gray-200 shadow-lg flex justify-around py-2 rounded-t-xl md:hidden z-50">
  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
    </svg>
    <span class="text-xs font-medium">Home</span>
  </button>

  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
      <polyline points="7 10 12 15 17 10" />
    </svg>
    <span class="text-xs font-medium">Orders</span>
  </button>

  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2">
      <circle cx="12" cy="12" r="10" />
      <path d="M12 8v4l3 3" />
    </svg>
    <span class="text-xs font-medium">Earnings</span>
  </button>

  <button class="flex flex-col items-center text-gray-500 hover:text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2">
      <circle cx="12" cy="7" r="4" />
      <path d="M5.5 21a8.38 8.38 0 0 1 13 0" />
    </svg>
    <span class="text-xs font-medium">Profile</span>
  </button>
</nav>

@endsection
