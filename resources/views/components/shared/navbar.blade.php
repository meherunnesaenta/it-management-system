<nav class="navbar bg-base-100 shadow-sm px-4">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl font-bold">
            <span class="text-primary">GUB</span> IT Service
        </a>
    </div>
    <div class="flex-none gap-2">
        @auth
            {{-- নোটিফিকেশন --}}
            @include('components.shared.notification-bell')
            
            {{-- ড্রপডাউন --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" alt="Profile" />
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-50 mt-3 w-52 p-2 shadow-xl">
                    <li class="menu-title"><span>{{ Auth::user()->name }}</span></li>
                    <li><a href="{{ route('profile.edit') }}">প্রোফাইল</a></li>
                    <li><a href="{{ route('dashboard') }}">ড্যাশবোর্ড</a></li>
                    <li><hr class="my-1" /></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-error">লগআউট</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost">লগইন</a>
            <a href="{{ route('register') }}" class="btn btn-primary">রেজিস্ট্রেশন</a>
        @endauth
    </div>
</nav>
