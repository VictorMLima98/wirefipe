<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::factory(3)
            ->sequence(
                ['name' => 'carros', 'description' => 'Carros'],
                ['name' => 'motos', 'description' => 'Motocicletas'],
                ['name' => 'caminhoes', 'description' => 'Caminhões']
            )
            ->create();
    }
}
