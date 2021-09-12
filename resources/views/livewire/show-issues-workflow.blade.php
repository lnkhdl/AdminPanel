<div>
    <div>
        <select wire:model="byType" class="w-1/6 px-3 py-2 mt-1 leading-tight text-gray-700 border rounded appearance-none focus:border-main-600 focus:ring focus:ring-main-600 focus:ring-opacity-10">
            @foreach ($allTypes as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4 border-b border-gray-200 rounded">
        <table class="min-w-full table-fixed">
            <thead>
                <tr>
                    <td rowspan="2" class="w-1/6 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Current status
                    </td>
                    <td colspan="{{ $selectedType->statuses->count() }}" class="border-b border-l border-gray-100 px-6 py-3 text-center text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                        Next possible statuses
                    </td>
                </tr>
                <tr>
                    @forelse ($selectedType->statuses as $status)
                        <td class="text-center border-b border-l border-gray-100 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                            {{ $status->name }}
                        </td>
                    @empty
                        <tr class="bg-white border-t-2 border-gray-200">
                            <td class="px-6 py-2" colspan="5">No statuses found.</td>
                        </tr>
                    @endforelse
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($selectedType->statuses as $status)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">
                            {{ $status->name }}    
                        </td>
                        @foreach ($selectedType->statuses as $availableStatus)
                            <td class="w-1/6 text-center py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">
                                @foreach ($status->next_possible_statuses as $next)
                                    @if ($availableStatus->name == $next->name)
                                        <span class="text-2xl text-main-600">&#10003;</span>
                                        @break
                                    @endif
                                @endforeach
                            </td>
                        @endforeach     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
