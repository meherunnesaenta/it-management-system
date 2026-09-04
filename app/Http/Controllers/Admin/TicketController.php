<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['user', 'assignedTo'])->latest()->paginate(10);
        return view('pages.dashboard.admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('pages.dashboard.admin.tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high,urgent'
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $validated['subject'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'status' => 'open'
        ]);

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Ticket created successfully!');
    }

    public function show(Ticket $ticket)
    {
        return view('pages.dashboard.admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->only(['status', 'priority', 'assigned_to']));
        return redirect()->back()->with('success', 'Ticket updated!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')
            ->with('success', 'Ticket deleted!');
    }
}
