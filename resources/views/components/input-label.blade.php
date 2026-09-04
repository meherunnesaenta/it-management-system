{{-- resources/views/components/input-label.blade.php --}}
@props([
    'value' => null,
    'required' => false,
    'icon' => null,
    'hint' => null,
])

<label {{ $attributes->merge([
    'class' => 'input-label-modern',
]) }}>
    {{-- আইকন (ঐচ্ছিক) --}}
    @if($icon)
        <span class="label-icon">{{ $icon }}</span>
    @endif

    {{-- লেবেল টেক্সট --}}
    <span class="label-text">
        {{ $value ?? $slot }}
    </span>

    {{-- রিকোয়ার্ড ইন্ডিকেটর --}}
    @if($required)
        <span class="label-required" title="Required field">*</span>
    @endif

    {{-- হিন্ট (ঐচ্ছিক) --}}
    @if($hint)
        <span class="label-hint">{{ $hint }}</span>
    @endif
</label>

<style>
    /* ----- ইনপুট লেবেল স্টাইল ----- */
    .input-label-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        margin-bottom: 0.5rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.7);
        letter-spacing: 0.01em;
        transition: color 0.2s ease;
        cursor: default;
    }

    /* লেবেল হোভার */
    .input-label-modern:hover {
        color: rgba(255, 255, 255, 0.9);
    }

    /* লেবেল আইকন */
    .label-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 16px;
        height: 16px;
        color: #FF6B35;
    }

    .label-icon svg {
        width: 100%;
        height: 100%;
    }

    /* লেবেল টেক্সট */
    .label-text {
        flex: 1;
    }

    /* রিকোয়ার্ড ইন্ডিকেটর */
    .label-required {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1rem;
        font-weight: 700;
        color: #f87171;
        line-height: 1;
        margin-left: 0.125rem;
    }

    /* হিন্ট টেক্সট */
    .label-hint {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.04);
        padding: 0.125rem 0.5rem;
        border-radius: 4px;
        border: 1px solid rgba(255, 255, 255, 0.04);
        transition: all 0.2s ease;
    }

    .input-label-modern:hover .label-hint {
        color: rgba(255, 255, 255, 0.4);
        border-color: rgba(255, 255, 255, 0.08);
    }

    /* ডার্ক মোডে ডিফল্ট */
    .dark .input-label-modern {
        color: rgba(255, 255, 255, 0.6);
    }

    .dark .input-label-modern:hover {
        color: rgba(255, 255, 255, 0.85);
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        .input-label-modern {
            font-size: 0.75rem;
            gap: 0.25rem;
        }
        .label-hint {
            font-size: 0.6rem;
            padding: 0.1rem 0.375rem;
        }
        .label-required {
            font-size: 0.875rem;
        }
    }
</style>