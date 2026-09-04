<?php

namespace App\Http\Controllers\ITStaff;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('assigned_to', auth()->id());

        $data = [
            'totalTickets' => (clone $tickets)->count(),
            'openTickets' => (clone $tickets)->whereIn('status', ['open', 'assigned'])->count(),
            'inProgressTickets' => (clone $tickets)->where('status', 'in-progress')->count(),
            'resolvedTickets' => (clone $tickets)->where('status', 'resolved')->count(),
            'recentTickets' => (clone $tickets)->latest()->limit(5)->get(),
        ];
        
        return view('pages.dashboard.it-staff.dashboard', $data);
    }
}
