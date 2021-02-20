<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Admin Panel</title>
    </head>
    <body class="bg-gray-200 antialiase">
        <div class="flex h-screen">
            <main class="m-auto">
                @yield('content')
            </main>
        </div>
    </body>
</html>
