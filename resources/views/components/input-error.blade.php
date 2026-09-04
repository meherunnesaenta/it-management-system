{{-- resources/views/components/input-error.blade.php --}}
@props(['messages', 'icon' => true, 'variant' => 'default'])

@if ($messages)
    <ul {{ $attributes->merge([
        'class' => "input-error-list",
        'role' => 'alert',
    ]) }}>
        @foreach ((array) $messages as $message)
            <li class="input-error-item">
                @if($icon)
                    <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                @endif
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif

<style>
    /* ----- ইনপুট এরর স্টাইল ----- */
    .input-error-list {
        margin-top: 0.375rem;
        padding: 0;
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .input-error-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.625rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: #f87171;
        background: rgba(239, 68, 68, 0.06);
        border: 1px solid rgba(239, 68, 68, 0.12);
        border-radius: 8px;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        animation: errorShake 0.4s ease forwards;
    }

    .input-error-item .error-icon {
        flex-shrink: 0;
        width: 16px;
        height: 16px;
        color: #f87171;
    }

    /* অ্যানিমেশন */
    @keyframes errorShake {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-4px); }
        40% { transform: translateX(4px); }
        60% { transform: translateX(-2px); }
        80% { transform: translateX(2px); }
    }

    /* ডার্ক মোডে */
    .dark .input-error-item {
        background: rgba(239, 68, 68, 0.08);
        border-color: rgba(239, 68, 68, 0.15);
        color: #fca5a5;
    }

    .dark .input-error-item .error-icon {
        color: #fca5a5;
    }

    /* স্পেসিং ভ্যারিয়েন্ট */
    .input-error-list.compact .input-error-item {
        padding: 0.25rem 0.5rem;
        font-size: 0.7rem;
        border-radius: 6px;
    }

    .input-error-list.large .input-error-item {
        padding: 0.5rem 0.75rem;
        font-size: 0.9rem;
        border-radius: 10px;
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        .input-error-item {
            padding: 0.25rem 0.5rem;
            font-size: 0.7rem;
            border-radius: 6px;
        }
        .input-error-item .error-icon {
            width: 14px;
            height: 14px;
        }
    }
</style>