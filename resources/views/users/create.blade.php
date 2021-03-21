@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Create a new user</h3>

    <div class="my-6">
        <a href="{{ route('users.index') }}" class="px-4 py-2 text-white rounded bg-main-600 hover:bg-main-500">Back to Users</a>
    </div>

    <div class="mt-4">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" autocomplete="given-name" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('first_name') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
                
                @error('first_name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" autocomplete="family-name" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('last_name') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
                
                @error('last_name')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="my-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="text" value="{{ old('email') }}" autocomplete="email" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('email') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
            
                @error('email')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role_id" id="role_id" class="block w-full px-3 py-2 mt-1 leading-tight text-gray-700 border @error('role_id') border-red-500 @enderror rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
                    <option selected="selected" disabled="disabled">Select a role</option>
                    @foreach ($roles as $key => $value)
                        <option value="{{ $key }}" {{ old('role_id') == $key ? "selected" : "" }}>{{ $value }}</option>
                    @endforeach
                </select>

                @error('role_id')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button class="px-4 py-2 text-white bg-green-600 rounded shadow-lg hover:bg-green-500" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection