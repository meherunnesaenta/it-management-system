@extends('layouts.app')

@section('title', 'User Management')
@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-white font-space">User Management</h1>
        <p class="text-white/40 text-sm mt-1">View registered users and their roles</p>
    </div>

    <div class="overflow-hidden bg-white/5 border border-white/10 rounded-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-white/70">
                <thead class="border-b border-white/10 text-xs uppercase text-white/40">
                    <tr><th class="px-6 py-4">Name</th><th class="px-6 py-4">Email</th><th class="px-6 py-4">Role</th><th class="px-6 py-4">Joined</th></tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($users as $user)
                        <tr><td class="px-6 py-4 font-medium text-white">{{ $user->name }}</td><td class="px-6 py-4">{{ $user->email }}</td><td class="px-6 py-4">{{ $user->roles->pluck('name')->join(', ') ?: 'User' }}</td><td class="px-6 py-4">{{ $user->created_at?->format('M d, Y') }}</td></tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-8 text-center">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6">{{ $users->links() }}</div>
    </div>
</div>
@endsection
