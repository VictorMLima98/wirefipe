<?php

namespace App\Console\Commands;

use App\Facades\Fipe;
use App\Models\Brand;
use Illuminate\Console\Command;

class ImportFipeData extends Command
{
    protected $signature = 'import:fipe';

    protected $description = "Imports all FIPE data into FIPE Agora's database.";

    public function handle(): void
    {
        // wip
        // collect([
        //     'carros',
        //     'motos',
        //     'caminhoes',
        // ])->each(function (string $type) {
        //     $brands = collect(Fipe::ofType($type)->get())->map(fn (array $brand) => [
        //         'code' => data_get($brand, 'codigo'),
        //         'name' => data_get($brand, 'nome'),
        //     ]);

        //     Brand::factory()->createMany($brands);
        // });
    }
}
