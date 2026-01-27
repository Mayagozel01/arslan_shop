<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = \App\Models\Role::where('name', 'Admin')->first();
        $managerRole = \App\Models\Role::where('name', 'Manager')->first();
        $warehouseManagerRole = \App\Models\Role::where('name', 'warehouse manager')->first();
        $operatorRole = \App\Models\Role::where('name', 'operator')->first();
        $bugalterRole = \App\Models\Role::where('name', 'bugalter')->first();
        $sborshikRole = \App\Models\Role::where('name', 'sborshik')->first();
        $kuryerRole = \App\Models\Role::where('name', 'kuryer')->first();


        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'type' => 'sotrudnik',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ],
            [
                'first_name' => 'Manager',
                'last_name' => 'User',
                'username' => 'manager',
                'type' => 'sotrudnik',
                'email' => 'manager@example.com',
                'password' => Hash::make('password'),
                'role_id' => $managerRole->id,
            ],
            [
                'first_name' => 'Staff',
                'last_name' => 'User',
                'username' => 'staff',
                'type' => 'sotrudnik',
                'email' => 'staff@example.com',
                'password' => Hash::make('password'),
                'role_id' => $warehouseManagerRole->id,
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'johndoe',
                'type' => 'pokupatel',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role_id' => null,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'username' => 'janesmith',
                'type' => 'pokupatel',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role_id' => null,
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
