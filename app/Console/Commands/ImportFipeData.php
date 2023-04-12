<?php

namespace App\Console\Commands;

use App\Facades\Fipe;
use App\Models\{Brand, Manufacturer, Type, Vehicle, VehicleYear};
use Illuminate\Console\Command;

class ImportFipeData extends Command
{
    protected $signature = 'import:fipe';

    protected $description = "Imports all FIPE data into FIPE Agora's database.";

    public function handle(): void
    {
        Type::each(function (Type $type) {
            $manufacturers = collect(Fipe::ofType($type->name)->get())->map(fn (array $brand) => [
                'external_id' => data_get($brand, 'codigo'),
                'name'        => data_get($brand, 'nome'),
                'type_id'     => $type->id,
            ])->toArray();

            Manufacturer::upsert($manufacturers, ['external_id'], ['name']);
        });

        Manufacturer::cursor()->each(function (Manufacturer $manufacturer) {
            $vehicles = collect(Fipe::ofType($manufacturer->type->name)->ofBrand($manufacturer->external_id)->get()['modelos'])
                ->map(fn (array $vehicle) => [
                    'external_id'     => data_get($vehicle, 'codigo'),
                    'name'            => data_get($vehicle, 'nome'),
                    'manufacturer_id' => $manufacturer->id,
                ])->toArray();

            Vehicle::upsert($vehicles, ['external_id'], ['name']);
        });

        Vehicle::cursor()->each(function (Vehicle $vehicle) {
            $years = collect(
                Fipe::ofType($vehicle->manufacturer->type->name)
                    ->ofBrand($vehicle->manufacturer->external_id)
                    ->ofModel($vehicle->external_id)
                    ->get()
            )->map(fn (array $year) => [
                'external_id' => data_get($year, 'codigo'),
                'year'        => data_get($year, 'nome'),
                'code'        => $vehicle->id . '-' . data_get($year, 'codigo'),
                'vehicle_id'  => $vehicle->id,
            ])->toArray();

            VehicleYear::upsert($years, ['code'], ['year']);
        });
    }
}
