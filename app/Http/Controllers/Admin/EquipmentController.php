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

    public function edit(Equipment $equipment)
    {
        return view('pages.dashboard.admin.equipments.edit', compact('equipment'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'serial_no' => ['required', 'string', 'max:255', 'unique:equipments,serial_no'],
            'category' => ['required', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'purchase_date' => ['nullable', 'date'],
            'warranty_expiry' => ['nullable', 'date', 'after_or_equal:purchase_date'],
            'status' => ['required', 'in:available,in-use,maintenance,retired'],
        ]);

        Equipment::create($data);
        return redirect()->route('admin.equipments.index')->with('success', 'Equipment added');
    }

    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'serial_no' => ['required', 'string', 'max:255', 'unique:equipments,serial_no,'.$equipment->id],
            'category' => ['required', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'purchase_date' => ['nullable', 'date'],
            'warranty_expiry' => ['nullable', 'date', 'after_or_equal:purchase_date'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:available,in-use,maintenance,retired'],
        ]);

        $equipment->update($data);

        return redirect()->route('admin.equipments.index')->with('success', 'Equipment updated');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('admin.equipments.index')->with('success', 'Equipment deleted');
    }
}
