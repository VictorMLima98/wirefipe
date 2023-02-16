<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        Type::insert([
            [
                'name'        => 'cars',
                'description' => 'Carros',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'bikes',
                'description' => 'Motos',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'trucks',
                'description' => 'Caminhões',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
