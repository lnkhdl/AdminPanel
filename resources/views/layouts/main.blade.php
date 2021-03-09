<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Admin Panel</title>
    </head>
    <body class="bg-gray-200 antialiase">
        <div class="flex min-h-screen">
            <div class="relative flex-grow-0 w-56 shadow-2xl bg-main-700 text-gray-50">
                <nav class="">
                    <div class="px-4 py-3 text-2xl text-center border-b-2 shadow-lg">Admin Panel</div>
                    <ul class="p-4">
                        <li class="p-2 rounded-lg bg-main-800">
                            <a href="/users">Users</a>
                        </li>
                        <li class="p-2">
                            <a href="#">Menu #2</a>
                        </li>
                    </ul>
                </nav>
                <footer class="absolute bottom-0 py-4 text-xs left-16">
                    <span>2020 © LNKHDL</span>
                </footer>
            </div>

            <div class="flex-grow bg-main-100">
                <div>
                    <div class="flex justify-end px-8 py-4 bg-white border-b-2">
                        <a href="#" class="mx-3 hover:text-main-800">My Profile</a>

                        <a href="{{ route('logout') }}" class="mx-3 hover:text-main-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf
                        </form>
                    </div>
                    <main class="px-8 py-4 bg-main-100">
                        @yield('content')
                    </main>
                </div>                
            </div>
        </div>
    </body>
</html>
