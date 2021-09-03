<div>
    <div class="inline-block">
        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
        <select wire:model="byRole" name="role_id" id="role_id" class="block w-full mr-5 px-3 py-2 mt-1 leading-tight text-gray-700 border rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
            <option selected="selected" value="">All Roles</option>
            @foreach ($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>
    </div>
        <label for="">Search</label>
        <input wire:model.debounce.150ms="search" type="text">
    <div>

    </div>

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
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        <a
                            wire:click.prevent="setSortBy('first_name')" href="#">
                            <div class="flex flex-row">
                                <span>First name</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'first_name' && $sortOrder === 'asc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'first_name' && $sortOrder === 'desc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>                          
                            </div> 
                        </a>
                    </td>

                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        <a
                            wire:click.prevent="setSortBy('last_name')" href="#">
                            <div class="flex flex-row">
                                <span>Last name</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'last_name' && $sortOrder === 'asc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'last_name' && $sortOrder === 'desc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>                          
                            </div> 
                        </a>
                    </td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        <a 
                            wire:click.prevent="setSortBy('email')" href="#">
                            <div class="flex flex-row">
                                <span>Email</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'email' && $sortOrder === 'asc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'email' && $sortOrder === 'desc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>                          
                            </div> 
                        </a>
                    </td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        <a 
                            wire:click.prevent="setSortBy('role_name')" href="#">
                            <div class="flex flex-row">
                                <span>Role</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'role_name' && $sortOrder === 'asc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white {{ $sortByColumn ===  'role_name' && $sortOrder === 'desc' ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>                          
                            </div> 
                        </a>
                    </td>
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
</div>
