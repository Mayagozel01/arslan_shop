<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = \App\Models\City::all();
        if ($cities->isEmpty()) {
            return; // No cities to assign warehouses to
        }

        $warehouseManager = \App\Models\User::where('username', 'staff')->first();
        if (!$warehouseManager) {
            return; // No warehouse manager user found
        }

        $warehouses = [
            [
                'name' => 'Main Warehouse',
                'address' => '123 Main Street, Tashkent',
                'phone' => '+998901234567',
                'manager_name' => 'John Smith',
                'capacity' => 5000,
                'is_active' => true,
                'location_id' => $cities->first()->id,
                'warehouse_manager_id' => $warehouseManager->id,
            ],
            [
                'name' => 'North Warehouse',
                'address' => '456 North Avenue, Tashkent',
                'phone' => '+998907654321',
                'manager_name' => 'Jane Doe',
                'capacity' => 3000,
                'is_active' => true,
                'location_id' => $cities->first()->id,
                'warehouse_manager_id' => $warehouseManager->id,
            ],
            [
                'name' => 'South Warehouse',
                'address' => '789 South Road, Tashkent',
                'phone' => '+998905556667',
                'manager_name' => 'Bob Johnson',
                'capacity' => 4000,
                'is_active' => true,
                'location_id' => $cities->first()->id,
                'warehouse_manager_id' => $warehouseManager->id,
            ],
        ];

        foreach ($warehouses as $warehouse) {
            \App\Models\Warehouse::create($warehouse);
        }
    }
}
