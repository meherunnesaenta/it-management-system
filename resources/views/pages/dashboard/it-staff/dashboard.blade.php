@extends('layouts.app')

@section('title', 'IT Staff Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="stat bg-primary text-primary-content rounded-xl shadow-lg">
        <div class="stat-title">অ্যাসাইনড টিকেট</div>
        <div class="stat-value">{{ $totalTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-warning text-warning-content rounded-xl shadow-lg">
        <div class="stat-title">ওপেন</div>
        <div class="stat-value">{{ $openTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-success text-success-content rounded-xl shadow-lg">
        <div class="stat-title">রিজলভড</div>
        <div class="stat-value">{{ $resolvedTickets ?? 0 }}</div>
    </div>
</div>

<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">টিকেট তালিকা</h2>
        <p class="text-sm">টিকেট লিস্ট এখানে দেখানো হবে (ডামি)।</p>
    </div>
</div>
@endsection
