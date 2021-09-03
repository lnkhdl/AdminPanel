@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Users</h3>
    @can('create', Auth::user())
        <div class="my-6">
            <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-500">New User</a>
        </div>    
    @endcan

    <livewire:show-users />

    <div class="my-6 border-none">
        {{ $users->links() }}
    </div>
@endsection