<div>
    <div class="grid grid-cols-4 gap-x-6 gap-y-10 my-6">
        <div class="col-span-4">
            <a href="{{ route('issues.create') }}" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-500">New Issue</a>
        </div>
        <div class="col-span-2">
            <label for="search" class="block font-medium text-gray-700">Search by Issue name</label>
            <input wire:model.debounce.300ms="search" type="text" class="block min-w-full px-3 py-2 mt-1 leading-tight text-gray-700 border rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
        </div>
        <div class="col-span-1">
            <label for="type_id" class="block font-medium text-gray-700">Filter by Type</label>
            <select wire:model="byType" name="type_name" id="type_name" class="block min-w-full px-3 py-2 mt-1 leading-tight text-gray-700 border rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
                <option selected="selected" value="">All Types</option>
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-1">
            <label for="status_id" class="block font-medium text-gray-700">Filter by Status</label>
            <select wire:model="byStatus" name="status_name" id="status_name" class="block min-w-full px-3 py-2 mt-1 leading-tight text-gray-700 border rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
                <option selected="selected" value="">All Statuses</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (session('message'))
        <div class="p-3 my-4 text-green-900 bg-green-50 border border-green-900 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="mt-4 border-b border-gray-200 rounded">
        <table class="min-w-full table-fixed">
            <thead>
                <tr>
                    <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Type
                    </th>
                    <th class="w-3/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Name
                    </th>
                    <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Status
                    </th>
                    @if ($range != 'my_assigned')
                        <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                            Assignee
                        </th>
                    @endif
                    @if ($range != 'my_reported')
                    <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Reporter
                    </th>
                    @endif
                    <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Created
                    </th>
                    <th class="w-1/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Updated
                    </th>
                    <th class="w-3/12 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($issues as $issue)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->type }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->name }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->status }}</td>
                        @if ($range != 'my_assigned')
                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->assignee_first_name }} {{ $issue->assignee_last_name }}</td>
                        @endif
                        @if ($range != 'my_reported')
                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->reporter_first_name }} {{ $issue->reporter_last_name }}</td>
                        @endif
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->created_at }}</td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">{{ $issue->updated_at }}</td>

                        <td class="px-6 py-4 text-sm border-t border-gray-200">
                            <div class="flex justify-center">
                                    <a href="{{ route('issues.show', $issue) }}" class="px-4 py-1 mx-4 text-green-900 border border-green-900 rounded bg-green-50 hover:bg-green-700 hover:text-white">View</a>
                                    <a href="{{ route('issues.edit', $issue) }}" class="px-4 py-1 mx-4 text-blue-900 border border-blue-900 rounded bg-blue-50 hover:bg-blue-700 hover:text-white">Edit</a>
                                    <form class="inline-block" action="{{ route('issues.destroy', $issue) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="px-4 py-1 mx-4 text-red-900 border border-red-900 rounded bg-red-50 hover:bg-red-700 hover:text-white">Delete</button>
                                    </form>                                    
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-t-2 border-gray-200">
                        <td class="px-6 py-2" colspan="8">No issues found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if (count($issues))
        <div class="my-6 border-none">
            {{ $issues->links() }}
        </div>
    @endif
</div>