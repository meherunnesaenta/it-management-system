{{-- resources/views/student/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('content')
<div class="space-y-6">
    {{-- হেডার --}}
    <div>
        <h1 class="text-2xl font-bold text-white font-space">Student Dashboard</h1>
        <p class="text-white/40 text-sm mt-1">Track your tickets and payments</p>
    </div>

    {{-- স্ট্যাটস কার্ড --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">My Tickets</p>
                <div class="w-10 h-10 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-white mt-2">{{ $totalTickets ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">Total created</p>
        </div>

        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">Open</p>
                <div class="w-10 h-10 rounded-xl bg-yellow-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-yellow-400 mt-2">{{ $openTickets ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">Waiting for response</p>
        </div>

        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">Resolved</p>
                <div class="w-10 h-10 rounded-xl bg-green-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-green-400 mt-2">{{ $resolvedTickets ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">Completed</p>
        </div>

        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">Total Payments</p>
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-purple-400 mt-2">{{ $totalPayments ?? 0 }} TK</p>
            <p class="text-white/30 text-xs mt-1">Total paid</p>
        </div>
    </div>

    {{-- কুইক অ্যাকশন --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('student.tickets.create') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">New Ticket</p>
        </a>
        <a href="{{ route('student.tickets.index') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">My Tickets</p>
        </a>
        <a href="{{ route('student.payments.create') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">Make Payment</p>
        </a>
        <a href="{{ route('student.payments.create') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-yellow-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">Payment History</p>
        </a>
    </div>

    {{-- চার্ট ও সাম্প্রতিক টিকেট --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- চার্ট --}}
        <div class="lg:col-span-1 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white font-space">Ticket Status</h3>
            </div>
            <div class="h-64">
                <canvas id="ticketChart"></canvas>
            </div>
        </div>

        {{-- সাম্প্রতিক টিকেট --}}
        <div class="lg:col-span-2 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white font-space">Recent Tickets</h3>
                <a href="{{ route('student.tickets.index') }}" class="text-xs text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200">
                    View All →
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Ticket</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Category</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Status</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Priority</th>
                            <th class="text-right text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($recentTickets ?? [] as $ticket)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="py-3">
                                    <a href="{{ route('student.tickets.show', $ticket) }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm">
                                        #{{ $ticket->id }} - {{ Str::limit($ticket->subject, 25) }}
                                    </a>
                                </td>
                                <td class="py-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/5 text-white/70 border border-white/5">
                                        {{ $ticket->category }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    @php
                                        $statusColors = [
                                            'open' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                                            'in-progress' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                                            'resolved' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                            'closed' => 'bg-gray-500/20 text-gray-400 border-gray-500/30',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium border {{ $statusColors[$ticket->status] ?? 'bg-white/5 text-white/70 border-white/5' }}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 
                                            {{ $ticket->status == 'open' ? 'bg-yellow-400' : '' }}
                                            {{ $ticket->status == 'in-progress' ? 'bg-blue-400' : '' }}
                                            {{ $ticket->status == 'resolved' ? 'bg-green-400' : '' }}
                                            {{ $ticket->status == 'closed' ? 'bg-gray-400' : '' }}">
                                        </span>
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    @php
                                        $priorityColors = [
                                            'low' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                            'medium' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                                            'high' => 'bg-orange-500/20 text-orange-400 border-orange-500/30',
                                            'urgent' => 'bg-red-500/20 text-red-400 border-red-500/30',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium border {{ $priorityColors[$ticket->priority] ?? 'bg-white/5 text-white/70 border-white/5' }}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 
                                            {{ $ticket->priority == 'low' ? 'bg-green-400' : '' }}
                                            {{ $ticket->priority == 'medium' ? 'bg-yellow-400' : '' }}
                                            {{ $ticket->priority == 'high' ? 'bg-orange-400' : '' }}
                                            {{ $ticket->priority == 'urgent' ? 'bg-red-400' : '' }}">
                                        </span>
                                        {{ ucfirst($ticket->priority) }}
                                    </span>
                                </td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('student.tickets.show', $ticket) }}" class="inline-flex items-center gap-1 text-sm text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200">
                                        View
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-white/10 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                        </svg>
                                        <p class="text-white/30 text-sm">No tickets created yet</p>
                                        <a href="{{ route('student.tickets.create') }}" class="mt-3 text-xs text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200">
                                            Create your first ticket →
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ticketChart');
    
    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Open', 'In Progress', 'Resolved', 'Closed'],
                datasets: [{
                    data: [
                        {{ $openTickets ?? 0 }},
                        {{ $inProgressTickets ?? 0 }},
                        {{ $resolvedTickets ?? 0 }},
                        {{ $closedTickets ?? 0 }}
                    ],
                    backgroundColor: [
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(148, 163, 184, 0.8)'
                    ],
                    borderColor: [
                        '#fbbf24',
                        '#60a5fa',
                        '#34d399',
                        '#94a3b8'
                    ],
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: 'rgba(255, 255, 255, 0.6)',
                            padding: 12,
                            usePointStyle: true,
                            pointStyleWidth: 8,
                        }
                    }
                },
                cutout: '70%',
            }
        });
    }
});
</script>
@endpush