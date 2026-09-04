<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $tickets = Ticket::where('user_id', $userId);

        $data = [
            'totalTickets' => (clone $tickets)->count(),
            'openTickets' => (clone $tickets)->where('status', 'open')->count(),
            'resolvedTickets' => (clone $tickets)->where('status', 'resolved')->count(),
            'totalPayments' => Payment::where('user_id', $userId)->where('status', 'verified')->sum('amount'),
            'recentTickets' => (clone $tickets)->latest()->limit(5)->get(),
        ];
        
        return view('pages.dashboard.student.dashboard', $data);
    }
}
