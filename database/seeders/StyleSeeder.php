<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $styles = [
            ['name' => 'Casual'],
            ['name' => 'Formal'],
            ['name' => 'Sport'],
            ['name' => 'Vintage'],
        ];

        foreach ($styles as $style) {
            Style::create($style);
        }
    }
}