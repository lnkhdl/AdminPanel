@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Users</h3>

    <div class="mt-4 overflow-hidden border-b border-gray-200 rounded">
        <table class="min-w-full">
            <thead>
                <tr>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase bg-gray-50">First name</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase bg-gray-50">Last name</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase bg-gray-50">Email</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase bg-gray-50">Role</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase bg-gray-50"></td>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->first_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->last_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">{{ $user->roles[0]->name }}</td>

                        <td class="flex justify-center px-6 py-4 text-sm whitespace-no-wrap border-t border-gray-200">
                            <a href="{{ route('users.edit', $user) }}" class="px-4 py-1 mx-4 text-white bg-blue-900 rounded hover:bg-blue-700">Edit</a>

                            <form class="inline-block" action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="px-4 py-1 mx-4 text-white bg-red-900 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-t-2 border-gray-200">
                        <td class="px-8 py-2" colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="my-6 border-none">
        {{ $users->links() }}
    </div>
@endsection