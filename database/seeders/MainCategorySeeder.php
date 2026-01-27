<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainCategory;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategories = [
            [
                'name' => 'Clothing',
                'slug' => 'clothing',
                'description' => 'All types of clothing items'
            ],
            [
                'name' => 'Shoes',
                'slug' => 'shoes',
                'description' => 'Footwear for men and women'
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Fashion accessories'
            ],
        ];

        foreach ($mainCategories as $mainCategory) {
            MainCategory::create($mainCategory);
        }
    }
}