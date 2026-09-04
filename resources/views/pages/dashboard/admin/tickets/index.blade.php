{{-- resources/views/admin/tickets/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Manage Tickets')
@section('content')
<div class="space-y-6">
    {{-- হেডার ও অ্যাকশন --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white font-space">Ticket Management</h1>
            <p class="text-white/40 text-sm mt-1">View and manage all support tickets</p>
        </div>
        <a href="{{ route('admin.tickets.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Create Ticket
        </a>
    </div>

    {{-- স্ট্যাটস --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Total</p>
            <p class="text-2xl font-bold text-white">{{ $tickets->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Open</p>
            <p class="text-2xl font-bold text-yellow-400">{{ $tickets->where('status', 'open')->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">In Progress</p>
            <p class="text-2xl font-bold text-blue-400">{{ $tickets->where('status', 'in-progress')->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Resolved</p>
            <p class="text-2xl font-bold text-green-400">{{ $tickets->where('status', 'resolved')->count() }}</p>
        </div>
    </div>

    {{-- সার্চ ও ফিল্টার --}}
    <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <input 
                type="text" 
                id="searchTickets" 
                placeholder="Search tickets by subject, ID, or user..." 
                class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
            />
        </div>
        <div class="flex gap-2 flex-wrap">
            <select id="filterStatus" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none">
                <option value="" class="bg-[#1A1A2E]">All Status</option>
                <option value="open" class="bg-[#1A1A2E]">Open</option>
                <option value="in-progress" class="bg-[#1A1A2E]">In Progress</option>
                <option value="resolved" class="bg-[#1A1A2E]">Resolved</option>
                <option value="closed" class="bg-[#1A1A2E]">Closed</option>
            </select>
            <select id="filterPriority" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none">
                <option value="" class="bg-[#1A1A2E]">All Priority</option>
                <option value="low" class="bg-[#1A1A2E]">Low</option>
                <option value="medium" class="bg-[#1A1A2E]">Medium</option>
                <option value="high" class="bg-[#1A1A2E]">High</option>
                <option value="urgent" class="bg-[#1A1A2E]">Urgent</option>
            </select>
            <select id="filterCategory" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none">
                <option value="" class="bg-[#1A1A2E]">All Categories</option>
                <option value="Hardware" class="bg-[#1A1A2E]">Hardware</option>
                <option value="Software" class="bg-[#1A1A2E]">Software</option>
                <option value="Network" class="bg-[#1A1A2E]">Network</option>
                <option value="CCTV" class="bg-[#1A1A2E]">CCTV</option>
                <option value="POS" class="bg-[#1A1A2E]">POS</option>
                <option value="Lab" class="bg-[#1A1A2E]">Lab</option>
            </select>
        </div>
    </div>

    {{-- টেবিল --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white/5">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Ticket</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Priority</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Assigned To</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-white/40 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5" id="ticketTableBody">
                    @forelse($tickets as $ticket)
                        <tr class="hover:bg-white/5 transition-colors duration-200" 
                            data-status="{{ $ticket->status }}" 
                            data-priority="{{ $ticket->priority }}"
                            data-category="{{ $ticket->category }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#FF8F65]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">#{{ $ticket->id }} - {{ $ticket->subject }}</p>
                                        <p class="text-white/30 text-xs">by {{ $ticket->user?->name ?? 'Unknown' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/5 text-white/70 border border-white/5">
                                    {{ $ticket->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
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
                            <td class="px-6 py-4">
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
                            <td class="px-6 py-4 text-white/60 text-sm">
                                {{ $ticket->assignedTo?->name ?? 'Unassigned' }}
                            </td>
                            <td class="px-6 py-4 text-white/40 text-sm">
                                {{ $ticket->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.tickets.show', $ticket) }}" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-200" title="View">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.tickets.edit', $ticket) }}" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-200" title="Edit">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.tickets.destroy', $ticket) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-400/30 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all duration-200" title="Delete">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-white/10 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                    </svg>
                                    <p class="text-white/40 text-lg">No tickets found</p>
                                    <p class="text-white/20 text-sm mt-1">Start by creating your first ticket</p>
                                    <a href="{{ route('admin.tickets.create') }}" class="mt-4 inline-flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 transition-all duration-300">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Create Ticket
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- পেজিনেশন --}}
        @if(method_exists($tickets, 'links'))
            <div class="px-6 py-4 border-t border-white/5">
                {{ $tickets->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    select option {
        background: #1A1A2E;
        color: #fff;
    }
    
    /* পেজিনেশন স্টাইল */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }
    .pagination .page-item .page-link {
        padding: 0.5rem 0.75rem;
        border-radius: 0.5rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.5);
        transition: all 0.2s ease;
    }
    .pagination .page-item.active .page-link {
        background: #FF6B35;
        border-color: #FF6B35;
        color: #fff;
    }
    .pagination .page-item .page-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchTickets');
        const statusFilter = document.getElementById('filterStatus');
        const priorityFilter = document.getElementById('filterPriority');
        const categoryFilter = document.getElementById('filterCategory');
        const rows = document.querySelectorAll('#ticketTableBody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const priorityValue = priorityFilter.value;
            const categoryValue = categoryFilter.value;

            rows.forEach(row => {
                const subject = row.querySelector('td:first-child .text-white')?.textContent?.toLowerCase() || '';
                const id = row.querySelector('td:first-child .text-white')?.textContent?.match(/#(\d+)/)?.[1] || '';
                const user = row.querySelector('td:first-child .text-white/30')?.textContent?.toLowerCase() || '';
                const rowStatus = row.dataset.status || '';
                const rowPriority = row.dataset.priority || '';
                const rowCategory = row.dataset.category || '';

                const matchesSearch = subject.includes(searchTerm) || id.includes(searchTerm) || user.includes(searchTerm);
                const matchesStatus = !statusValue || rowStatus === statusValue;
                const matchesPriority = !priorityValue || rowPriority === priorityValue;
                const matchesCategory = !categoryValue || rowCategory === categoryValue;

                row.style.display = (matchesSearch && matchesStatus && matchesPriority && matchesCategory) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        priorityFilter.addEventListener('change', filterTable);
        categoryFilter.addEventListener('change', filterTable);
    });
</script>
@endpush