@extends('layouts.simple')

@section('content')
    <h3 class="px-6 py-4 text-2xl font-medium text-gray-600 border-b border-gray-200 rounded-t shadow-sm bg-gray-50">Reset password</h3>

    @if (session('status'))
        <div class="mx-6 my-4 font-semibold text-main-500">
            {{ session('status') }}
        </div>
    @endif

    <p class="mx-6 mt-3 mb-2">Send email with password reset link</p>

    <form method="POST" action="{{ route('password.email') }}" class="px-6 py-2">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('email') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        
            @error('email')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end my-4">
            <button class="px-4 py-2 text-sm text-white rounded shadow-lg bg-main-600 hover:bg-main-700" type="submit">Send</button>
        </div>
    </form>
@endsection