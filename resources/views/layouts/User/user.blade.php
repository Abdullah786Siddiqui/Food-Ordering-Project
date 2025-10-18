<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Food-Panda</title>
    @vite('resources/css/app.css') 

</head>
<body>
    <h1 class="text-red-500">hi</h1>
      <nav class="flex items-center justify-end gap-4">
                    @auth
                                           <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit"   class="inline-block px-5 py-1.5  dark:text-[#EDEDEC] text-[#1b1b18] border  border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Logout</button>
        </form>
                    @else
                        <a
                            href="{{ route('user.login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        
                            <a
                                href="{{ route('user.register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                  
                    @endauth
                </nav>

        <!-- Content -->
        <main >
            @yield('user')
        </main>
</body>
</html>