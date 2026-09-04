{{-- resources/views/student/tickets/show.blade.php --}}

@extends('layouts.app')

@section('title', 'Ticket #' . $ticket->id)
@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    {{-- ব্যাক বাটন --}}
    <a href="{{ route('student.tickets.index') }}" class="inline-flex items-center gap-2 text-white/40 hover:text-white transition-colors duration-200">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Back to My Tickets
    </a>

    {{-- হেডার --}}
    <div class="relative">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#FF6B35]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#FF8F65]/10 rounded-full blur-3xl"></div>
        
        <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 rounded-2xl flex-shrink-0">
                        <svg class="w-7 h-7 text-[#FF8F65]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-3 flex-wrap">
                            <h1 class="text-2xl font-bold text-white font-space">#{{ $ticket->id }} - {{ $ticket->subject }}</h1>
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
                        </div>
                        <p class="text-white/40 text-sm mt-1">
                            Created {{ $ticket->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                
                {{-- অ্যাকশন বাটন --}}
                <div class="flex items-center gap-2 flex-wrap">
                    @if($ticket->status == 'open' || $ticket->status == 'in-progress')
                        <form method="POST" action="{{ route('student.tickets.close', $ticket) }}" class="inline" onsubmit="return confirm('Are you sure you want to close this ticket?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 text-red-400 border border-red-500/30 rounded-xl text-sm font-medium transition-all duration-200">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Close Ticket
                                </span>
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('student.tickets.index') }}" class="px-4 py-2 bg-white/5 hover:bg-white/10 text-white/60 hover:text-white border border-white/10 rounded-xl text-sm font-medium transition-all duration-200">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            All Tickets
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- টিকেট তথ্য --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-xs uppercase tracking-wider">Category</p>
            <p class="text-white font-medium mt-1">{{ $ticket->category }}</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-xs uppercase tracking-wider">Priority</p>
            @php
                $priorityColors = [
                    'low' => 'text-green-400',
                    'medium' => 'text-yellow-400',
                    'high' => 'text-orange-400',
                    'urgent' => 'text-red-400',
                ];
            @endphp
            <p class="font-medium mt-1 {{ $priorityColors[$ticket->priority] ?? 'text-white' }}">
                {{ ucfirst($ticket->priority) }}
            </p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
            <p class="text-white/40 text-xs uppercase tracking-wider">Assigned To</p>
            <p class="text-white font-medium mt-1">{{ $ticket->assignedTo?->name ?? 'Not assigned yet' }}</p>
        </div>
    </div>

    {{-- বিবরণ --}}
    <div class="relative">
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
            <h3 class="text-lg font-semibold text-white mb-4 font-space">Description</h3>
            <div class="prose prose-invert max-w-none">
                <p class="text-white/70 leading-relaxed whitespace-pre-wrap">{{ $ticket->description }}</p>
            </div>
            
            @if($ticket->attachment)
                <div class="mt-4 pt-4 border-t border-white/5">
                    <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank" class="inline-flex items-center gap-2 text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>
                        View Attachment
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- রেসপন্স সেকশন --}}
    <div class="relative">
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
            <h3 class="text-lg font-semibold text-white mb-6 font-space flex items-center gap-3">
                <svg class="w-5 h-5 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                Responses
                <span class="text-sm font-normal text-white/40">({{ $ticket->responses->count() }})</span>
            </h3>

            {{-- রেসপন্স লিস্ট --}}
            <div class="space-y-4 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                @forelse($ticket->responses as $response)
                    <div class="bg-white/5 border border-white/5 rounded-xl p-4 {{ $response->user_id === auth()->id() ? 'border-[#FF6B35]/30 bg-[#FF6B35]/5' : '' }}">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 flex items-center justify-center text-xs font-bold text-[#FF8F65]">
                                    {{ substr($response->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $response->user->name ?? 'Unknown' }}</p>
                                    <p class="text-white/30 text-xs">{{ $response->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @if($response->user_id === auth()->id())
                                <span class="text-xs text-[#FF6B35] bg-[#FF6B35]/10 px-2 py-0.5 rounded-lg">You</span>
                            @endif
                            @if($response->user_id !== auth()->id() && $response->user->hasRole('it-staff'))
                                <span class="text-xs text-blue-400 bg-blue-500/10 px-2 py-0.5 rounded-lg">Staff</span>
                            @endif
                        </div>
                        <p class="text-white/70 text-sm mt-3 leading-relaxed">{{ $response->message }}</p>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-white/10 mx-auto mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <p class="text-white/40">No responses yet.</p>
                        <p class="text-white/20 text-sm">Check back later for updates</p>
                    </div>
                @endforelse
            </div>

            {{-- নতুন রেসপন্স ফর্ম (স্টুডেন্টরা শুধু দেখতে পারে) --}}
            @if($ticket->status != 'closed' && $ticket->status != 'resolved')
                <div class="mt-6 pt-6 border-t border-white/5">
                    <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                        <div class="flex items-center gap-3 text-white/40 text-sm">
                            <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <p>Responses can only be added by IT Staff. You'll be notified when there's an update.</p>
                        </div>
                    </div>
                </div>
            @elseif($ticket->status == 'resolved')
                <div class="mt-6 pt-6 border-t border-white/5">
                    <div class="bg-green-500/10 border border-green-500/20 rounded-xl p-4">
                        <div class="flex items-center gap-3 text-green-400 text-sm">
                            <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>This ticket has been resolved. Thank you for using GUB IT Service!</p>
                        </div>
                    </div>
                </div>
            @elseif($ticket->status == 'closed')
                <div class="mt-6 pt-6 border-t border-white/5">
                    <div class="bg-gray-500/10 border border-gray-500/20 rounded-xl p-4">
                        <div class="flex items-center gap-3 text-gray-400 text-sm">
                            <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <p>This ticket is closed. No further actions can be taken.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 2px;
    }
</style>
@endpush