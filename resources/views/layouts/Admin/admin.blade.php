<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
     {{-- Flowbite CSS --}}
     <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- Remix Icon --}}
    <!-- Remix Icon CDN -->
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: whitesmoke">
      {{-- <nav class="flex items-center justify-end gap-4">
               
                                           <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"   class="inline-block px-5 py-1.5  dark:text-[#EDEDEC] text-[#1b1b18] border  border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Logout</button>
        </form>
                  
                </nav> --}}

   {{-- navbar --}}
@include('Components.Admin.header')
     {{-- Sidebar --}}
@include('Components.Admin.sidebar')
        <!-- Content -->
        <main class="sm:ml-60 px-8 max-sm:px-4 py-8 mt-12">
            @include('Components.Toast.toast')

            @yield('admin')
        </main>

          {{-- Tailwind JS --}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
     {{-- Flowbite JS --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>