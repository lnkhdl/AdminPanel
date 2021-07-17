@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Users</h3>
    @can('create', Auth::user())
        <div class="my-6">
            <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-500">New User</a>
        </div>    
    @endcan
        

    @if (session('message'))
        <div class="p-3 my-4 text-green-900 bg-green-50 border border-green-900 rounded-md">
            <div>{{ session('message') }}</div>
            @if (session('emailResult'))
                @if (session('emailResult') == 'success')
                    <div>Welcome email has been sent to the user.</div>
                @else
                    <div class='text-red-800'>An error occurred while sending Welcome email to the user.</div>
                @endif
            @endif
        </div>
    @endif

    <div class="mt-4 overflow-hidden border-b border-gray-200 rounded">
        <table class="min-w-full">
            <thead>
                <tr>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">First name</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">Last name</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">Email</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">Role</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700"></td>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->first_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->last_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->roles[0]->name }}</td>

                        <td class="px-6 py-4 text-sm whitespace-no-wrap border-t border-gray-200">
                            <div class="flex justify-center">
                                @can('view', $user)
                                    <a href="{{ route('users.show', $user) }}" class="px-4 py-1 mx-4 text-green-900 border border-green-900 rounded bg-green-50 hover:bg-green-700 hover:text-white">View</a>
                                @endcan
                                
                                @can('update', $user)
                                    <a href="{{ route('users.edit', $user) }}" class="px-4 py-1 mx-4 text-blue-900 border border-blue-900 rounded bg-blue-50 hover:bg-blue-700 hover:text-white">Edit</a>
                                @endcan

                                @can('delete', $user)
                                    <form class="inline-block" action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="px-4 py-1 mx-4 text-red-900 border border-red-900 rounded bg-red-50 hover:bg-red-700 hover:text-white">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-t-2 border-gray-200">
                        <td class="px-6 py-2" colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="my-6 border-none">
        {{ $users->links() }}
    </div>
@endsection