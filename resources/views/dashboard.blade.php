@extends('layouts.main')

@section('content')
    <h3 class="text-2xl font-medium text-gray-700">Dashboard</h3>

    <div class="mt-4 overflow-hidden border-b border-gray-200 rounded">
        <table class="min-w-full">
            <thead>
                <tr>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">Name</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">Username</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">Email</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">Role</td>
                    <td class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50"></td>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test Name</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test Username</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test Email</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test Role</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Edit link - Delete link</td>
                </tr>

                <tr>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test 2 Name</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test 2 Username</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test 2 Email</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Test 2 Role</td>
                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap border-t border-gray-200">Edit link 2 - Delete link 2</td>
                </tr>  
            </tbody>
        </table>
    </div>
@endsection