<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::latest()->paginate(10);
        return view('pages.dashboard.admin.equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('pages.dashboard.admin.equipments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'model' => 'nullable|string',
            'serial_no' => 'nullable|string',
        ]);

        Equipment::create($data);
        return redirect()->route('admin.equipments.index')->with('success', 'Equipment added');
    }
}
