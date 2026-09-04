{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    {{-- হেডার --}}
    <div class="flex items-center gap-4">
        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 rounded-2xl">
            <svg class="w-7 h-7 text-[#FF8F65]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-white font-space">Welcome Back!</h1>
            <p class="text-white/40 text-sm">Here's an overview of your account</p>
        </div>
    </div>

    {{-- ইউজার ইনফো কার্ড --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                {{-- অ্যাভাটার --}}
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 flex items-center justify-center text-2xl font-bold text-[#FF8F65] border-2 border-white/10">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-white">{{ auth()->user()->name }}</h2>
                    <p class="text-white/40 text-sm">{{ auth()->user()->email }}</p>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-[#FF6B35]/10 text-[#FF6B35] border border-[#FF6B35]/20">
                            {{ auth()->user()->roles?->first()?->name ?? 'User' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 hover:bg-white/10 text-white/60 hover:text-white border border-white/10 rounded-xl text-sm font-medium transition-all duration-200">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Edit Profile
                </a>
                @role('super-admin')
                    <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                            Admin Panel
                    </a>
                @endrole
                @role('it-staff')
                    <a href="{{ Route::has('it-staff.dashboard') ? route('it-staff.dashboard') : route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                            Staff Panel
                    </a>
                @endrole
                @role('student')
                    <a href="{{ Route::has('student.dashboard') ? route('student.dashboard') : route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                            Student Panel
                    </a>
                @endrole
            </div>
        </div>
    </div>

    {{-- কুইক অ্যাকশন --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('profile.edit') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <div>
                    <p class="text-white font-medium group-hover:text-white transition-colors duration-300">Update Profile</p>
                    <p class="text-white/30 text-sm">Change your personal information</p>
                </div>
            </div>
        </a>

        @role('student')
                    <a href="{{ Route::has('student.tickets.create') ? route('student.tickets.create') : route('dashboard') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#FF6B35]/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-medium group-hover:text-white transition-colors duration-300">Create Ticket</p>
                        <p class="text-white/30 text-sm">Submit a support request</p>
                    </div>
                </div>
            </a>
        @endrole

        @role('student')
                    <a href="{{ Route::has('student.payments.create') ? route('student.payments.create') : route('dashboard') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-medium group-hover:text-white transition-colors duration-300">Make Payment</p>
                        <p class="text-white/30 text-sm">Pay for lab fees or services</p>
                    </div>
                </div>
            </a>
        @endrole

        @role('super-admin|it-staff')
                    <a href="{{ Route::has('admin.tickets.index') ? route('admin.tickets.index') : route('dashboard') }}" class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-yellow-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-medium group-hover:text-white transition-colors duration-300">Manage Tickets</p>
                        <p class="text-white/30 text-sm">View and resolve support tickets</p>
                    </div>
                </div>
            </a>
        @endrole
    </div>

    {{-- রোল অনুযায়ী দ্রুত লিংক --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
        <h3 class="text-lg font-semibold text-white font-space mb-4">Quick Links</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            @role('super-admin')
                <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">📊 Admin Dashboard</span>
                </a>
                <a href="{{ Route::has('admin.equipments.index') ? route('admin.equipments.index') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">🖥️ Equipment</span>
                </a>
                <a href="{{ Route::has('admin.users.index') ? route('admin.users.index') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">👥 Users</span>
                </a>
                <a href="{{ Route::has('admin.reports') ? route('admin.reports') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">📈 Reports</span>
                </a>
            @endrole

            @role('it-staff')
                <a href="{{ Route::has('it-staff.dashboard') ? route('it-staff.dashboard') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">📋 My Dashboard</span>
                </a>
                <a href="{{ Route::has('it-staff.tickets.index') ? route('it-staff.tickets.index') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">🎫 Assigned Tickets</span>
                </a>
            @endrole

            @role('student')
                <a href="{{ Route::has('student.dashboard') ? route('student.dashboard') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">📋 My Dashboard</span>
                </a>
                <a href="{{ Route::has('student.tickets.index') ? route('student.tickets.index') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">🎫 My Tickets</span>
                </a>
                <a href="{{ Route::has('student.tickets.create') ? route('student.tickets.create') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">➕ New Ticket</span>
                </a>
                <a href="{{ Route::has('student.payments.create') ? route('student.payments.create') : route('dashboard') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                    <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">💳 Make Payment</span>
                </a>
            @endrole

            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 group">
                <span class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">⚙️ Profile Settings</span>
            </a>
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