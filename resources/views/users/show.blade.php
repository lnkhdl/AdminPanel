@extends('layouts.main')

@section('content')
    <div class="my-6">
        <a href="{{ route('users.index') }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-500">Back to Users</a>
    </div>
    
    <div class="mt-6">
        <div class="w-1/5 px-5 py-3 bg-white shadow-lg rounded-xl">
            <div class="py-2 text-2xl">{{ $user->first_name }} {{ $user->last_name }}</div>
            <div>{{ $user->email }}</div>
            <div>{{ $user->roles[0]->name }}</div>
        </div>
    </div>
@endsection