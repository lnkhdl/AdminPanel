@extends('layouts.simple')

@section('content')
    <h3 class="px-6 py-4 text-2xl font-medium text-gray-600 border-b border-gray-200 rounded-t shadow-sm bg-gray-50">Login</h3>

    @if (session('status'))
        <div class="mx-6 my-4 font-semibold text-main-500">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="px-6 py-4">
        @csrf

        <div class="my-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('email') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('email')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('password') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('password')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 mb-4">
            <label for="remember" class="inline-flex items-center">
                <input id="remember" name="remember" type="checkbox" class="w-5 h-5 rounded text-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10" {{ old('remember') ? 'checked' : '' }}>
                <span class="ml-2 text-sm font-medium text-gray-700">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-normal text-main-600 hover:text-main-700">Forgot password?</a>
            @endif
            <button class="px-4 py-2 text-white rounded shadow-lg bg-main-600 hover:bg-main-700" type="submit">Sign in</button>
        </div>
    </form>
@endsection