{{-- resources/views/components/text-input.blade.php --}}
@props([
    'disabled' => false,
    'hasError' => false,
    'icon' => null,
    'variant' => 'default', // default, search, ghost
])

@php
    // বেস ক্লাস
    $baseClasses = 'w-full rounded-xl border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] disabled:opacity-40 disabled:cursor-not-allowed';
    
    // ভ্যারিয়েন্ট ক্লাস
    $variantClasses = match($variant) {
        'search' => 'pl-10 pr-4 py-2.5 bg-white/5 border-white/10 text-white placeholder-white/30 focus:bg-white/10',
        'ghost' => 'px-0 py-2 bg-transparent border-0 border-b border-white/10 rounded-none text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-0',
        default => 'px-4 py-2.5 bg-white/5 border-white/10 text-white placeholder-white/30 focus:bg-white/10',
    };

    // এরর ক্লাস
    $errorClasses = $hasError ? 'border-red-500/50 focus:border-red-500 focus:ring-red-500/50' : '';
    
    // প্যাডিং (আইকন থাকলে)
    $paddingClasses = $icon ? 'pl-10' : '';
    
    $classes = trim("{$baseClasses} {$variantClasses} {$errorClasses} {$paddingClasses}");
@endphp

<div class="relative w-full">
    {{-- আইকন --}}
    @if($icon)
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-white/30 pointer-events-none">
            {{ $icon }}
        </span>
    @endif

    <input
        {{ $attributes->merge(['class' => $classes]) }}
        @disabled($disabled)
    />
</div>

<style>
    /* ইনপুট অটোফিল স্টাইল */
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px rgba(26, 26, 46, 0.9) inset !important;
        -webkit-text-fill-color: #fff !important;
        border-color: rgba(255, 107, 53, 0.3) !important;
    }

    /* ইনপুট প্লেসহোল্ডার */
    input::placeholder {
        color: rgba(255, 255, 255, 0.3);
        font-weight: 400;
    }

    /* ডার্ক মোডে ডিফল্ট */
    .dark input {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.06);
        color: #fff;
    }

    .dark input:focus {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 107, 53, 0.4);
    }

    /* এরর স্টেট */
    .input-error {
        border-color: rgba(239, 68, 68, 0.5) !important;
    }

    .input-error:focus {
        border-color: #ef4444 !important;
        ring-color: #ef4444 !important;
    }

    /* সাকসেস স্টেট */
    .input-success {
        border-color: rgba(16, 185, 129, 0.5) !important;
    }

    .input-success:focus {
        border-color: #10b981 !important;
        ring-color: #10b981 !important;
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        input {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            font-size: 0.875rem;
        }
    }
</style>