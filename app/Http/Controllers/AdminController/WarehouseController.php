<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\City;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::with('city')->get();

        return view('admin.warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.warehouses.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|exists:cities,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'manager_name' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('admin.warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    public function show($id)
    {
        $warehouse = Warehouse::with('city')->findOrFail($id);
        return view('admin.warehouses.show', compact('warehouse'));
    }

    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $cities = City::all();
        return view('admin.warehouses.edit', compact('warehouse', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|exists:cities,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'manager_name' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $warehouse->update($request->all());

        return redirect()->route('admin.warehouses.index')->with('success', 'Warehouse updated successfully.');
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        return redirect()->route('admin.warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }
}