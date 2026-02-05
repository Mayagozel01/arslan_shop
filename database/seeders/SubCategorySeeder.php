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
        // Get all categories
        $mensClothing = Category::where('slug', 'mens-clothing')->first();
        $womensClothing = Category::where('slug', 'womens-clothing')->first();
        $kidsClothing = Category::where('slug', 'kids-clothing')->first();
        $activewear = Category::where('slug', 'activewear')->first();
        
        $mensShoes = Category::where('slug', 'mens-shoes')->first();
        $womensShoes = Category::where('slug', 'womens-shoes')->first();
        $kidsShoes = Category::where('slug', 'kids-shoes')->first();
        $sportsShoes = Category::where('slug', 'sports-shoes')->first();
        
        $bags = Category::where('slug', 'bags')->first();
        $jewelry = Category::where('slug', 'jewelry')->first();
        $watches = Category::where('slug', 'watches')->first();
        $sunglasses = Category::where('slug', 'sunglasses')->first();
        
        $smartphones = Category::where('slug', 'smartphones')->first();
        $laptops = Category::where('slug', 'laptops-computers')->first();
        $audio = Category::where('slug', 'audio-headphones')->first();
        $cameras = Category::where('slug', 'cameras')->first();
        
        $fitness = Category::where('slug', 'fitness-equipment')->first();
        $outdoor = Category::where('slug', 'outdoor-gear')->first();
        $teamSports = Category::where('slug', 'team-sports')->first();
        $waterSports = Category::where('slug', 'water-sports')->first();
        
        $furniture = Category::where('slug', 'furniture')->first();
        $kitchen = Category::where('slug', 'kitchen-dining')->first();
        $bedding = Category::where('slug', 'bedding-bath')->first();
        $homeDecor = Category::where('slug', 'home-decor')->first();

        $subCategories = [
            // Men's Clothing Subcategories
            ['category_id' => $mensClothing->id, 'name' => 'T-Shirts', 'slug' => 'mens-tshirts', 'description' => 'Men\'s T-Shirts'],
            ['category_id' => $mensClothing->id, 'name' => 'Jeans', 'slug' => 'mens-jeans', 'description' => 'Men\'s Jeans'],
            ['category_id' => $mensClothing->id, 'name' => 'Shirts', 'slug' => 'mens-shirts', 'description' => 'Men\'s Dress Shirts'],
            ['category_id' => $mensClothing->id, 'name' => 'Jackets', 'slug' => 'mens-jackets', 'description' => 'Men\'s Jackets'],
            ['category_id' => $mensClothing->id, 'name' => 'Suits', 'slug' => 'mens-suits', 'description' => 'Men\'s Suits'],

            // Women's Clothing Subcategories
            ['category_id' => $womensClothing->id, 'name' => 'Dresses', 'slug' => 'womens-dresses', 'description' => 'Women\'s Dresses'],
            ['category_id' => $womensClothing->id, 'name' => 'T-Shirts', 'slug' => 'womens-tshirts', 'description' => 'Women\'s T-Shirts'],
            ['category_id' => $womensClothing->id, 'name' => 'Skirts', 'slug' => 'womens-skirts', 'description' => 'Women\'s Skirts'],
            ['category_id' => $womensClothing->id, 'name' => 'Blouses', 'slug' => 'womens-blouses', 'description' => 'Women\'s Blouses'],
            ['category_id' => $womensClothing->id, 'name' => 'Coats', 'slug' => 'womens-coats', 'description' => 'Women\'s Coats'],

            // Kids' Clothing Subcategories
            ['category_id' => $kidsClothing->id, 'name' => 'Boys\' Clothing', 'slug' => 'boys-clothing', 'description' => 'Clothing for boys'],
            ['category_id' => $kidsClothing->id, 'name' => 'Girls\' Clothing', 'slug' => 'girls-clothing', 'description' => 'Clothing for girls'],
            ['category_id' => $kidsClothing->id, 'name' => 'Baby Clothing', 'slug' => 'baby-clothing', 'description' => 'Clothing for babies'],

            // Activewear Subcategories
            ['category_id' => $activewear->id, 'name' => 'Yoga Wear', 'slug' => 'yoga-wear', 'description' => 'Yoga clothing'],
            ['category_id' => $activewear->id, 'name' => 'Running Gear', 'slug' => 'running-gear', 'description' => 'Running apparel'],
            ['category_id' => $activewear->id, 'name' => 'Gym Wear', 'slug' => 'gym-wear', 'description' => 'Gym clothing'],

            // Men's Shoes Subcategories
            ['category_id' => $mensShoes->id, 'name' => 'Sneakers', 'slug' => 'mens-sneakers', 'description' => 'Men\'s Sneakers'],
            ['category_id' => $mensShoes->id, 'name' => 'Dress Shoes', 'slug' => 'mens-dress-shoes', 'description' => 'Men\'s Formal Shoes'],
            ['category_id' => $mensShoes->id, 'name' => 'Boots', 'slug' => 'mens-boots', 'description' => 'Men\'s Boots'],
            ['category_id' => $mensShoes->id, 'name' => 'Sandals', 'slug' => 'mens-sandals', 'description' => 'Men\'s Sandals'],

            // Women's Shoes Subcategories
            ['category_id' => $womensShoes->id, 'name' => 'Heels', 'slug' => 'womens-heels', 'description' => 'Women\'s Heels'],
            ['category_id' => $womensShoes->id, 'name' => 'Flats', 'slug' => 'womens-flats', 'description' => 'Women\'s Flats'],
            ['category_id' => $womensShoes->id, 'name' => 'Boots', 'slug' => 'womens-boots', 'description' => 'Women\'s Boots'],
            ['category_id' => $womensShoes->id, 'name' => 'Sneakers', 'slug' => 'womens-sneakers', 'description' => 'Women\'s Sneakers'],

            // Kids' Shoes Subcategories
            ['category_id' => $kidsShoes->id, 'name' => 'Boys\' Shoes', 'slug' => 'boys-shoes', 'description' => 'Shoes for boys'],
            ['category_id' => $kidsShoes->id, 'name' => 'Girls\' Shoes', 'slug' => 'girls-shoes', 'description' => 'Shoes for girls'],
            ['category_id' => $kidsShoes->id, 'name' => 'Baby Shoes', 'slug' => 'baby-shoes', 'description' => 'Shoes for babies'],

            // Sports Shoes Subcategories
            ['category_id' => $sportsShoes->id, 'name' => 'Running Shoes', 'slug' => 'running-shoes', 'description' => 'Running footwear'],
            ['category_id' => $sportsShoes->id, 'name' => 'Basketball Shoes', 'slug' => 'basketball-shoes', 'description' => 'Basketball footwear'],
            ['category_id' => $sportsShoes->id, 'name' => 'Soccer Cleats', 'slug' => 'soccer-cleats', 'description' => 'Soccer footwear'],

            // Bags Subcategories
            ['category_id' => $bags->id, 'name' => 'Handbags', 'slug' => 'handbags', 'description' => 'Women\'s Handbags'],
            ['category_id' => $bags->id, 'name' => 'Backpacks', 'slug' => 'backpacks', 'description' => 'Backpacks'],
            ['category_id' => $bags->id, 'name' => 'Luggage', 'slug' => 'luggage', 'description' => 'Travel Luggage'],
            ['category_id' => $bags->id, 'name' => 'Wallets', 'slug' => 'wallets', 'description' => 'Wallets and Purses'],

            // Jewelry Subcategories
            ['category_id' => $jewelry->id, 'name' => 'Necklaces', 'slug' => 'necklaces', 'description' => 'Necklaces and Pendants'],
            ['category_id' => $jewelry->id, 'name' => 'Rings', 'slug' => 'rings', 'description' => 'Rings'],
            ['category_id' => $jewelry->id, 'name' => 'Bracelets', 'slug' => 'bracelets', 'description' => 'Bracelets'],
            ['category_id' => $jewelry->id, 'name' => 'Earrings', 'slug' => 'earrings', 'description' => 'Earrings'],

            // Watches Subcategories
            ['category_id' => $watches->id, 'name' => 'Men\'s Watches', 'slug' => 'mens-watches', 'description' => 'Watches for men'],
            ['category_id' => $watches->id, 'name' => 'Women\'s Watches', 'slug' => 'womens-watches', 'description' => 'Watches for women'],
            ['category_id' => $watches->id, 'name' => 'Smartwatches', 'slug' => 'smartwatches', 'description' => 'Smart Watches'],

            // Sunglasses Subcategories
            ['category_id' => $sunglasses->id, 'name' => 'Men\'s Sunglasses', 'slug' => 'mens-sunglasses', 'description' => 'Sunglasses for men'],
            ['category_id' => $sunglasses->id, 'name' => 'Women\'s Sunglasses', 'slug' => 'womens-sunglasses', 'description' => 'Sunglasses for women'],
            ['category_id' => $sunglasses->id, 'name' => 'Sports Sunglasses', 'slug' => 'sports-sunglasses', 'description' => 'Athletic Sunglasses'],

            // Smartphones Subcategories
            ['category_id' => $smartphones->id, 'name' => 'iPhone', 'slug' => 'iphone', 'description' => 'Apple iPhones'],
            ['category_id' => $smartphones->id, 'name' => 'Android Phones', 'slug' => 'android-phones', 'description' => 'Android Smartphones'],
            ['category_id' => $smartphones->id, 'name' => 'Phone Cases', 'slug' => 'phone-cases', 'description' => 'Phone Accessories'],

            // Laptops & Computers Subcategories
            ['category_id' => $laptops->id, 'name' => 'Laptops', 'slug' => 'laptops', 'description' => 'Laptop Computers'],
            ['category_id' => $laptops->id, 'name' => 'Desktops', 'slug' => 'desktops', 'description' => 'Desktop Computers'],
            ['category_id' => $laptops->id, 'name' => 'Tablets', 'slug' => 'tablets', 'description' => 'Tablet Devices'],
            ['category_id' => $laptops->id, 'name' => 'Monitors', 'slug' => 'monitors', 'description' => 'Computer Monitors'],

            // Audio & Headphones Subcategories
            ['category_id' => $audio->id, 'name' => 'Headphones', 'slug' => 'headphones', 'description' => 'Over-ear Headphones'],
            ['category_id' => $audio->id, 'name' => 'Earbuds', 'slug' => 'earbuds', 'description' => 'In-ear Earbuds'],
            ['category_id' => $audio->id, 'name' => 'Speakers', 'slug' => 'speakers', 'description' => 'Bluetooth Speakers'],

            // Cameras Subcategories
            ['category_id' => $cameras->id, 'name' => 'DSLR Cameras', 'slug' => 'dslr-cameras', 'description' => 'Digital SLR Cameras'],
            ['category_id' => $cameras->id, 'name' => 'Mirrorless Cameras', 'slug' => 'mirrorless-cameras', 'description' => 'Mirrorless Cameras'],
            ['category_id' => $cameras->id, 'name' => 'Action Cameras', 'slug' => 'action-cameras', 'description' => 'Action Cameras'],

            // Fitness Equipment Subcategories
            ['category_id' => $fitness->id, 'name' => 'Treadmills', 'slug' => 'treadmills', 'description' => 'Running Treadmills'],
            ['category_id' => $fitness->id, 'name' => 'Dumbbells', 'slug' => 'dumbbells', 'description' => 'Free Weights'],
            ['category_id' => $fitness->id, 'name' => 'Yoga Mats', 'slug' => 'yoga-mats', 'description' => 'Exercise Mats'],

            // Outdoor Gear Subcategories
            ['category_id' => $outdoor->id, 'name' => 'Tents', 'slug' => 'tents', 'description' => 'Camping Tents'],
            ['category_id' => $outdoor->id, 'name' => 'Sleeping Bags', 'slug' => 'sleeping-bags', 'description' => 'Sleeping Bags'],
            ['category_id' => $outdoor->id, 'name' => 'Backpacking Gear', 'slug' => 'backpacking-gear', 'description' => 'Hiking Equipment'],

            // Team Sports Subcategories
            ['category_id' => $teamSports->id, 'name' => 'Soccer Equipment', 'slug' => 'soccer-equipment', 'description' => 'Soccer Gear'],
            ['category_id' => $teamSports->id, 'name' => 'Basketball Equipment', 'slug' => 'basketball-equipment', 'description' => 'Basketball Gear'],
            ['category_id' => $teamSports->id, 'name' => 'Baseball Equipment', 'slug' => 'baseball-equipment', 'description' => 'Baseball Gear'],

            // Water Sports Subcategories
            ['category_id' => $waterSports->id, 'name' => 'Swimwear', 'slug' => 'swimwear', 'description' => 'Swimming Apparel'],
            ['category_id' => $waterSports->id, 'name' => 'Surfboards', 'slug' => 'surfboards', 'description' => 'Surfing Equipment'],
            ['category_id' => $waterSports->id, 'name' => 'Diving Gear', 'slug' => 'diving-gear', 'description' => 'Scuba Diving Equipment'],

            // Furniture Subcategories
            ['category_id' => $furniture->id, 'name' => 'Living Room', 'slug' => 'living-room-furniture', 'description' => 'Living Room Furniture'],
            ['category_id' => $furniture->id, 'name' => 'Bedroom', 'slug' => 'bedroom-furniture', 'description' => 'Bedroom Furniture'],
            ['category_id' => $furniture->id, 'name' => 'Office', 'slug' => 'office-furniture', 'description' => 'Office Furniture'],

            // Kitchen & Dining Subcategories
            ['category_id' => $kitchen->id, 'name' => 'Cookware', 'slug' => 'cookware', 'description' => 'Pots and Pans'],
            ['category_id' => $kitchen->id, 'name' => 'Dinnerware', 'slug' => 'dinnerware', 'description' => 'Plates and Bowls'],
            ['category_id' => $kitchen->id, 'name' => 'Kitchen Appliances', 'slug' => 'kitchen-appliances', 'description' => 'Small Appliances'],

            // Bedding & Bath Subcategories
            ['category_id' => $bedding->id, 'name' => 'Bed Sheets', 'slug' => 'bed-sheets', 'description' => 'Bedding Sheets'],
            ['category_id' => $bedding->id, 'name' => 'Towels', 'slug' => 'towels', 'description' => 'Bath Towels'],
            ['category_id' => $bedding->id, 'name' => 'Pillows', 'slug' => 'pillows', 'description' => 'Bed Pillows'],

            // Home Decor Subcategories
            ['category_id' => $homeDecor->id, 'name' => 'Wall Art', 'slug' => 'wall-art', 'description' => 'Paintings and Prints'],
            ['category_id' => $homeDecor->id, 'name' => 'Candles', 'slug' => 'candles', 'description' => 'Decorative Candles'],
            ['category_id' => $homeDecor->id, 'name' => 'Vases', 'slug' => 'vases', 'description' => 'Decorative Vases'],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}