{{-- resources/views/profile/partials/update-profile-information-form.blade.php --}}

<section class="space-y-6">
    {{-- হেডার --}}
    <div class="flex items-start gap-4">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-[#FF6B35]/10 rounded-xl flex-shrink-0">
            <svg class="w-6 h-6 text-[#FF6B35]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-white font-space">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-1 text-sm text-white/40">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </div>

    {{-- ভেরিফিকেশন ফর্ম (হিডেন) --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="hidden">
        @csrf
    </form>

    {{-- প্রোফাইল আপডেট ফর্ম --}}
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- নাম --}}
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-white/70 mb-1.5" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <x-text-input 
                    id="name" 
                    name="name" 
                    type="text" 
                    class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                    :value="old('name', $user->name)" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="{{ __('Enter your full name') }}"
                />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- ইমেইল --}}
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-white/70 mb-1.5" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <x-text-input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                    :value="old('email', $user->email)" 
                    required 
                    autocomplete="username"
                    placeholder="{{ __('Enter your email address') }}"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            {{-- ইমেইল ভেরিফিকেশন স্ট্যাটাস --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        <div>
                            <p class="text-sm text-yellow-400/80">
                                {{ __('Your email address is unverified.') }}
                            </p>
                            <button 
                                form="send-verification" 
                                class="text-sm text-[#FF6B35] hover:text-[#FF8F65] transition-colors duration-200 underline-offset-2 hover:underline mt-1"
                            >
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-3 p-3 bg-green-500/10 border border-green-500/20 rounded-lg text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        {{-- সেভ বাটন ও স্ট্যাটাস --}}
        <div class="flex items-center gap-4 pt-4 border-t border-white/5">
            <button 
                type="submit" 
                class="px-6 py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-400 flex items-center gap-2"
                >
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ __('Profile updated successfully!') }}
                </p>
            @endif
        </div>
    </form>
</section>

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    /* ইনপুট অটোফিল ডার্ক থিম ফিক্স */
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px rgba(26, 26, 46, 0.9) inset !important;
        -webkit-text-fill-color: #fff !important;
        border-color: rgba(255, 107, 53, 0.3) !important;
    }
</style>
@endpush