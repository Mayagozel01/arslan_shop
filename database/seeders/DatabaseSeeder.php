<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Address::factory(2)->create();
        $this->call([CategorySeeder::class]);
    }
}
