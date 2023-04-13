<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleYearFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vehicle_id'  => Vehicle::factory(),
            'external_id' => uniqid(),
            'code'        => random_int(1, 10) . '-' . uniqid(),
            'year'        => random_int(1990, 2023),
        ];
    }
}
