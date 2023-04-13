<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type_id'     => Type::factory(),
            'name'        => $this->faker->company(),
            'external_id' => uniqid(),
        ];
    }
}
