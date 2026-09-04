{{-- resources/views/components/mobile-nav-link.blade.php --}}
@props([
    'active' => false,
    'icon' => null,
    'badge' => null,
])

@php
    $baseClasses = 'flex items-center gap-3 w-full px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200';
    
    $activeClasses = 'bg-[#FF6B35]/10 text-[#FF8F65] shadow-[inset_3px_0_0_#FF6B35]';
    
    $inactiveClasses = 'text-white/60 hover:text-white hover:bg-white/5';
    
    $classes = $baseClasses . ' ' . ($active ? $activeClasses : $inactiveClasses);
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{-- আইকন --}}
    @if($icon)
        <span class="mobile-nav-icon">{{ $icon }}</span>
    @endif

    {{-- টেক্সট --}}
    <span class="mobile-nav-text">{{ $slot }}</span>

    {{-- ব্যাজ --}}
    @if($badge)
        <span class="mobile-nav-badge">{{ $badge }}</span>
    @endif
</a>

<style>
    /* ----- মোবাইল নেভ লিংক স্টাইল ----- */
    .mobile-nav-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 20px;
        height: 20px;
        color: currentColor;
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }

    .mobile-nav-icon svg {
        width: 100%;
        height: 100%;
    }

    a:hover .mobile-nav-icon {
        opacity: 1;
    }

    .mobile-nav-text {
        flex: 1;
        font-weight: 500;
    }

    /* ব্যাজ স্টাইল */
    .mobile-nav-badge {
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

    /* অ্যাকটিভ স্টেটে ব্যাজ */
    .active .mobile-nav-badge {
        background: #FF8F65;
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.4);
    }

    /* ডার্ক মোডে */
    .dark .mobile-nav-link {
        color: rgba(255, 255, 255, 0.6);
    }

    .dark .mobile-nav-link:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        .mobile-nav-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
        }
        .mobile-nav-icon {
            width: 18px;
            height: 18px;
        }
        .mobile-nav-badge {
            min-width: 16px;
            height: 16px;
            font-size: 0.5rem;
            padding: 0 0.25rem;
        }
    }
</style>