<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mensClothing = Category::where('slug', 'mens-clothing')->first();
        $womensClothing = Category::where('slug', 'womens-clothing')->first();
        $mensShoes = Category::where('slug', 'mens-shoes')->first();
        $womensShoes = Category::where('slug', 'womens-shoes')->first();
        $bags = Category::where('slug', 'bags')->first();

        $subCategories = [
            [
                'category_id' => $mensClothing->id,
                'name' => 'T-Shirts',
                'slug' => 'mens-tshirts',
                'description' => 'Men\'s T-Shirts'
            ],
            [
                'category_id' => $mensClothing->id,
                'name' => 'Jeans',
                'slug' => 'mens-jeans',
                'description' => 'Men\'s Jeans'
            ],
            [
                'category_id' => $womensClothing->id,
                'name' => 'Dresses',
                'slug' => 'womens-dresses',
                'description' => 'Women\'s Dresses'
            ],
            [
                'category_id' => $womensClothing->id,
                'name' => 'T-Shirts',
                'slug' => 'womens-tshirts',
                'description' => 'Women\'s T-Shirts'
            ],
            [
                'category_id' => $mensShoes->id,
                'name' => 'Sneakers',
                'slug' => 'mens-sneakers',
                'description' => 'Men\'s Sneakers'
            ],
            [
                'category_id' => $womensShoes->id,
                'name' => 'Heels',
                'slug' => 'womens-heels',
                'description' => 'Women\'s Heels'
            ],
            [
                'category_id' => $bags->id,
                'name' => 'Handbags',
                'slug' => 'handbags',
                'description' => 'Handbags'
            ],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}