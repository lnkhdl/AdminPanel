@extends('layouts.main')

@section('content')
    <div class="my-6">
        <a href="{{ route('users.index') }}" class="px-4 py-2 text-white rounded bg-main-600 hover:bg-main-500">Back to Users</a>
    </div>
    
    <div class="mt-6">
        <div class="w-1/4 px-5 py-3 bg-white shadow-lg rounded-xl">
            <div class="py-2 text-2xl">{{ $user->first_name }} {{ $user->last_name }}</div>
            <div>Email: {{ $user->email }}</div>
            <div>Role: {{ $user->roles[0]->name }}</div>
            <div>Last login: {{ $user->last_login_at ?: 'not login yet'}}</div>
        </div>
    </div>
@endsection