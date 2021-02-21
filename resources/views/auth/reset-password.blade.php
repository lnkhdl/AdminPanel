@extends('layouts.simple')

@section('content')
    <h3 class="px-6 py-4 text-2xl font-medium text-gray-600 border-b border-gray-200 rounded-t shadow-sm bg-gray-50">Reset password</h3>

    @if (session('status'))
        <div class="mx-6 my-4 font-semibold text-main-500">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="px-6 py-4">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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

        <div class="my-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required autocomplete="new-password" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('password_confirmation') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('password_confirmation')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end my-4">
            <button class="px-4 py-2 text-sm text-white rounded shadow-lg bg-main-600 hover:bg-main-700" type="submit">Reset password</button>
        </div>
    </form>
@endsection