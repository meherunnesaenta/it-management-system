{{-- resources/views/auth/login.blade.php --}}

@extends('layouts.app')

@section('title', 'Login')
@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12">
    <div class="w-full max-w-md">
        {{-- গ্লাসমরফিক কার্ড --}}
        <div class="relative">
            {{-- ডেকোরেটিভ গ্লো --}}
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#FF6B35]/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#FF8F65]/10 rounded-full blur-3xl"></div>
            
            <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
                {{-- হেডার --}}
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-[#FF6B35] to-[#FF8F65] rounded-2xl shadow-lg shadow-[#FF6B35]/20 mb-4">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white font-space">Welcome Back</h2>
                    <p class="text-white/40 text-sm mt-1">Sign in to your account to continue</p>
                </div>

                {{-- সেশন স্ট্যাটাস --}}
                @if(session('status'))
                    <div class="mb-4 p-3 bg-green-500/10 border border-green-500/20 rounded-lg text-green-400 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 rounded-lg text-red-400 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- ফর্ম --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- ইমেইল --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-white/70 mb-1.5">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                autocomplete="username"
                                class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                                placeholder="you@example.com"
                            />
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- পাসওয়ার্ড --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-medium text-white/70">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-[#FF6B35] hover:text-[#FF8F65] transition-colors">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input 
                                name="password" 
                                type="password" 
                                required 
                                autocomplete="current-password"
                                class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                                placeholder="••••••••"
                            />
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- রিমেম্বার মি --}}
                    <div class="flex items-center">
                        <input 
                            id="remember_me" 
                            name="remember" 
                            type="checkbox" 
                            class="w-4 h-4 bg-white/5 border border-white/10 rounded focus:ring-[#FF6B35] focus:ring-offset-2 focus:ring-offset-[#0A0A0F] text-[#FF6B35]"
                        />
                        <label for="remember_me" class="ml-2 text-sm text-white/50">
                            Remember me
                        </label>
                    </div>

                    {{-- সাবমিট বাটন --}}
                    <button 
                        type="submit" 
                        class="w-full py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300"
                    >
                        Sign In
                    </button>

                    {{-- রেজিস্টার লিংক --}}
                    <p class="text-center text-sm text-white/40">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-[#FF6B35] hover:text-[#FF8F65] transition-colors">
                            Create one
                        </a>
                    </p>
                </form>

                {{-- ডেভেলপার শর্টকাট (ডেমো) --}}
                <div class="mt-6 pt-6 border-t border-white/5">
                    <p class="text-center text-xs text-white/20 mb-2">Quick Login (Demo)</p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('login') }}?role=admin" class="px-3 py-1 text-xs bg-white/5 border border-white/10 rounded-lg text-white/40 hover:bg-white/10 hover:text-white/70 transition-colors">Admin</a>
                        <a href="{{ route('login') }}?role=staff" class="px-3 py-1 text-xs bg-white/5 border border-white/10 rounded-lg text-white/40 hover:bg-white/10 hover:text-white/70 transition-colors">Staff</a>
                        <a href="{{ route('login') }}?role=student" class="px-3 py-1 text-xs bg-white/5 border border-white/10 rounded-lg text-white/40 hover:bg-white/10 hover:text-white/70 transition-colors">Student</a>
                    </div>
                </div>
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
<script>
    // ডেভেলপার সুবিধা: রোল অনুযায়ী ইমেইল প্রিফিল
    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const role = params.get('role');
        const emailInput = document.getElementById('email');
        
        if (role && emailInput) {
            const emails = {
                admin: 'admin@example.com',
                staff: 'staff@example.com',
                student: 'student@example.com'
            };
            if (emails[role]) {
                emailInput.value = emails[role];
                // পাসওয়ার্ড ফিল্ডে অটোফোকাস
                const passwordInput = document.querySelector('input[name="password"]');
                if (passwordInput) {
                    setTimeout(() => passwordInput.focus(), 100);
                }
            }
        }
    });
</script>
@endpush