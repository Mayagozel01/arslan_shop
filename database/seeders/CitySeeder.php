<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Country;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // Uzbekistan
            ['name' => 'Tashkent', 'country_code' => 'UZ'],
            ['name' => 'Samarkand', 'country_code' => 'UZ'],
            ['name' => 'Bukhara', 'country_code' => 'UZ'],
            // United States
            ['name' => 'New York', 'country_code' => 'US'],
            ['name' => 'Los Angeles', 'country_code' => 'US'],
            ['name' => 'Chicago', 'country_code' => 'US'],
            // United Kingdom
            ['name' => 'London', 'country_code' => 'GB'],
            ['name' => 'Manchester', 'country_code' => 'GB'],
            ['name' => 'Birmingham', 'country_code' => 'GB'],
            // Russia
            ['name' => 'Moscow', 'country_code' => 'RU'],
            ['name' => 'Saint Petersburg', 'country_code' => 'RU'],
            ['name' => 'Kazan', 'country_code' => 'RU'],
            // Kazakhstan
            ['name' => 'Astana', 'country_code' => 'KZ'],
            ['name' => 'Almaty', 'country_code' => 'KZ'],
            ['name' => 'Shymkent', 'country_code' => 'KZ'],
        ];

        foreach ($cities as $cityData) {
            $country = Country::where('code', $cityData['country_code'])->first();
            if ($country) {
                City::create([
                    'name' => $cityData['name'],
                    'country_id' => $country->id,
                ]);
            }
        }
    }
}
