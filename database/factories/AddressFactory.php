<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'address_type'=>fake()->randomElement(['billing','shipping']),
            'full_name'=>fake()->name(),
            'phone'=>fake()->phoneNumber(),
            'street_address'=>fake()->address(),
            'city'=>fake()->city(),
            'state'=>fake()->state(),
            'zip_code'=>fake()->postcode(),
            'country'=>fake()->country(),
        ];
    }
}
