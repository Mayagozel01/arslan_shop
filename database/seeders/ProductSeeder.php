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
            // Men's T-Shirts (10 products)
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
                'category_id' => $mensTshirts->id,
                'name' => 'Black V-Neck T-Shirt',
                'slug' => 'black-vneck-tshirt',
                'description' => 'Stylish v-neck design',
                'price' => 22.99,
                'discount_price' => 18.99,
                'sku' => 'TSHIRT-BLK-002',
                'is_active' => true,
            ],
            [
                'category_id' => $mensTshirts->id,
                'name' => 'Navy Blue Polo Shirt',
                'slug' => 'navy-blue-polo',
                'description' => 'Classic polo style',
                'price' => 29.99,
                'discount_price' => null,
                'sku' => 'POLO-NAV-003',
                'is_active' => true,
            ],
            [
                'category_id' => $mensTshirts->id,
                'name' => 'Striped Casual T-Shirt',
                'slug' => 'striped-casual-tshirt',
                'description' => 'Trendy striped pattern',
                'price' => 24.99,
                'discount_price' => 19.99,
                'sku' => 'TSHIRT-STR-004',
                'is_active' => true,
            ],
            [
                'category_id' => $mensTshirts->id,
                'name' => 'Gray Henley Shirt',
                'slug' => 'gray-henley-shirt',
                'description' => 'Comfortable henley style',
                'price' => 27.99,
                'discount_price' => null,
                'sku' => 'HENLEY-GRY-005',
                'is_active' => true,
            ],

            // Men's Jeans (8 products)
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
                'category_id' => $mensJeans->id,
                'name' => 'Black Skinny Jeans',
                'slug' => 'black-skinny-jeans',
                'description' => 'Modern skinny fit',
                'price' => 54.99,
                'discount_price' => null,
                'sku' => 'JEANS-BLK-002',
                'is_active' => true,
            ],
            [
                'category_id' => $mensJeans->id,
                'name' => 'Light Wash Relaxed Jeans',
                'slug' => 'light-wash-relaxed-jeans',
                'description' => 'Comfortable relaxed fit',
                'price' => 44.99,
                'discount_price' => 34.99,
                'sku' => 'JEANS-LGT-003',
                'is_active' => true,
            ],
            [
                'category_id' => $mensJeans->id,
                'name' => 'Dark Indigo Straight Jeans',
                'slug' => 'dark-indigo-straight-jeans',
                'description' => 'Classic straight cut',
                'price' => 52.99,
                'discount_price' => null,
                'sku' => 'JEANS-IND-004',
                'is_active' => true,
            ],

            // Women's Dresses (12 products)
            [
                'category_id' => $womensDresses->id,
                'name' => 'Summer Floral Dress',
                'slug' => 'summer-floral-dress',
                'description' => 'Light summer dress with floral pattern',
                'price' => 39.99,
                'discount_price' => null,
                'sku' => 'DRESS-FLR-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Black Evening Dress',
                'slug' => 'black-evening-dress',
                'description' => 'Elegant evening wear',
                'price' => 79.99,
                'discount_price' => 69.99,
                'sku' => 'DRESS-EVE-002',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Red Cocktail Dress',
                'slug' => 'red-cocktail-dress',
                'description' => 'Stunning cocktail dress',
                'price' => 64.99,
                'discount_price' => null,
                'sku' => 'DRESS-COC-003',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Casual Maxi Dress',
                'slug' => 'casual-maxi-dress',
                'description' => 'Comfortable maxi length',
                'price' => 44.99,
                'discount_price' => 34.99,
                'sku' => 'DRESS-MAX-004',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Polka Dot Sundress',
                'slug' => 'polka-dot-sundress',
                'description' => 'Playful polka dot pattern',
                'price' => 32.99,
                'discount_price' => null,
                'sku' => 'DRESS-POL-005',
                'is_active' => true,
            ],
            [
                'category_id' => $womensDresses->id,
                'name' => 'Wrap Dress',
                'slug' => 'wrap-dress',
                'description' => 'Flattering wrap style',
                'price' => 49.99,
                'discount_price' => 39.99,
                'sku' => 'DRESS-WRP-006',
                'is_active' => true,
            ],

            // Women's T-Shirts (8 products)
            [
                'category_id' => $womensTshirts->id,
                'name' => 'Graphic Print T-Shirt',
                'slug' => 'graphic-print-tshirt',
                'description' => 'T-shirt with graphic print',
                'price' => 18.99,
                'discount_price' => null,
                'sku' => 'TSHIRT-GRP-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensTshirts->id,
                'name' => 'White Basic Tee',
                'slug' => 'white-basic-tee',
                'description' => 'Essential white t-shirt',
                'price' => 15.99,
                'discount_price' => 12.99,
                'sku' => 'TSHIRT-WHT-002',
                'is_active' => true,
            ],
            [
                'category_id' => $womensTshirts->id,
                'name' => 'Cropped Tank Top',
                'slug' => 'cropped-tank-top',
                'description' => 'Trendy cropped style',
                'price' => 19.99,
                'discount_price' => null,
                'sku' => 'TANK-CRP-003',
                'is_active' => true,
            ],
            [
                'category_id' => $womensTshirts->id,
                'name' => 'Striped Long Sleeve Tee',
                'slug' => 'striped-long-sleeve-tee',
                'description' => 'Comfortable long sleeve',
                'price' => 24.99,
                'discount_price' => 19.99,
                'sku' => 'TSHIRT-STR-W004',
                'is_active' => true,
            ],

            // Men's Sneakers (10 products)
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
                'category_id' => $mensSneakers->id,
                'name' => 'White Canvas Sneakers',
                'slug' => 'white-canvas-sneakers',
                'description' => 'Classic canvas style',
                'price' => 44.99,
                'discount_price' => null,
                'sku' => 'SNEAKERS-CNV-002',
                'is_active' => true,
            ],
            [
                'category_id' => $mensSneakers->id,
                'name' => 'High-Top Basketball Shoes',
                'slug' => 'high-top-basketball-shoes',
                'description' => 'Performance basketball shoes',
                'price' => 99.99,
                'discount_price' => 84.99,
                'sku' => 'SNEAKERS-BSK-003',
                'is_active' => true,
            ],
            [
                'category_id' => $mensSneakers->id,
                'name' => 'Slip-On Casual Sneakers',
                'slug' => 'slip-on-casual-sneakers',
                'description' => 'Easy slip-on design',
                'price' => 54.99,
                'discount_price' => null,
                'sku' => 'SNEAKERS-SLP-004',
                'is_active' => true,
            ],
            [
                'category_id' => $mensSneakers->id,
                'name' => 'Leather Athletic Shoes',
                'slug' => 'leather-athletic-shoes',
                'description' => 'Premium leather construction',
                'price' => 89.99,
                'discount_price' => 74.99,
                'sku' => 'SNEAKERS-LTH-005',
                'is_active' => true,
            ],

            // Women's Heels (8 products)
            [
                'category_id' => $womensHeels->id,
                'name' => 'Classic Black Heels',
                'slug' => 'classic-black-heels',
                'description' => 'Elegant high heels',
                'price' => 64.99,
                'discount_price' => null,
                'sku' => 'HEELS-BLK-001',
                'is_active' => true,
            ],
            [
                'category_id' => $womensHeels->id,
                'name' => 'Red Stiletto Heels',
                'slug' => 'red-stiletto-heels',
                'description' => 'Bold red stilettos',
                'price' => 74.99,
                'discount_price' => 64.99,
                'sku' => 'HEELS-RED-002',
                'is_active' => true,
            ],
            [
                'category_id' => $womensHeels->id,
                'name' => 'Nude Pumps',
                'slug' => 'nude-pumps',
                'description' => 'Versatile nude color',
                'price' => 59.99,
                'discount_price' => null,
                'sku' => 'HEELS-NUD-003',
                'is_active' => true,
            ],
            [
                'category_id' => $womensHeels->id,
                'name' => 'Strappy Sandal Heels',
                'slug' => 'strappy-sandal-heels',
                'description' => 'Elegant strappy design',
                'price' => 69.99,
                'discount_price' => 54.99,
                'sku' => 'HEELS-STR-004',
                'is_active' => true,
            ],

            // Handbags (10 products)
            [
                'category_id' => $handbags->id,
                'name' => 'Leather Tote Bag',
                'slug' => 'leather-tote-bag',
                'description' => 'Spacious leather tote',
                'price' => 99.99,
                'discount_price' => 89.99,
                'sku' => 'BAG-TOT-001',
                'is_active' => true,
            ],
            [
                'category_id' => $handbags->id,
                'name' => 'Crossbody Messenger Bag',
                'slug' => 'crossbody-messenger-bag',
                'description' => 'Convenient crossbody style',
                'price' => 54.99,
                'discount_price' => null,
                'sku' => 'BAG-CRS-002',
                'is_active' => true,
            ],
            [
                'category_id' => $handbags->id,
                'name' => 'Designer Clutch',
                'slug' => 'designer-clutch',
                'description' => 'Elegant evening clutch',
                'price' => 79.99,
                'discount_price' => 69.99,
                'sku' => 'BAG-CLT-003',
                'is_active' => true,
            ],
            [
                'category_id' => $handbags->id,
                'name' => 'Canvas Shoulder Bag',
                'slug' => 'canvas-shoulder-bag',
                'description' => 'Casual canvas bag',
                'price' => 39.99,
                'discount_price' => null,
                'sku' => 'BAG-SHL-004',
                'is_active' => true,
            ],
            [
                'category_id' => $handbags->id,
                'name' => 'Quilted Chain Bag',
                'slug' => 'quilted-chain-bag',
                'description' => 'Luxury quilted design',
                'price' => 129.99,
                'discount_price' => 109.99,
                'sku' => 'BAG-QLT-005',
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