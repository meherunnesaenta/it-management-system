{{-- resources/views/admin/equipments/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Equipment Management')
@section('content')
<div class="space-y-6">
    {{-- হেডার ও অ্যাকশন --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white font-space">Equipment Management</h1>
            <p class="text-white/40 text-sm mt-1">Manage all IT equipment inventory</p>
        </div>
        <a href="{{ route('admin.equipments.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Equipment
        </a>
    </div>

    {{-- স্ট্যাটস --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Total</p>
            <p class="text-2xl font-bold text-white">{{ $equipments->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Available</p>
            <p class="text-2xl font-bold text-green-400">{{ $equipments->where('status', 'available')->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Assigned</p>
            <p class="text-2xl font-bold text-blue-400">{{ $equipments->where('status', 'in-use')->count() }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-sm">Maintenance</p>
            <p class="text-2xl font-bold text-yellow-400">{{ $equipments->where('status', 'maintenance')->count() }}</p>
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
                id="searchEquipment" 
                placeholder="Search equipment by name, model, or serial..." 
                class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
            />
        </div>
        <div class="flex gap-2">
            <select id="filterStatus" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none">
                <option value="" class="bg-[#1A1A2E]">All Status</option>
                <option value="available" class="bg-[#1A1A2E]">Available</option>
                <option value="in-use" class="bg-[#1A1A2E]">In Use</option>
                <option value="maintenance" class="bg-[#1A1A2E]">Maintenance</option>
                <option value="retired" class="bg-[#1A1A2E]">Retired</option>
            </select>
            <select id="filterCategory" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none">
                <option value="" class="bg-[#1A1A2E]">All Categories</option>
                <option value="Computer" class="bg-[#1A1A2E]">Computer</option>
                <option value="Printer" class="bg-[#1A1A2E]">Printer</option>
                <option value="Projector" class="bg-[#1A1A2E]">Projector</option>
                <option value="CCTV" class="bg-[#1A1A2E]">CCTV</option>
                <option value="POS" class="bg-[#1A1A2E]">POS</option>
                <option value="Network" class="bg-[#1A1A2E]">Network</option>
            </select>
        </div>
    </div>

    {{-- টেবিল --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white/5">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Equipment</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Model</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Serial</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white/40 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-white/40 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5" id="equipmentTableBody">
                    @forelse($equipments as $equipment)
                        <tr class="hover:bg-white/5 transition-colors duration-200" data-status="{{ $equipment->status }}" data-category="{{ $equipment->category }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#FF8F65]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $equipment->name }}</p>
                                        <p class="text-white/30 text-xs">{{ $equipment->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-white/70 text-sm">{{ $equipment->model }}</td>
                            <td class="px-6 py-4 text-white/50 text-sm font-mono">{{ $equipment->serial_no }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/5 text-white/70 border border-white/5">
                                    {{ $equipment->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-white/60 text-sm">{{ $equipment->location }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'available' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                        'in-use' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                                        'maintenance' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                                        'retired' => 'bg-red-500/20 text-red-400 border-red-500/30',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium border {{ $statusColors[$equipment->status] ?? 'bg-white/5 text-white/70 border-white/5' }}">
                                    <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $equipment->status == 'available' ? 'bg-green-400' : ($equipment->status == 'in-use' ? 'bg-blue-400' : ($equipment->status == 'maintenance' ? 'bg-yellow-400' : 'bg-red-400')) }}"></span>
                                    {{ ucfirst($equipment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.equipments.edit', $equipment) }}" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-200" title="Edit">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.equipments.destroy', $equipment) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this equipment?');">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                                    </svg>
                                    <p class="text-white/40 text-lg">No equipment found</p>
                                    <p class="text-white/20 text-sm mt-1">Start by adding your first equipment</p>
                                    <a href="{{ route('admin.equipments.create') }}" class="mt-4 inline-flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 transition-all duration-300">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Add Equipment
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- পেজিনেশন --}}
        @if(method_exists($equipments, 'links'))
            <div class="px-6 py-4 border-t border-white/5">
                {{ $equipments->links() }}
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
        const searchInput = document.getElementById('searchEquipment');
        const statusFilter = document.getElementById('filterStatus');
        const categoryFilter = document.getElementById('filterCategory');
        const rows = document.querySelectorAll('#equipmentTableBody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const categoryValue = categoryFilter.value;

            rows.forEach(row => {
                const name = row.querySelector('td:first-child .text-white')?.textContent?.toLowerCase() || '';
                const model = row.querySelector('td:nth-child(2)')?.textContent?.toLowerCase() || '';
                const serial = row.querySelector('td:nth-child(3)')?.textContent?.toLowerCase() || '';
                const rowStatus = row.dataset.status || '';
                const rowCategory = row.dataset.category || '';

                const matchesSearch = name.includes(searchTerm) || model.includes(searchTerm) || serial.includes(searchTerm);
                const matchesStatus = !statusValue || rowStatus === statusValue;
                const matchesCategory = !categoryValue || rowCategory === categoryValue;

                row.style.display = (matchesSearch && matchesStatus && matchesCategory) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        categoryFilter.addEventListener('change', filterTable);
    });
</script>
@endpush