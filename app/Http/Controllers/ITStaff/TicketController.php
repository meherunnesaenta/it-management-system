<?php

namespace App\Http\Controllers\ITStaff;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('assigned_to', auth()->id())->latest()->paginate(10);
        return view('pages.dashboard.it-staff.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('pages.dashboard.it-staff.tickets.show', compact('ticket'));
    }

    public function assign(Request $request, Ticket $ticket)
    {
        $ticket->assigned_to = auth()->id();
        $ticket->status = 'assigned';
        $ticket->save();
        return redirect()->back()->with('success', 'Assigned to you');
    }

    public function resolve(Request $request, Ticket $ticket)
    {
        $ticket->status = 'resolved';
        $ticket->resolved_at = now();
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket resolved');
    }
}
