<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard.admin.reports.index', [
            'users' => User::count(),
            'tickets' => Ticket::count(),
            'openTickets' => Ticket::where('status', 'open')->count(),
            'equipment' => Equipment::count(),
        ]);
    }
}
