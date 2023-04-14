<?php

use App\Models\Manufacturer;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        collect([
            [
                'manufacturer_id' => 29,
                'file_path'       => storage_path('featured-manufacturers/fiat.svg'),
            ], [
                'manufacturer_id' => 31,
                'file_path'       => storage_path('featured-manufacturers/ford.svg'),
            ], [
                'manufacturer_id' => 35,
                'file_path'       => storage_path('featured-manufacturers/chevrolet.svg'),
            ], [
                'manufacturer_id' => 41,
                'file_path'       => storage_path('featured-manufacturers/honda.svg'),
            ], [
                'manufacturer_id' => 42,
                'file_path'       => storage_path('featured-manufacturers/hyundai.svg'),
            ], [
                'manufacturer_id' => 70,
                'file_path'       => storage_path('featured-manufacturers/peugeot.svg'),
            ], [
                'manufacturer_id' => 76,
                'file_path'       => storage_path('featured-manufacturers/renault.svg'),
            ], [
                'manufacturer_id' => 91,
                'file_path'       => storage_path('featured-manufacturers/vw.svg'),
            ],
        ])->each(function (array $data) {
            Manufacturer::find($data['manufacturer_id'])
                ?->addMedia($data['file_path'])
                ->usingName('logo')
                ->preservingOriginal()
                ->toMediaCollection();
        });
    }

    public function down(): void
    {

    }
};
