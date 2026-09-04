<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalTickets' => 45,
            'openTickets' => 12,
            'resolvedTickets' => 28,
            'totalEquipments' => 156,
        ];
        
        return view('pages.dashboard.admin.dashboard', $data);
    }
}
