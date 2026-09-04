<?php

namespace App\Http\Controllers\ITStaff;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalTickets' => 12,
            'openTickets' => 4,
            'resolvedTickets' => 7,
        ];
        
        return view('pages.dashboard.it-staff.dashboard', $data);
    }
}
