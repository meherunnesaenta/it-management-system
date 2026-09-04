{{-- resources/views/components/modal.blade.php --}}
@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl',
    'closeable' => true,
    'title' => null,
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        'full' => 'sm:max-w-full sm:mx-4',
    ][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])';
            return [...$el.querySelectorAll(selector)]
                .filter(el => !el.hasAttribute('disabled') && !el.closest('[x-cloak]'));
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 150)' : '' }}
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};"
    x-cloak
>
    {{-- ব্যাকড্রপ --}}
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="{{ $closeable ? 'show = false' : '' }}"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 modal-backdrop"></div>
    </div>

    {{-- মোডাল কন্টেন্ট --}}
    <div
        x-show="show"
        class="modal-container {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        <div class="modal-content">
            {{-- হেডার (যদি টাইটেল থাকে) --}}
            @if($title)
                <div class="modal-header">
                    <h3 class="modal-title">{{ $title }}</h3>
                    @if($closeable)
                        <button 
                            @click="show = false" 
                            class="modal-close-btn"
                            aria-label="Close modal"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            @endif

            {{-- স্লট --}}
            <div class="modal-body">
                {{ $slot }}
            </div>

            {{-- ফুটার (ঐচ্ছিক) --}}
            @if(isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* ----- মোডাল স্টাইল ----- */
    .modal-backdrop {
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .modal-container {
        position: relative;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .modal-content {
        background: rgba(26, 26, 46, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 20px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
        overflow: hidden;
        max-height: calc(100vh - 4rem);
        display: flex;
        flex-direction: column;
    }

    /* ----- মোডাল হেডার ----- */
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        flex-shrink: 0;
    }

    .modal-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.125rem;
        font-weight: 600;
        color: #fff;
        margin: 0;
        letter-spacing: -0.01em;
    }

    .modal-close-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border: none;
        background: rgba(255, 255, 255, 0.04);
        border-radius: 10px;
        color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }

    .modal-close-btn:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
    }

    .modal-close-btn svg {
        width: 20px;
        height: 20px;
    }

    /* ----- মোডাল বডি ----- */
    .modal-body {
        padding: 1.5rem;
        overflow-y: auto;
        flex: 1;
    }

    .modal-body::-webkit-scrollbar {
        width: 4px;
    }

    .modal-body::-webkit-scrollbar-track {
        background: transparent;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 2px;
    }

    /* ----- মোডাল ফুটার ----- */
    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.04);
        flex-shrink: 0;
        flex-wrap: wrap;
    }

    /* ----- অ্যালপাইন ক্লোক ----- */
    [x-cloak] {
        display: none !important;
    }

    /* ----- রেসপন্সিভ ----- */
    @media (max-width: 640px) {
        .modal-container {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .modal-content {
            border-radius: 16px;
            max-height: calc(100vh - 2rem);
        }

        .modal-header {
            padding: 1rem 1.25rem;
        }

        .modal-title {
            font-size: 1rem;
        }

        .modal-body {
            padding: 1.25rem;
        }

        .modal-footer {
            padding: 0.75rem 1.25rem;
            flex-direction: column;
        }

        .modal-footer .btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            padding: 0.75rem 1rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-footer {
            padding: 0.625rem 1rem;
        }
    }
</style>