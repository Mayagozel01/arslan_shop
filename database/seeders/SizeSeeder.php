<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['name' => 'Small', 'code' => 'S'],
            ['name' => 'Medium', 'code' => 'M'],
            ['name' => 'Large', 'code' => 'L'],
            ['name' => 'Extra Large', 'code' => 'XL'],
            ['name' => '36', 'code' => '36'],
            ['name' => '37', 'code' => '37'],
            ['name' => '38', 'code' => '38'],
            ['name' => '39', 'code' => '39'],
            ['name' => '40', 'code' => '40'],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}