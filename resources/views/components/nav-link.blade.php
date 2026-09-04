{{-- resources/views/components/nav-link.blade.php --}}
@props([
    'active' => false,
    'variant' => 'default', // default, sidebar, tab, breadcrumb
    'icon' => null,
    'badge' => null,
])

@php
    // ভ্যারিয়েন্ট অনুযায়ী স্টাইল
    $variantClasses = match($variant) {
        'sidebar' => [
            'active' => 'bg-[#FF6B35]/10 text-[#FF8F65] shadow-[inset_3px_0_0_#FF6B35]',
            'inactive' => 'text-white/50 hover:text-white hover:bg-white/5',
            'base' => 'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200',
        ],
        'tab' => [
            'active' => 'text-[#FF6B35] border-b-2 border-[#FF6B35]',
            'inactive' => 'text-white/40 hover:text-white/70 border-b-2 border-transparent hover:border-white/10',
            'base' => 'inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2',
        ],
        'breadcrumb' => [
            'active' => 'text-white font-medium',
            'inactive' => 'text-white/40 hover:text-white/70',
            'base' => 'inline-flex items-center gap-1.5 text-sm transition-all duration-200',
        ],
        default => [
            'active' => 'text-[#FF6B35]',
            'inactive' => 'text-white/50 hover:text-white',
            'base' => 'inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-white/5',
        ],
    };

    $classes = $variantClasses['base'] . ' ' . ($active ? $variantClasses['active'] : $variantClasses['inactive']);
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{-- আইকন --}}
    @if($icon)
        <span class="nav-link-icon">{{ $icon }}</span>
    @endif

    {{-- টেক্সট --}}
    <span class="nav-link-text">{{ $slot }}</span>

    {{-- ব্যাজ --}}
    @if($badge)
        <span class="nav-link-badge">{{ $badge }}</span>
    @endif
</a>

<style>
    /* ----- নেভ লিংক স্টাইল ----- */
    .nav-link-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 18px;
        height: 18px;
        color: currentColor;
        opacity: 0.6;
        transition: opacity 0.2s ease;
    }

    .nav-link-icon svg {
        width: 100%;
        height: 100%;
    }

    .nav-link-text {
        flex: 1;
    }

    /* ব্যাজ স্টাইল */
    .nav-link-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        padding: 0 0.375rem;
        background: #FF6B35;
        border-radius: 9999px;
        font-size: 0.6rem;
        font-weight: 700;
        color: #fff;
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.3);
        line-height: 1;
    }

    /* সাইডবার ভ্যারিয়েন্টে অ্যাকটিভ স্টেটে ব্যাজ */
    .active .nav-link-badge {
        background: #FF8F65;
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.4);
    }

    /* হোভার ইফেক্ট */
    .nav-link-icon {
        transition: opacity 0.2s ease;
    }

    a:hover .nav-link-icon {
        opacity: 1;
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        .nav-link-text {
            font-size: 0.8rem;
        }
        .nav-link-badge {
            min-width: 16px;
            height: 16px;
            font-size: 0.5rem;
            padding: 0 0.25rem;
        }
    }
</style>