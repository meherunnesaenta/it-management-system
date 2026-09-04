@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="stat bg-primary text-primary-content rounded-xl shadow-lg">
        <div class="stat-title text-primary-content/70">মোট টিকেট</div>
        <div class="stat-value">{{ $totalTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-warning text-warning-content rounded-xl shadow-lg">
        <div class="stat-title text-warning-content/70">ওপেন টিকেট</div>
        <div class="stat-value">{{ $openTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-success text-success-content rounded-xl shadow-lg">
        <div class="stat-title text-success-content/70">রিজলভড</div>
        <div class="stat-value">{{ $resolvedTickets ?? 0 }}</div>
    </div>
    <div class="stat bg-accent text-accent-content rounded-xl shadow-lg">
        <div class="stat-title text-accent-content/70">মোট ইকুইপমেন্ট</div>
        <div class="stat-value">{{ $totalEquipments ?? 0 }}</div>
    </div>
</div>

{{-- চার্ট ও টেবিল --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">টিকেট স্ট্যাটাস</h2>
            <canvas id="ticketChart" height="200"></canvas>
        </div>
    </div>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">সাম্প্রতিক টিকেট</h2>
            <div class="overflow-x-auto">
                <table class="table table-sm">
                    <thead><tr><th>বিষয়</th><th>স্ট্যাটাস</th><th>প্রায়োরিটি</th></tr></thead>
                    <tbody>
                        @foreach($recentTickets ?? [] as $ticket)
                        <tr>
                            <td>{{ $ticket->subject }}</td>
                            <td><span class="badge badge-{{ $ticket->status == 'open' ? 'warning' : 'success' }}">{{ $ticket->status }}</span></td>
                            <td><span class="badge badge-{{ $ticket->priority == 'urgent' ? 'error' : 'info' }}">{{ $ticket->priority }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ticketChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Open', 'Assigned', 'In Progress', 'Resolved'],
            datasets: [{
                label: 'টিকেট সংখ্যা',
                data: [12, 8, 5, 20],
                backgroundColor: ['#f59e0b', '#3b82f6', '#8b5cf6', '#10b981']
            }]
        }
    });
});
</script>
@endpush
