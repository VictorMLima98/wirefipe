<?php

namespace App\Console\Commands;

use App\Services\FipeApiService;
use Illuminate\Console\Command;

class Playground extends Command
{
    protected $signature = 'playground';

    protected $description = 'Playground';

    public function handle(): int
    {
        $service = new FipeApiService();

        $response = $service->ofType('carros')
            ->ofBrand('44')
            ->ofModel('4722')
            ->ofYear('2010-1')
            ->get();

        dd($response);

        return Command::SUCCESS;
    }
}
