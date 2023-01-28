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

        $response = $service->ofType('motos')
            ->get();

        dd($response);

        return Command::SUCCESS;
    }
}
