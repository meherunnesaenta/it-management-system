{{-- resources/views/components/button.blade.php --}}
@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, danger, outline, ghost
    'size' => 'default',    // sm, default, lg
    'fullWidth' => false,
])

@php
    // সাইজ ক্লাস
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-xs',
        'default' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-2.5 text-base',
    ][$size] ?? 'px-4 py-2 text-sm';

    // ভ্যারিয়েন্ট ক্লাস
    $variantClasses = [
        'primary' => 'bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] border-0',
        'secondary' => 'bg-white/5 text-white border border-white/10 hover:bg-white/10 hover:border-white/20 active:scale-[0.98]',
        'danger' => 'bg-gradient-to-r from-red-600 to-red-500 text-white shadow-lg shadow-red-600/25 hover:shadow-red-600/40 hover:-translate-y-0.5 active:scale-[0.98] border-0',
        'outline' => 'bg-transparent text-white border border-[#FF6B35] hover:bg-[#FF6B35]/10 active:scale-[0.98]',
        'ghost' => 'bg-transparent text-white/60 border-0 hover:bg-white/5 hover:text-white active:scale-[0.98]',
    ][$variant] ?? 'bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white shadow-lg shadow-[#FF6B35]/25';

    // ফুল-ওয়াইড ক্লাস
    $widthClass = $fullWidth ? 'w-full' : '';
@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "inline-flex items-center justify-center gap-2 font-medium rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] {$sizeClasses} {$variantClasses} {$widthClass}",
    ]) }}
>
    {{ $slot }}
</button>