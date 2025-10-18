<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
      <nav class="flex items-center justify-end gap-4">
               
                                           <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"   class="inline-block px-5 py-1.5  dark:text-[#EDEDEC] text-[#1b1b18] border  border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Logout</button>
        </form>
                  
                </nav>

        <!-- Content -->
        <main >
            @yield('admin')
        </main>
</body>
</html>