<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Playground extends Command
{
    protected $signature = 'playground';

    protected $description = 'Playground';

    public function handle(): int
    {
        return Command::SUCCESS;
    }
}
