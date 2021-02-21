@extends('layouts.simple')

@section('content')
    <h3 class="px-6 py-4 text-2xl font-medium text-gray-600 border-b border-gray-200 rounded-t shadow-sm bg-gray-50">Register</h3>

    <form method="POST" action="{{ route('register') }}" class="px-6 py-4">
        @csrf

        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
            <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required autocomplete="given-name" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('first_name') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
            
            @error('first_name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
            <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required autocomplete="family-name" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('last_name') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
            
            @error('last_name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('email') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('email')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('password') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('password')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required autocomplete="new-password" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('password_confirmation') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('password_confirmation')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm font-normal text-main-600 hover:text-main-700">Already registered?</a>
            <button class="px-4 py-2 text-white rounded shadow-lg bg-main-600 hover:bg-main-700" type="submit">Sign up</button>
        </div>
    </form>
@endsection