{{-- resources/views/pages/home.blade.php --}}

@extends('layouts.app')

@section('title', 'Home - GUB IT Service')
@section('content')
<div class="relative min-h-[90vh] flex items-center justify-center overflow-hidden">
    {{-- অ্যানিমেটেড ব্যাকগ্রাউন্ড --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0A0A0F] via-[#1A1A2E] to-[#0A0A0F]"></div>
        <div class="absolute top-20 left-10 w-96 h-96 bg-[#FF6B35]/20 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#FF8F65]/15 rounded-full blur-3xl animate-float-slow-delay"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#FF6B35]/5 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute inset-0 opacity-[0.03] bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC40Ij48cGF0aCBkPSJNMzYgMzR2LTRoNHY0aC00em0wIDB2LTRoLTR2NGg0eiIvPjwvZz48L2c+PC9zdmc+')]"></div>
    </div>

    {{-- কন্টেন্ট --}}
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        {{-- ব্যাজ --}}
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/5 border border-white/10 rounded-full text-xs text-white/40 mb-6 animate-fade-in">
            <span class="w-1.5 h-1.5 rounded-full bg-[#FF6B35] animate-pulse"></span>
            Green University of Bangladesh
        </div>

        {{-- হেডিং --}}
        <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-[1.05] tracking-tight animate-fade-in-up">
            IT Service
            <br />
            <span class="bg-gradient-to-r from-[#FF6B35] via-[#FF8F65] to-[#FF6B35] bg-clip-text text-transparent animate-gradient">
                Management
            </span>
        </h1>

        {{-- সাবটাইটেল --}}
        <p class="text-lg sm:text-xl text-white/50 max-w-2xl mx-auto mt-6 leading-relaxed animate-fade-in-up-delay">
            Complete IT support and asset management platform for 
            <span class="text-white/70">Green University of Bangladesh</span>.
            Streamline tickets, equipment, and payments.
        </p>

        {{-- সার্ভিস প্রগ্রেস কার্ড --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-4xl mx-auto mt-8 text-left animate-fade-in-up-delay-2">
            {{-- Ticket Progress Card --}}
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition-all duration-300 group">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-white/35 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#FF6B35]"></span>
                            Ticket Resolution
                        </p>
                        <h2 class="mt-2 text-xl font-semibold text-white">
                            {{ $resolvedTickets ?? 0 }} <span class="text-white/40 text-sm font-normal">of {{ $totalTickets ?? 0 }} resolved</span>
                        </h2>
                    </div>
                    <span class="text-2xl font-bold text-[#FF8F65] group-hover:scale-110 transition-transform duration-300">
                        {{ $ticketProgress ?? 0 }}%
                    </span>
                </div>
                <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/10" 
                     role="progressbar" 
                     aria-valuenow="{{ $ticketProgress ?? 0 }}" 
                     aria-valuemin="0" 
                     aria-valuemax="100" 
                     aria-label="Ticket resolution progress">
                    <div class="h-full rounded-full bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] transition-all duration-1000 ease-out group-hover:opacity-80" 
                         style="width: {{ $ticketProgress ?? 0 }}%">
                    </div>
                </div>
                <div class="mt-3 flex items-center justify-between text-xs text-white/35">
                    <span>🟡 {{ $openTickets ?? 0 }} open</span>
                    <span>🟢 {{ $resolvedTickets ?? 0 }} resolved</span>
                    <span>🔵 {{ $inProgressTickets ?? 0 }} in progress</span>
                </div>
            </div>

            {{-- Equipment Progress Card --}}
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition-all duration-300 group">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-white/35 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            Equipment Availability
                        </p>
                        <h2 class="mt-2 text-xl font-semibold text-white">
                            {{ $availableEquipment ?? 0 }} <span class="text-white/40 text-sm font-normal">of {{ $totalEquipment ?? 0 }} available</span>
                        </h2>
                    </div>
                    <span class="text-2xl font-bold text-green-400 group-hover:scale-110 transition-transform duration-300">
                        {{ $equipmentProgress ?? 0 }}%
                    </span>
                </div>
                <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/10" 
                     role="progressbar" 
                     aria-valuenow="{{ $equipmentProgress ?? 0 }}" 
                     aria-valuemin="0" 
                     aria-valuemax="100" 
                     aria-label="Equipment availability progress">
                    <div class="h-full rounded-full bg-gradient-to-r from-green-500 to-emerald-300 transition-all duration-1000 ease-out group-hover:opacity-80" 
                         style="width: {{ $equipmentProgress ?? 0 }}%">
                    </div>
                </div>
                <div class="mt-3 flex items-center justify-between text-xs text-white/35">
                    <span>🟢 {{ $availableEquipment ?? 0 }} available</span>
                    <span>🔵 {{ $assignedEquipment ?? 0 }} assigned</span>
                    <span>🟡 {{ $maintenanceEquipment ?? 0 }} maintenance</span>
                </div>
            </div>
        </div>

        {{-- CTA বাটন --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10 animate-fade-in-up-delay-3">
            @auth
                <a href="{{ route('dashboard') }}" class="group inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                    <span>Go to Dashboard</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="group inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                    <span>Get Started</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/5 border border-white/10 text-white font-medium rounded-xl hover:bg-white/10 hover:border-white/20 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                    Create Account
                </a>
            @endauth
        </div>

        {{-- ফিচার হাইলাইট --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 text-left animate-fade-in-up-delay-4">
            <div class="bg-white/5 backdrop-blur-sm border border-white/5 rounded-xl p-6 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-sm">Ticket Management</h3>
                <p class="text-white/30 text-xs mt-1">Create, track, and resolve IT support tickets efficiently</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/5 rounded-xl p-6 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-sm">Asset Tracking</h3>
                <p class="text-white/30 text-xs mt-1">Monitor equipment inventory and warranty status</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/5 rounded-xl p-6 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-sm">Payment System</h3>
                <p class="text-white/30 text-xs mt-1">Easy payment management for lab fees and services</p>
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

    /* অ্যানিমেশন */
    @keyframes float-slow {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -20px) scale(1.1); }
        66% { transform: translate(-10px, 15px) scale(0.95); }
    }

    @keyframes float-slow-delay {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(-15px, 20px) scale(1.05); }
        66% { transform: translate(10px, -15px) scale(0.95); }
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.1); }
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animate-float-slow {
        animation: float-slow 8s ease-in-out infinite;
    }

    .animate-float-slow-delay {
        animation: float-slow-delay 10s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 4s ease-in-out infinite;
    }

    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 4s ease-in-out infinite;
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    .animate-fade-in-up {
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
    }

    .animate-fade-in-up-delay {
        opacity: 0;
        animation: fadeInUp 0.8s ease 0.15s forwards;
    }

    .animate-fade-in-up-delay-2 {
        opacity: 0;
        animation: fadeInUp 0.8s ease 0.3s forwards;
    }

    .animate-fade-in-up-delay-3 {
        opacity: 0;
        animation: fadeInUp 0.8s ease 0.45s forwards;
    }

    .animate-fade-in-up-delay-4 {
        opacity: 0;
        animation: fadeInUp 0.8s ease 0.6s forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush