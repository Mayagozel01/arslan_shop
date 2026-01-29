<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Style;
use App\Models\Size;
use App\Models\Color;
use App\Models\Warehouse;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mensTshirts = SubCategory::where('slug', 'mens-tshirts')->first();
        $mensJeans = SubCategory::where('slug', 'mens-jeans')->first();
        $womensDresses = SubCategory::where('slug', 'womens-dresses')->first();
        $womensTshirts = SubCategory::where('slug', 'womens-tshirts')->first();
        $mensSneakers = SubCategory::where('slug', 'mens-sneakers')->first();
        $womensHeels = SubCategory::where('slug', 'womens-heels')->first();
        $handbags = SubCategory::where('slug', 'handbags')->first();

        $products = [
            [
                'category_id' => $mensTshirts->id,
                'name' => 'Classic White T-Shirt',
                'slug' => 'classic-white-tshirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 19.99,
                'discount_price' => null,
                'sku' => 'TSHIRT-WHT-001',
                'is_active' => true,
            ],
            [
                'category_id' => $mensJeans->id,
                'name' => 'Blue Denim Jeans',
                'slug' => 'blue-denim-jeans',
                'description' => 'Classic blue jeans',
                'price' => 49.99,
                'discount_price' => 39.99,
                'sku' => 'JEANS-BLU-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Summer Dress',
                'slug' => 'summer-dress',
                'description' => 'Light summer dress',
                'price' => 29.99,
                'discount_price' => null,
                'sku' => 'DRESS-SUM-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensTshirts->id,
                'name' => 'Graphic T-Shirt',
                'slug' => 'graphic-tshirt',
                'description' => 'T-shirt with graphic print',
                'price' => 14.99,
                'discount_price' => null,
                'sku' => 'TSHIRT-GRP-001',
                'is_active' => true,
            ],
            [
                'category_id' => $mensSneakers->id,
                'name' => 'Running Sneakers',
                'slug' => 'running-sneakers',
                'description' => 'Comfortable running shoes',
                'price' => 79.99,
                'discount_price' => 69.99,
                'sku' => 'SNEAKERS-RUN-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensHeels->id,
                'name' => 'High Heels',
                'slug' => 'high-heels',
                'description' => 'Elegant high heels',
                'price' => 59.99,
                'discount_price' => null,
                'sku' => 'HEELS-HGH-001',
                'is_active' => true,
            ],
            [
                'category_id' => $handbags->id,
                'name' => 'Leather Handbag',
                'slug' => 'leather-handbag',
                'description' => 'Genuine leather handbag',
                'price' => 99.99,
                'discount_price' => 89.99,
                'sku' => 'HANDBAG-LTH-001',
                'is_active' => true,
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);

            // Attach random brands, styles, sizes, colors
            $brands = Brand::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $styles = Style::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $sizes = Size::inRandomOrder()->take(rand(2, 4))->pluck('id');
            $colors = Color::inRandomOrder()->take(rand(1, 3))->pluck('id');

            $product->brands()->attach($brands);
            $product->styles()->attach($styles);
            $product->sizes()->attach($sizes);
            $product->colors()->attach($colors);

            // Attach to all warehouses with random stock data
            $warehouses = Warehouse::all();
            foreach ($warehouses as $warehouse) {
                $product->warehouses()->attach($warehouse->id, [
                    'income' => rand(0, 50),
                    'stocks' => rand(10, 100),
                ]);
            }
        }
    }
}