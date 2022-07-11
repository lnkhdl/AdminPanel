<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>{{ config('app.name') }}</title>
        @livewireStyles
    </head>
    <body class="bg-gray-200 antialiase">
        <div class="flex min-h-screen">
            <div class="relative w-56 min-w-56 flex-none bg-gray-700 shadow-2xl text-gray-50">
                <nav class="">
                    <div class="px-4 py-3 mb-4 text-2xl text-center shadow-lg">{{ config('app.name') }}</div>
                    <ul>
                        <li class="block {{ Request::routeIs('dashboard') ? 'bg-gray-800' : '' }}">
                            <a class="block px-4 py-3" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @can('view', Auth::user())
                            <li class="block {{ Request::routeIs('users.index') ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endcan
                        @if (auth()->user()->isAdmin())
                            <li class="block {{ Request::routeIs('permissions.index') ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('permissions.index') }}">Permissions</a>
                            </li>
                        @endif
                        @if (auth()->user()->isAdmin())
                            <li class="block {{ Request::routeIs('issues.workflow') ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('issues.workflow') }}">Issues Workflow</a>
                            </li>
                        @endif
                        @can('viewAny', App\Models\Issue\Issue::class)
                            <li class="block {{ Request::routeIs('issues.index') && Request()->range == 'all' ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('issues.index', ['range' => 'all']) }}">All Issues</a>
                            </li>
                        @endcan
                        @can('viewMy', App\Models\Issues\Issue::class)
                            <li class="block {{ Request::routeIs('issues.index') && Request()->range == 'my_reported' ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('issues.index', ['range' => 'my_reported']) }}">My Reported Issues</a>
                            </li>
                            <li class="block {{ Request::routeIs('issues.index') && Request()->range == 'my_assigned' ? 'bg-gray-800' : '' }}">
                                <a class="block px-4 py-3" href="{{ route('issues.index', ['range' => 'my_assigned']) }}">My Assigned Issues</a>
                            </li>
                        @endcan
                    </ul>
                </nav>
                <footer class="absolute bottom-0 py-4 text-xs left-16">
                    <span>2022 © LNKHDL</span>
                </footer>
            </div>

            <div class="flex-grow bg-main-100">
                <div>
                    <div class="flex justify-end px-8 py-4 bg-white border-b-2">
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

        @livewireScripts
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        
    </body>
</html>
