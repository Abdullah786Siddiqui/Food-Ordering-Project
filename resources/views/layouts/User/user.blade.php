<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food-Panda </title>
    @vite(['resources/css/app.css'])
     <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>
<body  >
  {{-- Navbar --}}
  @include('Components.website.header')
<main class="pt-16" >
            @yield('user')
        </main>
        
          {{-- Tailwind JS --}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
