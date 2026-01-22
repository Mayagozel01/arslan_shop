<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $men = Category::create([
            'name' => 'Men',
            'slug' => 'men',
            'description' => 'Men',
            'image' => 'men.jpg',
            'parent_id' => null,
            'sort_order' => 1,
            'is_active' => true,
        ]);
        $women = Category::create([
            'name' => 'Women',
            'slug' => 'women',
            'description' => 'Women',
            'image' => 'women.jpg',
            'parent_id' => null,
            'sort_order' => 2,
            'is_active' => true,
        ]);
        Category::insert(
            [
                [
                    'name' => 'T-Shirts',
                    'slug' => 'tshirts',
                    'description' => 'it is desc for T-shirts',
                    'image' => 'aaaaa.jpg',
                    'parent_id' => $men->id,
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Jeans',
                    'slug' => 'jeans',
                    'description' => 'it is desc for Jeans',
                    'image' => 'bbbbb.jpg',
                    'parent_id' => $men->id,
                    'sort_order' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Dresses',
                    'slug' => 'dresses',
                    'description' => 'it is desc for Dresses',
                    'image' => 'ccccc.jpg',
                    'parent_id' => $women->id,
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'T-Shirts',
                    'slug' => 'tshirts',
                    'description' => 'it is desc for T-shirts',
                    'image' => 'aaaaa.jpg',
                    'parent_id' => $women->id,
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
