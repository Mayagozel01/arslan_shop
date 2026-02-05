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
        $footwear = MainCategory::where('slug', 'footwear')->first();
        $accessories = MainCategory::where('slug', 'accessories')->first();
        $electronics = MainCategory::where('slug', 'electronics')->first();
        $sports = MainCategory::where('slug', 'sports-outdoors')->first();
        $home = MainCategory::where('slug', 'home-living')->first();

        $categories = [
            // Clothing Categories
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
                'main_category_id' => $clothing->id,
                'name' => 'Kids\' Clothing',
                'slug' => 'kids-clothing',
                'description' => 'Clothing for children'
            ],
            [
                'main_category_id' => $clothing->id,
                'name' => 'Activewear',
                'slug' => 'activewear',
                'description' => 'Athletic and active clothing'
            ],

            // Footwear Categories
            [
                'main_category_id' => $footwear->id,
                'name' => 'Men\'s Shoes',
                'slug' => 'mens-shoes',
                'description' => 'Shoes for men'
            ],
            [
                'main_category_id' => $footwear->id,
                'name' => 'Women\'s Shoes',
                'slug' => 'womens-shoes',
                'description' => 'Shoes for women'
            ],
            [
                'main_category_id' => $footwear->id,
                'name' => 'Kids\' Shoes',
                'slug' => 'kids-shoes',
                'description' => 'Shoes for children'
            ],
            [
                'main_category_id' => $footwear->id,
                'name' => 'Sports Shoes',
                'slug' => 'sports-shoes',
                'description' => 'Athletic and sports footwear'
            ],

            // Accessories Categories
            [
                'main_category_id' => $accessories->id,
                'name' => 'Bags',
                'slug' => 'bags',
                'description' => 'Handbags, backpacks, and luggage'
            ],
            [
                'main_category_id' => $accessories->id,
                'name' => 'Jewelry',
                'slug' => 'jewelry',
                'description' => 'Rings, necklaces, and bracelets'
            ],
            [
                'main_category_id' => $accessories->id,
                'name' => 'Watches',
                'slug' => 'watches',
                'description' => 'Wristwatches and smartwatches'
            ],
            [
                'main_category_id' => $accessories->id,
                'name' => 'Sunglasses',
                'slug' => 'sunglasses',
                'description' => 'Sunglasses and eyewear'
            ],

            // Electronics Categories
            [
                'main_category_id' => $electronics->id,
                'name' => 'Smartphones',
                'slug' => 'smartphones',
                'description' => 'Mobile phones and accessories'
            ],
            [
                'main_category_id' => $electronics->id,
                'name' => 'Laptops & Computers',
                'slug' => 'laptops-computers',
                'description' => 'Computers and peripherals'
            ],
            [
                'main_category_id' => $electronics->id,
                'name' => 'Audio & Headphones',
                'slug' => 'audio-headphones',
                'description' => 'Headphones, speakers, and audio equipment'
            ],
            [
                'main_category_id' => $electronics->id,
                'name' => 'Cameras',
                'slug' => 'cameras',
                'description' => 'Digital cameras and photography gear'
            ],

            // Sports & Outdoors Categories
            [
                'main_category_id' => $sports->id,
                'name' => 'Fitness Equipment',
                'slug' => 'fitness-equipment',
                'description' => 'Gym and workout equipment'
            ],
            [
                'main_category_id' => $sports->id,
                'name' => 'Outdoor Gear',
                'slug' => 'outdoor-gear',
                'description' => 'Camping and hiking equipment'
            ],
            [
                'main_category_id' => $sports->id,
                'name' => 'Team Sports',
                'slug' => 'team-sports',
                'description' => 'Equipment for team sports'
            ],
            [
                'main_category_id' => $sports->id,
                'name' => 'Water Sports',
                'slug' => 'water-sports',
                'description' => 'Swimming and water sports gear'
            ],

            // Home & Living Categories
            [
                'main_category_id' => $home->id,
                'name' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'Home and office furniture'
            ],
            [
                'main_category_id' => $home->id,
                'name' => 'Kitchen & Dining',
                'slug' => 'kitchen-dining',
                'description' => 'Kitchenware and dining essentials'
            ],
            [
                'main_category_id' => $home->id,
                'name' => 'Bedding & Bath',
                'slug' => 'bedding-bath',
                'description' => 'Bedroom and bathroom essentials'
            ],
            [
                'main_category_id' => $home->id,
                'name' => 'Home Decor',
                'slug' => 'home-decor',
                'description' => 'Decorative items and artwork'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
