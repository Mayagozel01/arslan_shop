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
        $warehouseManager = \App\Models\User::where('username', 'staff')->first();
        $warehouses = [
            [
                'name' => 'Main Warehouse',
                'location' => 'Tashkent',
                'address' => '123 Main Street, Tashkent',
                'phone' => '+998901234567',
                'manager_id' => $warehouseManager->id,
                'manager_name' => 'John Smith',
                'capacity' => 5000,
                'is_active' => true,
            ],
            [
                'name' => 'North Warehouse',
                'location' => 'Tashkent North',
                'address' => '456 North Avenue, Tashkent',
                'phone' => '+998907654321',
                'manager_name' => 'Jane Doe',
                'capacity' => 3000,
                'is_active' => true,
            ],
            [
                'name' => 'South Warehouse',
                'location' => 'Tashkent South',
                'address' => '789 South Road, Tashkent',
                'phone' => '+998905556667',
                'manager_name' => 'Bob Johnson',
                'capacity' => 4000,
                'is_active' => true,
            ],
        ];

        foreach ($warehouses as $warehouse) {
            \App\Models\Warehouse::create($warehouse);
        }
    }
}
