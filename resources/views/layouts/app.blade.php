<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GUB IT Service') }} - @yield('title', 'Dashboard')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .app-main {
            margin-left: 0;
        }

        .app-main.has-sidebar {
            margin-left: 280px;
        }

        @media (max-width: 768px) {
            .app-main.has-sidebar {
                margin-left: 0;
            }
        }
    </style>

</head>
<body class="font-sans antialiased bg-[#0A0A0F] min-h-screen">
    @php($showSidebar = ! request()->routeIs('home'))

    <div class="flex min-h-screen">
        {{-- ================= SIDEBAR ================= --}}
        @if ($showSidebar)
        @include('components.shared.sidebar')
        @if (false)
        <aside class="sidebar-modern" id="sidebar">
            {{-- Brand --}}
            <div class="sidebar-brand">
                <a href="{{ route('home') }}" class="brand-link">
                    <span class="brand-icon">G</span>
                    <span class="brand-text">GUB<span>.</span>IT</span>
                </a>
                <button class="sidebar-close" id="sidebarClose" aria-label="Close Sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- User Profile --}}
            @auth
                <div class="sidebar-user">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">{{ Auth::user()->roles?->first()?->name ?? 'User' }}</div>
                    </div>
                </div>
            @endauth

            {{-- Navigation --}}
            <nav class="sidebar-nav">
                <ul class="nav-list">
                    {{-- Super Admin --}}
                    @role('super-admin')
                        @if (Route::has('admin.dashboard'))
                            <li class="nav-section">Management</li>
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Dashboard Icon --></span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('admin.tickets.index'))<li>
                            <a href="{{ route('admin.tickets.index') }}" class="nav-link {{ request()->routeIs('admin.tickets.*') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Ticket Icon --></span>
                                <span class="nav-text">Tickets</span>
                                <span class="nav-badge">{{ \App\Models\Ticket::where('status', 'open')->count() }}</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('admin.equipments.index'))<li>
                            <a href="{{ route('admin.equipments.index') }}" class="nav-link {{ request()->routeIs('admin.equipments.*') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Equipment Icon --></span>
                                <span class="nav-text">Equipment</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('admin.users.index'))<li>
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Users Icon --></span>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('admin.reports'))<li>
                            <a href="{{ route('admin.reports') }}" class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Reports Icon --></span>
                                <span class="nav-text">Reports</span>
                            </a>
                        </li>
                        @endif
                    @endrole

                    {{-- IT Staff --}}
                    @role('it-staff')
                        @if (Route::has('it-staff.dashboard'))<li class="nav-section">My Work</li>
                        <li>
                            <a href="{{ route('it-staff.dashboard') }}" class="nav-link {{ request()->routeIs('it-staff.dashboard') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Dashboard Icon --></span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('it-staff.tickets.index'))<li>
                            <a href="{{ route('it-staff.tickets.index') }}" class="nav-link {{ request()->routeIs('it-staff.tickets.*') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Ticket Icon --></span>
                                <span class="nav-text">Assigned Tickets</span>
                                <span class="nav-badge">{{ auth()->user()->assignedTickets()->where('status', '!=', 'resolved')->count() }}</span>
                            </a>
                        </li>
                        @endif
                    @endrole

                    {{-- Student --}}
                    @role('student')
                        @if (Route::has('student.dashboard'))<li class="nav-section">My Dashboard</li>
                        <li>
                            <a href="{{ route('student.dashboard') }}" class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Dashboard Icon --></span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('student.tickets.index'))<li>
                            <a href="{{ route('student.tickets.index') }}" class="nav-link {{ request()->routeIs('student.tickets.*') ? 'active' : '' }}">
                                <span class="nav-icon"><!-- Ticket Icon --></span>
                                <span class="nav-text">My Tickets</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('student.tickets.create'))<li>
                            <a href="{{ route('student.tickets.create') }}" class="nav-link">
                                <span class="nav-icon"><!-- Plus Icon --></span>
                                <span class="nav-text">New Ticket</span>
                            </a>
                        </li>
                        @endif
                        @if (Route::has('student.payments.create'))<li>
                            <a href="{{ route('student.payments.create') }}" class="nav-link">
                                <span class="nav-icon"><!-- Payment Icon --></span>
                                <span class="nav-text">Payment</span>
                            </a>
                        </li>
                        @endif
                    @endrole

                    {{-- Logout --}}
                    <li class="nav-section">Account</li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link logout">
                                <span class="nav-icon"><!-- Logout Icon --></span>
                                <span class="nav-text">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
        @endif
        @endif

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="app-main flex-1 flex flex-col min-h-screen {{ $showSidebar ? 'has-sidebar' : '' }} transition-all duration-300">
            {{-- Navbar --}}
            @include('components.shared.navbar')

            {{-- Page Content --}}
            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
                {{-- Breadcrumb --}}
                <x-breadcrumb :title="View::hasSection('title') ? View::getSection('title') : 'Dashboard'" />

                {{-- Page Content --}}
                <div class="page-content">
                    @yield('content')
                </div>
            </main>

            {{-- Footer --}}
            @include('components.shared.footer')
        </div>
    </div>

    {{-- Sidebar Overlay (Mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- Scripts --}}
    <script>
        // Sidebar Toggle for Mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const closeBtn = document.getElementById('sidebarClose');
            const overlay = document.getElementById('sidebarOverlay');

            function openSidebar() {
                sidebar?.classList.add('open');
                overlay?.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar?.classList.remove('open');
                overlay?.classList.remove('active');
                document.body.style.overflow = '';
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (sidebar?.classList.contains('open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            // Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar?.classList.contains('open')) {
                    closeSidebar();
                }
            });

            // Close on resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && sidebar?.classList.contains('open')) {
                    closeSidebar();
                }
            });
        });
    </script>

    @stack('styles')
    @stack('scripts')
</body>
</html>