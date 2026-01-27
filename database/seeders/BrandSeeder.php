<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Nike',
                'slug' => 'nike',
                'description' => 'Sportswear brand',
                'logo' => 'nike-logo.png'
            ],
            [
                'name' => 'Adidas',
                'slug' => 'adidas',
                'description' => 'Sportswear brand',
                'logo' => 'adidas-logo.png'
            ],
            [
                'name' => 'Zara',
                'slug' => 'zara',
                'description' => 'Fashion brand',
                'logo' => 'zara-logo.png'
            ],
            [
                'name' => 'H&M',
                'slug' => 'hm',
                'description' => 'Fashion brand',
                'logo' => 'hm-logo.png'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}