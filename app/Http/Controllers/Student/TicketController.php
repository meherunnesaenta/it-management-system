<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->latest()->paginate(10);
        return view('pages.dashboard.student.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('pages.dashboard.student.tickets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'open';
        $data['priority'] = $request->input('priority', 'medium');

        Ticket::create($data);
        return redirect()->route('student.tickets.index')->with('success', 'Ticket submitted');
    }

    public function show(Ticket $ticket)
    {
        return view('pages.dashboard.student.tickets.show', compact('ticket'));
    }
}
