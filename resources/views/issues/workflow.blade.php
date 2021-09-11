@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Workflow of Issues</h3>
    
        @foreach ($types as $type)
        <div class="mt-4 border-b border-gray-200 rounded">
            <table class="min-w-full table-fixed">
                <thead>
                    <tr>
                        <td rowspan="2" class="w-1/6 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                            Current status
                        </td>
                        <td colspan="{{ $type->statuses->count() }}" class="border-b border-l border-gray-100 px-6 py-3 text-center text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                            Next possible status
                        </td>
                    </tr>
                    <tr>
                        @foreach ($type->statuses as $status)
                            <td class="text-center border-b border-l border-gray-100 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">
                                {{ $status->name }}
                            </td>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($type->statuses as $status)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">
                                {{ $status->name }}    
                            </td>
                            @foreach ($type->statuses as $availableStatus)
                                <td class="w-1/6 text-center py-4 text-sm font-medium leading-5 text-gray-900 border-t border-gray-200">
                                    @foreach ($status->getNextPossibleStatuses() as $next)
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
    @endforeach
@endsection