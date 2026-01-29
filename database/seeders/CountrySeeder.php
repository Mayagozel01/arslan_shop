<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Uzbekistan',
                'code' => 'UZ',
                'latitude' => 41.3775,
                'longitude' => 64.5853,
            ],
            [
                'name' => 'United States',
                'code' => 'US',
                'latitude' => 39.8283,
                'longitude' => -98.5795,
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'GB',
                'latitude' => 54.7024,
                'longitude' => -3.2766,
            ],
            [
                'name' => 'Russia',
                'code' => 'RU',
                'latitude' => 61.5240,
                'longitude' => 105.3188,
            ],
            [
                'name' => 'Kazakhstan',
                'code' => 'KZ',
                'latitude' => 48.0196,
                'longitude' => 66.9237,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
