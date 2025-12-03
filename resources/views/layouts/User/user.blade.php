<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Food-Panda </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>
<body >
  {{-- Navbar --}}
  @include('Components.website.header')
<main class="pt-16" >
            @yield('user')
        </main>

        
        <script>
          window.USER_IS_LOGGED_IN = {{ auth()->check() ? 'true' : 'false' }};
    window.CSRF_TOKEN = "{{ csrf_token() }}";
        </script>
        
          {{-- Tailwind JS --}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
