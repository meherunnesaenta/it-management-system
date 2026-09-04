{{-- resources/views/profile/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="max-w-4xl mx-auto py-8 space-y-8">
    {{-- হেডার --}}
    <div class="flex items-center gap-4">
        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF6B35]/20 to-[#FF8F65]/20 rounded-2xl">
            <svg class="w-7 h-7 text-[#FF8F65]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-white font-space">Profile Settings</h1>
            <p class="text-white/40 text-sm">Manage your account settings and preferences</p>
        </div>
    </div>

    {{-- প্রোফাইল ইনফরমেশন --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-8 py-6 border-b border-white/5">
            <h2 class="text-lg font-semibold text-white font-space">Profile Information</h2>
        </div>
        <div class="p-8">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- পাসওয়ার্ড আপডেট --}}
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-8 py-6 border-b border-white/5">
            <h2 class="text-lg font-semibold text-white font-space">Update Password</h2>
        </div>
        <div class="p-8">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- ডিলিট অ্যাকাউন্ট --}}
    <div class="bg-white/5 backdrop-blur-xl border border-red-500/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-8 py-6 border-b border-red-500/10 bg-red-500/5">
            <h2 class="text-lg font-semibold text-red-400 font-space flex items-center gap-2">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                Delete Account
            </h2>
        </div>
        <div class="p-8">
            @include('profile.partials.delete-user-form')
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