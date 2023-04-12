<?php

namespace App\Console\Commands;

use App\Facades\Fipe;
use App\Models\{Brand, Manufacturer, Type};
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
    }
}
