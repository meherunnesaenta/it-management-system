{{-- resources/views/components/dropdown-link.blade.php --}}
@props(['as' => 'a', 'variant' => 'default'])

@php
    // ভ্যারিয়েন্ট অনুযায়ী স্টাইল
    $variantClasses = [
        'default' => 'text-white/70 hover:text-white hover:bg-white/5',
        'danger' => 'text-red-400 hover:text-red-300 hover:bg-red-500/10',
        'success' => 'text-green-400 hover:text-green-300 hover:bg-green-500/10',
        'active' => 'text-[#FF6B35] bg-[#FF6B35]/10',
    ][$variant] ?? 'text-white/70 hover:text-white hover:bg-white/5';
@endphp

@if($as === 'a')
    <a {{ $attributes->merge([
        'class' => "block w-full px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {$variantClasses}",
    ]) }}>
        {{ $slot }}
    </a>
@elseif($as === 'button')
    <button {{ $attributes->merge([
        'type' => 'button',
        'class' => "block w-full px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-left {$variantClasses}",
    ]) }}>
        {{ $slot }}
    </button>
@elseif($as === 'divider')
    <hr class="my-1 border-t border-white/5" />
@else
    <div {{ $attributes->merge([
        'class' => "block w-full px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {$variantClasses}",
    ]) }}>
        {{ $slot }}
    </div>
@endif