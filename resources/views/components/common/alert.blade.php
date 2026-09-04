{{-- resources/views/components/alert.blade.php --}}

@if(session('status'))
    <div id="status-alert" class="alert-container">
        <div class="alert-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="alert-message">
            {{ session('status') }}
        </div>
        <button type="button" id="close-alert" class="alert-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

<style>
    /* ----- স্ট্যাটাস অ্যালার্ট স্টাইল ----- */
    .alert-container {
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.25);
        border-radius: 16px;
        color: #34d399;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        animation: slideDown 0.5s ease forwards;
    }

    .alert-icon {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        color: #34d399;
    }

    .alert-message {
        flex: 1;
        font-size: 0.925rem;
        font-weight: 500;
        color: #34d399;
        line-height: 1.5;
    }

    .alert-close {
        flex-shrink: 0;
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .alert-close:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.1);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ডার্ক মোড ফিক্স */
    .dark .alert-container {
        background: rgba(16, 185, 129, 0.08);
        border-color: rgba(16, 185, 129, 0.15);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('status-alert');
        const closeBtn = document.getElementById('close-alert');

        if (alert && closeBtn) {
            // ক্লোজ বাটন
            closeBtn.addEventListener('click', function() {
                alert.style.animation = 'slideUp 0.3s ease forwards';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            });

            // ৫ সেকেন্ড পর অটো-ক্লোজ
            setTimeout(() => {
                if (alert) {
                    alert.style.animation = 'slideUp 0.3s ease forwards';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }
            }, 5000);
        }
    });

    // স্লাইড আপ অ্যানিমেশন (ক্লোজের জন্য)
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideUp {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-20px); }
        }
    `;
    document.head.appendChild(style);
</script>