{{-- resources/views/components/dropdown.blade.php --}}
@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1',
    'triggerClass' => '',
    'placement' => 'bottom',
])

@php
    // অ্যালাইনমেন্ট ক্লাস
    $alignmentClasses = match ($align) {
        'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
        'top' => 'origin-top',
        default => 'ltr:origin-top-right rtl:origin-top-left end-0',
    };

    // প্রস্থ ক্লাস
    $widthClasses = match ($width) {
        '48' => 'w-48',
        '64' => 'w-64',
        '80' => 'w-80',
        'full' => 'w-full',
        default => 'w-48',
    };

    // প্লেসমেন্ট ক্লাস
    $placementClasses = match ($placement) {
        'top' => 'bottom-full mb-2',
        'bottom' => 'top-full mt-2',
        default => 'top-full mt-2',
    };
@endphp

<div 
    class="relative" 
    x-data="{ open: false }" 
    @click.outside="open = false" 
    @close.stop="open = false"
    x-init="() => { $el.addEventListener('keydown', (e) => { if (e.key === 'Escape') open = false; }); }"
>
    {{-- ট্রিগার --}}
    <div @click="open = ! open" @keydown.space.prevent="open = ! open" class="{{ $triggerClass }}">
        {{ $trigger }}
    </div>

    {{-- ড্রপডাউন মেনু --}}
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 {{ $widthClasses }} {{ $alignmentClasses }} {{ $placementClasses }}"
        style="display: none;"
        @click="open = false"
        x-cloak
    >
        <div class="dropdown-menu-modern {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

<style>
    /* ----- ড্রপডাউন স্টাইল ----- */
    .dropdown-menu-modern {
        background: rgba(26, 26, 46, 0.92);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        overflow: hidden;
        padding: 0.25rem;
    }

    /* ড্রপডাউন আইটেমের জন্য স্পেসিং */
    .dropdown-menu-modern > *:not(:last-child) {
        margin-bottom: 0.125rem;
    }

    /* অ্যালপাইন ক্লোক (লোডিং এর সময় লুকানোর জন্য) */
    [x-cloak] {
        display: none !important;
    }

    /* ডার্ক মোডে */  
    .dark .dropdown-menu-modern {
        background: rgba(26, 26, 46, 0.95);
        border-color: rgba(255, 255, 255, 0.04);
    }

    /* ছোট স্ক্রিনে */  
    @media (max-width: 640px) {
        .dropdown-menu-modern {
            border-radius: 12px;
        }
    }
</style>