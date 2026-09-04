@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="stat bg-primary text-primary-content rounded-xl shadow-lg">
        <div class="stat-title">আমার টিকেট</div>
        <div class="stat-value">{{ $totalTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-warning text-warning-content rounded-xl shadow-lg">
        <div class="stat-title">ওপেন টিকেট</div>
        <div class="stat-value">{{ $openTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-success text-success-content rounded-xl shadow-lg">
        <div class="stat-title">রিজলভড</div>
        <div class="stat-value">{{ $resolvedTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-accent text-accent-content rounded-xl shadow-lg">
        <div class="stat-title">মোট পেমেন্ট</div>
        <div class="stat-value">{{ $totalPayments ?? 0 }} TK</div>
    </div>
</div>

{{-- নিউ টিকেট বাটন --}}
<div class="flex justify-end mb-4">
    <a href="{{ route('student.tickets.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> নতুন টিকেট
    </a>
</div>

{{-- সাম্প্রতিক টিকেট --}}
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">সাম্প্রতিক টিকেট</h2>
        <div class="overflow-x-auto">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>বিষয়</th>
                        <th>ক্যাটাগরি</th>
                        <th>স্ট্যাটাস</th>
                        <th>প্রায়োরিটি</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 3; $i++)
                    <tr>
                        <td>প্রিন্টার কাজ করছে না</td>
                        <td><span class="badge">Hardware</span></td>
                        <td><span class="badge badge-warning">Open</span></td>
                        <td><span class="badge badge-error">Urgent</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">দেখুন</a></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
