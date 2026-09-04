<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalTickets' => Ticket::count(),
            'openTickets' => Ticket::where('status', 'open')->count(),
            'inProgressTickets' => Ticket::where('status', 'in-progress')->count(),
            'resolvedTickets' => Ticket::where('status', 'resolved')->count(),
            'totalEquipments' => Equipment::count(),
            'totalUsers' => User::count(),
            'totalPayments' => Payment::where('status', 'verified')->sum('amount'),
            'recentTickets' => Ticket::with('user')->latest()->limit(5)->get(),
        ];
        
        return view('pages.dashboard.admin.dashboard', $data);
    }
}
