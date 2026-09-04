@php
    $notifications = auth()->user()->notifications()->latest()->limit(8)->get();
    $unreadCount = auth()->user()->unreadNotifications()->count();
@endphp

<div class="notification-wrapper">
    <button id="notificationBtn" class="notification-btn" aria-label="Notifications" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.25 18.75h-4.5m5.25-3.75h-6.75a2.25 2.25 0 0 1-2.25-2.25V9a5.25 5.25 0 0 1 10.5 0v3.75a2.25 2.25 0 0 1-2.25 2.25Z" /></svg>
        @if ($unreadCount > 0)<span class="notification-count">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>@endif
    </button>

    <div id="notificationDropdown" class="notification-dropdown" hidden>
        <div class="dropdown-header"><h4>Notifications</h4><form method="POST" action="{{ route('notifications.read-all') }}">@csrf<button type="submit">Mark all read</button></form></div>
        <div class="dropdown-body">
            @forelse ($notifications as $notification)
                <a href="{{ $notification->data['url'] ?? '#' }}" class="notification-item {{ $notification->read_at ? '' : 'unread' }}">
                    <span class="notification-icon">!</span><span class="notification-content"><strong>{{ $notification->data['message'] ?? 'New notification' }}</strong><small>{{ $notification->created_at->diffForHumans() }}</small></span>
                </a>
            @empty
                <p class="notification-empty">No notifications yet.</p>
            @endforelse
        </div>
    </div>
</div>

<style>
.notification-wrapper{position:relative}.notification-btn{position:relative;display:grid;place-items:center;padding:.5rem;color:rgba(255,255,255,.6);background:none;border:0;border-radius:10px;cursor:pointer}.notification-btn:hover{color:#fff;background:rgba(255,255,255,.06)}.notification-btn svg{width:22px;height:22px}.notification-count{position:absolute;top:0;right:0;min-width:18px;padding:2px 4px;border-radius:999px;background:#ff6b35;color:#fff;font-size:10px;text-align:center}.notification-dropdown{position:absolute;right:0;top:calc(100% + .5rem);width:min(360px,calc(100vw - 2rem));overflow:hidden;background:#1a1a2e;border:1px solid rgba(255,255,255,.1);border-radius:14px;box-shadow:0 18px 45px rgba(0,0,0,.45);z-index:110}.notification-dropdown[hidden]{display:none}.dropdown-header{display:flex;justify-content:space-between;align-items:center;padding:1rem;border-bottom:1px solid rgba(255,255,255,.08)}.dropdown-header h4{margin:0;color:#fff}.dropdown-header button{color:#ff8f65;background:none;border:0;cursor:pointer;font-size:.75rem}.dropdown-body{max-height:360px;overflow:auto}.notification-item{display:flex;gap:.75rem;padding:1rem;color:rgba(255,255,255,.75);text-decoration:none;border-bottom:1px solid rgba(255,255,255,.05)}.notification-item:hover,.notification-item.unread{background:rgba(255,107,53,.08)}.notification-icon{display:grid;place-items:center;width:28px;height:28px;flex:none;border-radius:50%;color:#fff;background:#ff6b35}.notification-content{display:flex;flex-direction:column;gap:.25rem;font-size:.8rem}.notification-content small{color:rgba(255,255,255,.4)}.notification-empty{padding:1.5rem;color:rgba(255,255,255,.45);text-align:center}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){const b=document.getElementById('notificationBtn'),d=document.getElementById('notificationDropdown');if(!b||!d)return;b.addEventListener('click',function(e){e.stopPropagation();const open=!d.hidden;d.hidden=open;b.setAttribute('aria-expanded',String(!open));});document.addEventListener('click',function(e){if(!b.contains(e.target)&&!d.contains(e.target)){d.hidden=true;b.setAttribute('aria-expanded','false');}});});
</script>
