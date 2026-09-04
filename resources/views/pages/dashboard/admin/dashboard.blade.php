{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('content')
<div class="space-y-6">
    {{-- হেডার --}}
    <div>
        <h1 class="text-2xl font-bold text-white font-space">Dashboard</h1>
        <p class="text-white/40 text-sm mt-1">Overview of IT service management</p>
    </div>

    {{-- স্ট্যাটস কার্ড --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">Total Tickets</p>
                <div class="w-10 h-10 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-white mt-2">{{ $totalTickets ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">All time</p>
        </div>

        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center justify-between">
                <p class="text-white/40 text-sm">Open Tickets</p>
                <div class="w-10 h-10 rounded-xl bg-yellow-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-yellow-400 mt-2">{{ $openTickets ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">Needs attention</p>
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
                <p class="text-white/40 text-sm">Total Equipment</p>
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-purple-400 mt-2">{{ $totalEquipments ?? 0 }}</p>
            <p class="text-white/30 text-xs mt-1">In inventory</p>
        </div>
    </div>

    {{-- চার্ট ও টেবিল --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- চার্ট --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white font-space">Ticket Status</h3>
                <span class="text-xs text-white/30">Last 30 days</span>
            </div>
            <div class="h-64">
                <canvas id="ticketChart"></canvas>
            </div>
        </div>

        {{-- সাম্প্রতিক টিকেট --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white font-space">Recent Tickets</h3>
                <a href="{{ route('admin.tickets.index') }}" class="text-xs text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200">
                    View All →
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Subject</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Status</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider pb-3">Priority</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($recentTickets ?? [] as $ticket)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="py-3">
                                    <a href="{{ route('admin.tickets.show', $ticket) }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm">
                                        #{{ $ticket->id }} - {{ Str::limit($ticket->subject, 30) }}
                                    </a>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center">
                                    <p class="text-white/30 text-sm">No recent tickets</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- কুইক অ্যাকশন --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.tickets.create') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">New Ticket</p>
        </a>
        <a href="{{ route('admin.equipments.create') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">Add Equipment</p>
        </a>
        <a href="{{ route('admin.users.index') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">Manage Users</p>
        </a>
        <a href="{{ route('admin.reports') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0-1.5 1.5m1.5-1.5 1.5 1.5m-1.5-1.5v5.25m7.5-5.25v5.25" />
                </svg>
            </div>
            <p class="text-white/70 text-sm font-medium group-hover:text-white transition-colors duration-300">View Reports</p>
        </a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    .stat-card-hover {
        transition: all 0.3s ease;
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
            type: 'bar',
            data: {
                labels: ['Open', 'In Progress', 'Resolved', 'Closed'],
                datasets: [{
                    label: 'Tickets',
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
                    borderRadius: 8,
                    barPercentage: 0.6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.04)',
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.3)',
                            stepSize: 1,
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.3)',
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush