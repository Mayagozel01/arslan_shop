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
                'name' => 'Footwear',
                'slug' => 'footwear',
                'description' => 'Shoes and footwear for all occasions'
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Fashion accessories and jewelry'
            ],
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Electronic devices and gadgets'
            ],
            [
                'name' => 'Sports & Outdoors',
                'slug' => 'sports-outdoors',
                'description' => 'Sports equipment and outdoor gear'
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-living',
                'description' => 'Home decor and living essentials'
            ],
        ];

        foreach ($mainCategories as $mainCategory) {
            MainCategory::create($mainCategory);
        }
    }
}