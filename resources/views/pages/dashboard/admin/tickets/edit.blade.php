@extends('layouts.app')

@section('title', 'Edit Ticket')
@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div><h1 class="text-2xl font-bold text-white font-space">Edit Ticket</h1><p class="mt-1 text-sm text-white/40">Update ticket status and priority</p></div>
    <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}" class="space-y-5 rounded-2xl border border-white/10 bg-white/5 p-6 sm:p-8">
        @csrf @method('PATCH')
        <div><label class="mb-2 block text-sm text-white/70">Subject</label><p class="rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white/70">{{ $ticket->subject }}</p></div>
        <div><label for="status" class="mb-2 block text-sm text-white/70">Status</label><select id="status" name="status" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white"><option value="open" @selected($ticket->status === 'open')>Open</option><option value="assigned" @selected($ticket->status === 'assigned')>Assigned</option><option value="in-progress" @selected($ticket->status === 'in-progress')>In Progress</option><option value="resolved" @selected($ticket->status === 'resolved')>Resolved</option><option value="closed" @selected($ticket->status === 'closed')>Closed</option></select></div>
        <div><label for="priority" class="mb-2 block text-sm text-white/70">Priority</label><select id="priority" name="priority" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white"><option value="low" @selected($ticket->priority === 'low')>Low</option><option value="medium" @selected($ticket->priority === 'medium')>Medium</option><option value="high" @selected($ticket->priority === 'high')>High</option><option value="urgent" @selected($ticket->priority === 'urgent')>Urgent</option></select></div>
        <div class="flex justify-end gap-3"><a href="{{ route('admin.tickets.show', $ticket) }}" class="rounded-xl bg-white/5 px-5 py-3 text-sm text-white/70">Cancel</a><button class="rounded-xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white">Update Ticket</button></div>
    </form>
</div>
@endsection
