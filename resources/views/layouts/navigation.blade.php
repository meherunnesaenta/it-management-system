{{-- resources/views/components/shared/navbar.blade.php --}}

<nav x-data="{ open: false }" class="navbar-modern">
    <div class="navbar-container">
        {{-- Left: Brand & Toggle --}}
        <div class="navbar-left">
            {{-- Mobile Toggle --}}
            <button 
                id="sidebarToggle" 
                class="navbar-toggle" 
                aria-label="Toggle Sidebar"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            {{-- Brand --}}
            <a href="{{ route('home') }}" class="navbar-brand">
                <span class="brand-icon">G</span>
                <span class="brand-text">GUB<span>.</span>IT</span>
            </a>
        </div>

        {{-- Right: Actions --}}
        <div class="navbar-right">
            {{-- Notification Bell --}}
            <button class="navbar-notification" aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                <span class="notification-badge">3</span>
            </button>

            {{-- Profile Dropdown --}}
            @auth
                <div class="profile-dropdown">
                    <button 
                        id="profileMenuBtn" 
                        class="profile-btn" 
                        aria-label="Profile Menu"
                        @click="open = !open"
                    >
                        <span class="profile-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <svg class="profile-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div 
                        id="profileMenu" 
                        class="profile-menu"
                        x-show="open"
                        @click.away="open = false"
                        @keydown.escape.window="open = false"
                        x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                    >
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
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </a>

                        <a href="{{ route('dashboard') }}" class="menu-item">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            Dashboard
                        </a>

                        <div class="menu-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="menu-item logout">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
    /* ----- নাভবার স্টাইল ----- */
    .navbar-modern {
        position: sticky;
        top: 0;
        z-index: 50;
        padding: 0.75rem 1.5rem;
        background: rgba(10, 10, 15, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
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
        color: rgba(255, 255, 255, 0.5);
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
        color: rgba(255, 255, 255, 0.4);
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
        top: 0;
        right: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 18px;
        height: 18px;
        padding: 0 4px;
        background: #FF6B35;
        border-radius: 9999px;
        font-size: 0.6rem;
        font-weight: 700;
        color: #fff;
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.3);
        transform: translate(2px, -2px);
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
        padding: 0.25rem 0.75rem 0.25rem 0.25rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.04);
    }

    .profile-btn:hover {
        background: rgba(255, 255, 255, 0.04);
        border-color: rgba(255, 255, 255, 0.08);
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
        color: rgba(255, 255, 255, 0.7);
        display: none;
    }

    .profile-chevron {
        width: 16px;
        height: 16px;
        color: rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease;
    }

    .profile-btn[aria-expanded="true"] .profile-chevron {
        transform: rotate(180deg);
    }

    @media (min-width: 768px) {
        .profile-name {
            display: inline;
        }
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
        border: 1px solid rgba(255, 255, 255, 0.04);
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        z-index: 100;
    }

    [x-cloak] {
        display: none !important;
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
        color: rgba(255, 255, 255, 0.35);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .menu-divider {
        height: 1px;
        margin: 0.5rem 0;
        background: rgba(255, 255, 255, 0.04);
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0.75rem;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.6);
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
        opacity: 0.5;
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
        color: rgba(255, 255, 255, 0.5);
        background: transparent;
    }

    .navbar-btn-ghost:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    .navbar-btn-primary {
        color: #fff;
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        box-shadow: 0 4px 16px rgba(255, 107, 53, 0.2);
    }

    .navbar-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.3);
    }

    /* ----- রেসপন্সিভ ----- */
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
    // Profile Dropdown Toggle (Alpine.js manages this now)
    // Just ensure Alpine.js is loaded in your layout
</script>