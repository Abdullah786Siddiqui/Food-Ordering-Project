<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food-Panda Tailwind Drawer</title>
    @vite(['resources/css/app.css'])

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  {{-- Navbar --}}
  @include('Components.website.header')

<main class="sm:ml-60 px-8 max-sm:px-4 py-8 mt-12">
            @yield('user')
        </main>

</body>
</html>
