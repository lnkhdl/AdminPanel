@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Roles and their permissions</h3>       

    <div class="mt-4 overflow-hidden border-b border-gray-200 rounded">
        <table class="min-w-full table-fixed">
            <thead>
                <tr>
                    <td rowspan="2" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">Permissions</td>
                    <td colspan="4" class="border-b border-l border-gray-100 px-6 py-3 text-center text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">Roles</td>
                </tr>
                <tr>
                    @foreach ($roles as $role)
                        <td class="text-center border-b border-l border-gray-100 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white uppercase bg-gray-700">{{ $role->name }}</td>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($permissions as $permission)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">
                            <div class="flex flex-col">
                                <div class="font-medium">{{ $permission->name }}</div>
                                <div>{{ $permission->description }}</div>
                            </div>
                        </td>

                        @for ($i = 0; $i < count($roles); $i++)
                            <td class="w-1/6 text-center py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">
                                @foreach ($roles[$i]->permissions as $rolePermission)
                                    @if ($permission->name == $rolePermission->name)
                                        <span class="text-2xl text-main-600">&#10003;</span>
                                        @break
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @empty
                    <tr class="bg-white border-t-2 border-gray-200">
                        <td class="px-6 py-2" colspan="5">No permissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection