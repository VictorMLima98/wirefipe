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
            'name'        => str()->of($this->faker->company())->replace('\'', ''),
            'external_id' => uniqid(),
        ];
    }
}
