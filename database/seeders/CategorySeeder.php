<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MainCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothing = MainCategory::where('slug', 'clothing')->first();
        $shoes = MainCategory::where('slug', 'shoes')->first();
        $accessories = MainCategory::where('slug', 'accessories')->first();

        $categories = [
            [
                'main_category_id' => $clothing->id,
                'name' => 'Men\'s Clothing',
                'slug' => 'mens-clothing',
                'description' => 'Clothing for men'
            ],
            [
                'main_category_id' => $clothing->id,
                'name' => 'Women\'s Clothing',
                'slug' => 'womens-clothing',
                'description' => 'Clothing for women'
            ],
            [
                'main_category_id' => $shoes->id,
                'name' => 'Men\'s Shoes',
                'slug' => 'mens-shoes',
                'description' => 'Shoes for men'
            ],
            [
                'main_category_id' => $shoes->id,
                'name' => 'Women\'s Shoes',
                'slug' => 'womens-shoes',
                'description' => 'Shoes for women'
            ],
            [
                'main_category_id' => $accessories->id,
                'name' => 'Bags',
                'slug' => 'bags',
                'description' => 'Handbags and backpacks'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
