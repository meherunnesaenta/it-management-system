@extends('layouts.app')

@section('title', 'Reports')
@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-white font-space">Reports</h1>
        <p class="text-white/40 text-sm mt-1">Current IT service overview</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ([['Users', $users], ['Tickets', $tickets], ['Open Tickets', $openTickets], ['Equipment', $equipment]] as [$label, $value])
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6"><p class="text-white/40 text-sm">{{ $label }}</p><p class="mt-2 text-3xl font-bold text-white">{{ $value }}</p></div>
        @endforeach
    </div>
</div>
@endsection
