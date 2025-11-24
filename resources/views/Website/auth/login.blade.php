<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('user.login.submit') }}" 
          class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        @csrf

        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">User Login</h1>

        {{-- Session Status --}}
        {{-- @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center font-medium">
                {{ session('status') }}
            </div>
        @endif --}}

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="flex items-center mb-6">
            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            <label for="remember_me" class="ml-2 block text-gray-600 text-sm">
                Remember Me
            </label>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center justify-between">
          
                <a href="#" 
                   class="text-sm text-indigo-600 hover:underline">
                   Forgot your password?
                </a>
           

            <button type="submit" 
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all">
                Log In
            </button>
        </div>
{{-- Register Redirect --}}
         <p class="text-center text-sm text-gray-600 mt-4">
            Don’t have an account? 
            <a href="{{ route('user.register') }}" 
               class="text-indigo-600 font-medium hover:underline">
               Register here
            </a>
        </p>
    </form>

</body>
</html>
