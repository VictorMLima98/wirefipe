<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'manufacturer_id' => Manufacturer::factory(),
            'external_id'     => uniqid(),
            'name'            => $this->faker->words(3, asText: true),
        ];
    }
}
