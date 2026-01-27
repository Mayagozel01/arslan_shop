<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Manager'],
            ['name' => 'warehouse manager'],
            ['name' => 'operator'],
            ['name' => 'bugalter'],
            ['name' => 'sborshik'],
            ['name' => 'kuryer']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}