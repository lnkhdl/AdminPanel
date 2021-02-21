<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Admin Panel</title>
    </head>
    <body class="bg-main-100 antialiase">
        <div class="grid min-h-screen place-items-center">
            <main class="w-1/4 bg-white border border-gray-200 rounded shadow-lg">
                @yield('content')
            </main>
        </div>
    </body>
</html>
