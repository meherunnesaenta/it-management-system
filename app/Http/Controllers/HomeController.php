<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Ticket;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        // Ticket Stats
        $totalTickets = Schema::hasTable('tickets') ? Ticket::count() : 0;
        $resolvedTickets = Schema::hasTable('tickets') ? Ticket::where('status', 'resolved')->count() : 0;
        $openTickets = Schema::hasTable('tickets') ? Ticket::where('status', 'open')->count() : 0;
        $inProgressTickets = Schema::hasTable('tickets') ? Ticket::where('status', 'in-progress')->count() : 0;

        // Equipment Stats
        $totalEquipment = Schema::hasTable('equipments') ? Equipment::count() : 0;
        $availableEquipment = Schema::hasTable('equipments') ? Equipment::where('status', 'available')->count() : 0;
        $assignedEquipment = Schema::hasTable('equipments') ? Equipment::where('status', 'assigned')->count() : 0;
        $maintenanceEquipment = Schema::hasTable('equipments') ? Equipment::where('status', 'maintenance')->count() : 0;

        // Progress Percentages
        $ticketProgress = $totalTickets > 0 ? round(($resolvedTickets / $totalTickets) * 100) : 0;
        $equipmentProgress = $totalEquipment > 0 ? round(($availableEquipment / $totalEquipment) * 100) : 0;

        return view('pages.home', [
            // Ticket Stats
            'totalTickets' => $totalTickets,
            'resolvedTickets' => $resolvedTickets,
            'openTickets' => $openTickets,
            'inProgressTickets' => $inProgressTickets,
            'ticketProgress' => $ticketProgress,

            // Equipment Stats
            'totalEquipment' => $totalEquipment,
            'availableEquipment' => $availableEquipment,
            'assignedEquipment' => $assignedEquipment,
            'maintenanceEquipment' => $maintenanceEquipment,
            'equipmentProgress' => $equipmentProgress,
        ]);
    }
}