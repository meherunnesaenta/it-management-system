{{-- resources/views/components/auth-session-status.blade.php --}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'auth-session-status']) }}>
        <div class="status-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>
        <div class="status-message">
            {{ $status }}
        </div>
        <button type="button" class="status-close" onclick="this.closest('.auth-session-status').style.display='none'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

<style>
    /* ----- অথ স্ট্যাটাস কম্পোনেন্ট স্টাইল ----- */
    .auth-session-status {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1.25rem;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.15);
        border-radius: 12px;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        animation: slideDown 0.4s ease forwards;
        color: #34d399;
    }

    .auth-session-status .status-icon {
        flex-shrink: 0;
        width: 20px;
        height: 20px;
        color: #34d399;
    }

    .auth-session-status .status-icon svg {
        width: 100%;
        height: 100%;
    }

    .auth-session-status .status-message {
        flex: 1;
        font-size: 0.875rem;
        font-weight: 500;
        color: #34d399;
        line-height: 1.5;
    }

    .auth-session-status .status-close {
        flex-shrink: 0;
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.25);
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 6px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-session-status .status-close:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    .auth-session-status .status-close svg {
        width: 18px;
        height: 18px;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ডার্ক মোডে ডিফল্ট */
    .dark .auth-session-status {
        background: rgba(16, 185, 129, 0.06);
        border-color: rgba(16, 185, 129, 0.1);
    }

    /* রেসপন্সিভ */
    @media (max-width: 480px) {
        .auth-session-status {
            padding: 0.625rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 10px;
        }
        .auth-session-status .status-message {
            font-size: 0.8rem;
        }
    }
</style>