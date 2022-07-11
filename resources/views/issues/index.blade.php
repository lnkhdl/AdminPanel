@extends('layouts.main')

@section('content')
    @if ($range === 'my_reported')
        <h3 class="text-2xl font-medium text-gray-700">My reported issues</h3>
    @elseif ($range === 'my_assigned')
        <h3 class="text-2xl font-medium text-gray-700">My assigned issues</h3>
    @else
        <h3 class="text-2xl font-medium text-gray-700">Issues</h3>
    @endif
    
    <livewire:show-issues :range="$range"/>

@endsection