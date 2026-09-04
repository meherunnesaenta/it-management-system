<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalTickets' => 5,
            'openTickets' => 2,
            'resolvedTickets' => 3,
            'totalPayments' => 1500,
        ];
        
        return view('pages.dashboard.student.dashboard', $data);
    }
}
