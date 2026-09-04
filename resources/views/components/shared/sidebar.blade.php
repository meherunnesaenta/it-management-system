<aside class="sidebar-modern" id="sidebar">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link">
            <span class="brand-icon">G</span>
            <span class="brand-text">GUB<span>.</span>IT</span>
        </a>
        <button class="sidebar-close" id="sidebarClose" aria-label="Close Sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>
    </div>

    @auth
        <div class="sidebar-user">
            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">
                    @role('super-admin') Super Admin @endrole
                    @role('it-staff') IT Staff @endrole
                    @role('student') Student @endrole
                    @if (! Auth::user()->hasAnyRole(['super-admin', 'it-staff', 'student'])) User @endif
                </div>
            </div>
        </div>
    @endauth

    <nav class="sidebar-nav">
        <ul class="nav-list">
            @role('super-admin')
                <li class="nav-section">Management</li>
                @foreach ([
                    ['admin.dashboard', 'Dashboard'],
                    ['admin.tickets.index', 'Tickets'],
                    ['admin.equipments.index', 'Equipment'],
                    ['admin.users.index', 'Users'],
                    ['admin.reports', 'Reports'],
                ] as [$routeName, $label])
                    @if (Route::has($routeName))
                        <li><a href="{{ route($routeName) }}" class="nav-link {{ request()->routeIs($routeName === 'admin.tickets.index' ? 'admin.tickets.*' : $routeName) ? 'active' : '' }}"><span class="nav-icon">&#8226;</span><span class="nav-text">{{ $label }}</span></a></li>
                    @endif
                @endforeach
            @endrole

            @role('it-staff')
                <li class="nav-section">My Work</li>
                @foreach ([['it-staff.dashboard', 'Dashboard'], ['it-staff.tickets.index', 'Assigned Tickets']] as [$routeName, $label])
                    @if (Route::has($routeName))
                        <li><a href="{{ route($routeName) }}" class="nav-link {{ request()->routeIs($routeName === 'it-staff.tickets.index' ? 'it-staff.tickets.*' : $routeName) ? 'active' : '' }}"><span class="nav-icon">&#8226;</span><span class="nav-text">{{ $label }}</span></a></li>
                    @endif
                @endforeach
            @endrole

            @role('student')
                <li class="nav-section">My Dashboard</li>
                @foreach ([
                    ['student.dashboard', 'Dashboard'],
                    ['student.tickets.index', 'My Tickets'],
                    ['student.tickets.create', 'New Ticket'],
                    ['student.payments.create', 'Payment'],
                ] as [$routeName, $label])
                    @if (Route::has($routeName))
                        <li><a href="{{ route($routeName) }}" class="nav-link {{ request()->routeIs($routeName === 'student.tickets.index' ? 'student.tickets.*' : $routeName) ? 'active' : '' }}"><span class="nav-icon">&#8226;</span><span class="nav-text">{{ $label }}</span></a></li>
                    @endif
                @endforeach
            @endrole

            <li class="nav-section">Account</li>
            @auth
                <li><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="nav-link logout"><span class="nav-icon">&#8226;</span><span class="nav-text">Logout</span></button></form></li>
            @endauth
        </ul>
    </nav>
</aside>

<style>
    .sidebar-modern { position: fixed; inset: 0 auto 0 0; width: 280px; height: 100vh; padding: 1.5rem 1rem; display: flex; flex-direction: column; overflow-y: auto; color: #fff; background: rgba(10, 10, 15, .94); border-right: 1px solid rgba(255,255,255,.08); z-index: 100; }
    .sidebar-brand, .sidebar-user, .nav-link { display: flex; align-items: center; }
    .sidebar-brand { justify-content: space-between; padding: 0 .5rem 1.5rem; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,.08); }
    .brand-link { display: flex; align-items: center; gap: .625rem; color: #fff; text-decoration: none; }
    .brand-icon { display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 12px; background: linear-gradient(135deg,#ff6b35,#ff8f65); font-weight: 700; }
    .brand-text { font-size: 1.25rem; font-weight: 700; }.brand-text span { color: #ff8f65; }
    .sidebar-close { display: none; padding: .25rem; color: #fff; background: none; border: 0; cursor: pointer; }.sidebar-close svg { width: 24px; height: 24px; }
    .sidebar-user { gap: .75rem; padding: .75rem .5rem; margin-bottom: 1.5rem; background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.06); border-radius: 14px; }
    .user-avatar { display: grid; place-items: center; width: 40px; height: 40px; flex-shrink: 0; border-radius: 50%; color: #ff8f65; background: rgba(255,107,53,.18); }.user-info { min-width: 0; }.user-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: .85rem; font-weight: 600; }.user-role { color: rgba(255,255,255,.4); font-size: .65rem; text-transform: uppercase; }
    .sidebar-nav { flex: 1; }.nav-list { display: flex; flex-direction: column; gap: .125rem; padding: 0; margin: 0; list-style: none; }.nav-section { padding: .75rem .5rem .25rem; color: rgba(255,255,255,.35); font-size: .6rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }.nav-link { width: 100%; gap: .75rem; padding: .65rem .75rem; color: rgba(255,255,255,.6); background: none; border: 0; border-radius: 12px; text-align: left; text-decoration: none; cursor: pointer; }.nav-link:hover, .nav-link.active { color: #ff8f65; background: rgba(255,107,53,.1); }.nav-icon { width: 20px; color: #ff6b35; }.nav-text { flex: 1; }.logout { color: rgba(248,113,113,.8); }
    @media (max-width: 768px) { .sidebar-modern { transform: translateX(-100%); transition: transform .3s ease; }.sidebar-modern.open { transform: translateX(0); }.sidebar-close { display: block; } }
</style>
