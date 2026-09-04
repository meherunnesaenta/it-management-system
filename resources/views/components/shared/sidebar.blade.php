<div class="drawer-side z-40">
    <label for="drawer-toggle" aria-label="close sidebar" class="drawer-overlay"></label>
    <aside class="bg-base-100 w-72 min-h-full border-r border-base-300 p-4">
        <ul class="menu gap-1">
            @role('super-admin')
                <li><a href="{{ route('admin.dashboard') }}" class="font-medium {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> ড্যাশবোর্ড
                </a></li>
                <li><a href="{{ route('admin.tickets.index') }}" class="font-medium {{ request()->routeIs('admin.tickets.*') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt"></i> টিকেটসমূহ
                </a></li>
                <li><a href="{{ route('admin.equipments.index') }}" class="font-medium {{ request()->routeIs('admin.equipments.*') ? 'active' : '' }}">
                    <i class="fas fa-server"></i> ইকুইপমেন্ট
                </a></li>
                <li><a href="{{ route('admin.users.index') }}" class="font-medium {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> ইউজার ম্যানেজ
                </a></li>
                <li><a href="{{ route('admin.reports') }}" class="font-medium {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i> রিপোর্ট
                </a></li>
            @endrole

            @role('it-staff')
                <li><a href="{{ route('it-staff.dashboard') }}" class="font-medium {{ request()->routeIs('it-staff.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> ড্যাশবোর্ড
                </a></li>
                <li><a href="{{ route('it-staff.tickets.index') }}" class="font-medium {{ request()->routeIs('it-staff.tickets.*') ? 'active' : '' }}">
                    <i class="fas fa-tasks"></i> অ্যাসাইনড টিকেট
                </a></li>
            @endrole

            @role('student')
                <li><a href="{{ route('student.dashboard') }}" class="font-medium {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> ড্যাশবোর্ড
                </a></li>
                <li><a href="{{ route('student.tickets.index') }}" class="font-medium {{ request()->routeIs('student.tickets.*') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt"></i> আমার টিকেট
                </a></li>
                <li><a href="{{ route('student.tickets.create') }}" class="font-medium">
                    <i class="fas fa-plus-circle"></i> নতুন টিকেট
                </a></li>
                <li><a href="{{ route('student.payments.create') }}" class="font-medium">
                    <i class="fas fa-credit-card"></i> পেমেন্ট
                </a></li>
            @endrole
        </ul>
    </aside>
</div>
