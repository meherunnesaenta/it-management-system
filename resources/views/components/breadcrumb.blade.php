{{-- resources/views/components/breadcrumb.blade.php --}}
@props(['title' => 'Dashboard'])

<nav class="breadcrumb-modern" aria-label="Breadcrumb">
    <div class="breadcrumb-inner">
        <ol class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="breadcrumb-link">
                    <svg class="breadcrumb-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span>Home</span>
                </a>
            </li>
            
            <li class="breadcrumb-separator" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            
            <li class="breadcrumb-item active">
                <span class="breadcrumb-current">{{ $title }}</span>
            </li>
        </ol>
    </div>
</nav>

<style>
    /* ----- ব্রেডক্রাম্ব স্টাইল ----- */
    .breadcrumb-modern {
        padding: 0.5rem 0;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    }

    .breadcrumb-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
        font-size: 0.8rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.35);
        transition: color 0.2s ease;
    }

    .breadcrumb-item.active {
        color: #fff;
        font-weight: 600;
    }

    .breadcrumb-link {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        color: rgba(255, 255, 255, 0.4);
        text-decoration: none;
        transition: all 0.2s ease;
        padding: 0.2rem 0.4rem;
        border-radius: 6px;
    }

    .breadcrumb-link:hover {
        color: #FF6B35;
        background: rgba(255, 107, 53, 0.06);
        text-decoration: none;
    }

    .breadcrumb-icon {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

    .breadcrumb-separator {
        display: flex;
        align-items: center;
        color: rgba(255, 255, 255, 0.1);
        margin: 0 0.125rem;
    }

    .breadcrumb-separator svg {
        width: 14px;
        height: 14px;
    }

    .breadcrumb-current {
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 600;
    }

    /* ----- পেজ টাইটেল (ঐচ্ছিক) ----- */
    .breadcrumb-page-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.01em;
    }

    .breadcrumb-page-title span {
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* ----- রেসপন্সিভ ----- */
    @media (max-width: 640px) {
        .breadcrumb-modern {
            padding: 0.375rem 0;
            margin-bottom: 1rem;
        }
        .breadcrumb-item {
            font-size: 0.7rem;
        }
        .breadcrumb-icon,
        .breadcrumb-separator svg {
            width: 12px;
            height: 12px;
        }
        .breadcrumb-page-title {
            font-size: 0.875rem;
        }
    }
</style>