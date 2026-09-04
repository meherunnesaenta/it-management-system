{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    {{-- Meta, Fonts, Styles --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GUB IT Service') }} - @yield('title', 'Dashboard')</title>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#0A0A0F]">

    <div class="min-h-screen flex">
        {{-- SIDEBAR --}}
        <aside class="sidebar">
            {{-- Logo --}}
            <div class="sidebar-brand">
                <a href="{{ route('home') }}" class="logo">
                    <div class="logo-icon">G</div>
                    <div class="logo-text">GUB<span>.</span></div>
                </a>
            </div>

            {{-- User Info --}}
            @auth
                <div class="sidebar-user">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">{{ Auth::user()->roles?->first()?->name ?? 'User' }}</div>
                    </div>
                </div>
            @endauth

            {{-- Navigation --}}
            <nav class="sidebar-nav">
                @role('super-admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg>...</svg> Dashboard
                    </a>
                    <a href="{{ route('admin.tickets.index') }}" class="nav-link {{ request()->routeIs('admin.tickets.*') ? 'active' : '' }}">
                        <svg>...</svg> Tickets
                    </a>
                    <a href="{{ route('admin.equipments.index') }}" class="nav-link {{ request()->routeIs('admin.equipments.*') ? 'active' : '' }}">
                        <svg>...</svg> Equipment
                    </a>
                @endrole

                @role('student')
                    <a href="{{ route('student.dashboard') }}" class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                        <svg>...</svg> Dashboard
                    </a>
                    <a href="{{ route('student.tickets.index') }}" class="nav-link {{ request()->routeIs('student.tickets.*') ? 'active' : '' }}">
                        <svg>...</svg> My Tickets
                    </a>
                    <a href="{{ route('student.tickets.create') }}" class="nav-link">
                        <svg>...</svg> New Ticket
                    </a>
                @endrole

                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="nav-link logout">
                        <svg>...</svg> Logout
                    </button>
                </form>
            </nav>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="main-content">
            {{-- Top Navbar --}}
            <header class="top-navbar">
                <div class="navbar-left">
                    <button id="sidebarToggle" class="navbar-toggle">
                        <svg>...</svg>
                    </button>
                    <div class="navbar-title">
                        @yield('page-title', 'Dashboard')
                    </div>
                </div>
                <div class="navbar-right">
                    {{-- Notification Bell --}}
                    <button class="navbar-notification">
                        <svg>...</svg>
                    </button>
                    {{-- Profile Dropdown --}}
                    <div class="profile-dropdown">
                        <button class="profile-btn">
                            <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </button>
                    </div>
                </div>
            </header>

            {{-- Breadcrumb --}}
            <x-breadcrumb :title="View::hasSection('title') ? View::getSection('title') : 'Dashboard'" />

            {{-- Page Content --}}
            <div class="page-content">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Scripts --}}
    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('open');
        });
    </script>
    @stack('scripts')
</body>
</html>