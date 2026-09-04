{{-- resources/views/components/navbar.blade.php --}}

<nav class="navbar-modern">
    <div class="navbar-container">
        {{-- Left: Brand --}}
        <div class="navbar-left">
            @if (! request()->routeIs('home'))
                <button id="sidebarToggle" class="navbar-toggle" aria-label="Toggle Sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            @endif

            <a href="{{ route('home') }}" class="navbar-brand">
                <span class="brand-icon">G</span>
                <span class="brand-text">GUB<span>.</span>IT</span>
            </a>
        </div>

        {{-- Right: Actions --}}
        <div class="navbar-right">
            @auth
                @include('components.shared.notification-bell')

                {{-- Profile Dropdown --}}
                <div class="profile-dropdown">
                    <button id="profileMenuBtn" class="profile-btn" aria-label="Profile Menu">
                        <span class="profile-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <svg class="profile-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div id="profileMenu" class="profile-menu">
                        <div class="menu-header">
                            <div class="menu-avatar">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="menu-user">
                                <div class="menu-name">{{ Auth::user()->name }}</div>
                                <div class="menu-email">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="menu-divider"></div>
                        <a href="{{ route('profile.edit') }}" class="menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            Profile
                        </a>
                        <a href="{{ route('dashboard') }}" class="menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                            Dashboard
                        </a>
                        <div class="menu-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="menu-item logout">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="navbar-btn navbar-btn-ghost">Log in</a>
                <a href="{{ route('register') }}" class="navbar-btn navbar-btn-primary">Get Started</a>
            @endauth
        </div>
    </div>
</nav>

<style>
    /* ----- ন্যাভবার স্টাইল ----- */
    .navbar-modern {
        position: sticky;
        top: 0;
        z-index: 50;
        padding: 0.75rem 1.5rem;
        background: rgba(10, 10, 15, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .navbar-container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    /* ----- লেফট সেকশন ----- */
    .navbar-left {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .navbar-toggle {
        display: none;
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.6);
        padding: 0.5rem;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .navbar-toggle:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
    }

    .navbar-toggle svg {
        width: 24px;
        height: 24px;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.02);
    }

    .brand-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        border-radius: 10px;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.125rem;
        color: #fff;
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.25);
    }

    .brand-text {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.02em;
    }

    .brand-text span {
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* ----- রাইট সেকশন ----- */
    .navbar-right {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* ----- নোটিফিকেশন ----- */
    .navbar-notification {
        position: relative;
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.5);
        padding: 0.5rem;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .navbar-notification:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
    }

    .navbar-notification svg {
        width: 22px;
        height: 22px;
    }

    .notification-badge {
        position: absolute;
        top: 2px;
        right: 2px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 18px;
        height: 18px;
        padding: 0 4px;
        background: #FF6B35;
        border-radius: 9999px;
        font-size: 0.65rem;
        font-weight: 600;
        color: #fff;
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.3);
    }

    /* ----- প্রোফাইল ড্রপডাউন ----- */
    .profile-dropdown {
        position: relative;
    }

    .profile-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: none;
        border: none;
        padding: 0.375rem 0.75rem 0.375rem 0.375rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .profile-btn:hover {
        background: rgba(255, 255, 255, 0.04);
        border-color: rgba(255, 255, 255, 0.1);
    }

    .profile-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(255, 143, 101, 0.2));
        border-radius: 50%;
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.875rem;
        font-weight: 600;
        color: #FF8F65;
        text-transform: uppercase;
    }

    .profile-name {
        font-size: 0.85rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
        display: none;
    }

    .profile-chevron {
        width: 16px;
        height: 16px;
        color: rgba(255, 255, 255, 0.3);
        transition: transform 0.3s ease;
    }

    .profile-btn[aria-expanded="true"] .profile-chevron {
        transform: rotate(180deg);
    }

    /* ----- ড্রপডাউন মেনু ----- */
    .profile-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 0.5rem);
        min-width: 240px;
        padding: 0.75rem;
        background: rgba(26, 26, 46, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px);
        transition: all 0.3s ease;
        z-index: 100;
    }

    .profile-menu.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .menu-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 0.25rem 0.75rem;
    }

    .menu-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(255, 143, 101, 0.2));
        border-radius: 50%;
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1rem;
        font-weight: 600;
        color: #FF8F65;
        text-transform: uppercase;
    }

    .menu-user {
        flex: 1;
        overflow: hidden;
    }

    .menu-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .menu-email {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.4);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .menu-divider {
        height: 1px;
        margin: 0.5rem 0;
        background: rgba(255, 255, 255, 0.06);
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0.75rem;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
    }

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
    }

    .menu-item svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
        opacity: 0.6;
    }

    .menu-item.logout {
        color: #f87171;
    }

    .menu-item.logout:hover {
        background: rgba(239, 68, 68, 0.08);
        color: #f87171;
    }

    /* ----- বাটন ----- */
    .navbar-btn {
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .navbar-btn-ghost {
        color: rgba(255, 255, 255, 0.6);
        background: transparent;
    }

    .navbar-btn-ghost:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    .navbar-btn-primary {
        color: #fff;
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        box-shadow: 0 4px 16px rgba(255, 107, 53, 0.25);
    }

    .navbar-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.35);
    }

    /* ----- রেসপন্সিভ ----- */
    @media (min-width: 768px) {
        .profile-name {
            display: inline;
        }
    }

    @media (max-width: 768px) {
        .navbar-modern {
            padding: 0.5rem 1rem;
        }

        .navbar-toggle {
            display: block;
        }

        .brand-text {
            font-size: 1rem;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }

        .profile-name {
            display: none;
        }

        .profile-btn {
            padding: 0.25rem;
        }

        .profile-menu {
            right: -1rem;
            min-width: 200px;
        }

        .navbar-btn {
            padding: 0.375rem 0.875rem;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .navbar-right {
            gap: 0.375rem;
        }

        .notification-badge {
            min-width: 14px;
            height: 14px;
            font-size: 0.55rem;
        }

        .navbar-btn-primary {
            padding: 0.375rem 0.75rem;
        }
    }
</style>

<script>
    // Profile Dropdown Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const profileBtn = document.getElementById('profileMenuBtn');
        const profileMenu = document.getElementById('profileMenu');

        sidebarToggle?.addEventListener('click', function() {
            sidebar?.classList.toggle('open');
        });

        if (profileBtn && profileMenu) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = profileMenu.classList.contains('open');
                profileMenu.classList.toggle('open');
                profileBtn.setAttribute('aria-expanded', !isOpen);
            });

            // Click outside to close
            document.addEventListener('click', function(e) {
                if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.remove('open');
                    profileBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
</script>