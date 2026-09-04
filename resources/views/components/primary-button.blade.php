{{-- resources/views/components/secondary-button.blade.php --}}
@props([
    'type' => 'button',
    'size' => 'default',
    'fullWidth' => false,
])

@php
    // সাইজ ক্লাস
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-xs',
        'default' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-2.5 text-base',
    ][$size] ?? 'px-4 py-2 text-sm';

    // ফুল-ওয়াইড ক্লাস
    $widthClass = $fullWidth ? 'w-full' : '';
@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "inline-flex items-center justify-center gap-2 font-medium rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] {$sizeClasses} {$widthClass}",
    ]) }}
>
    {{ $slot }}
</button>

<style>
    /* ----- সেকেন্ডারি বাটন বেস স্টাইল ----- */
    button[class*="rounded-xl"] {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.7);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }

    button[class*="rounded-xl"]:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.12);
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    button[class*="rounded-xl"]:active {
        transform: scale(0.98);
        background: rgba(255, 255, 255, 0.02);
    }

    button[class*="rounded-xl"]:focus-visible {
        outline: 2px solid #FF6B35;
        outline-offset: 2px;
    }

    /* ডার্ক মোডে */
    .dark button[class*="rounded-xl"] {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.6);
    }

    .dark button[class*="rounded-xl"]:hover {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    /* ডিসেবল্ড স্টেট */
    button[class*="rounded-xl"]:disabled {
        opacity: 0.4;
        cursor: not-allowed;
        transform: none !important;
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        button[class*="rounded-xl"] {
            padding-left: 0.875rem;
            padding-right: 0.875rem;
            font-size: 0.8rem;
        }
    }
</style>