<?php

namespace App\Facades;

use App\Services\FipeApiService;
use Illuminate\Support\Facades\Facade;

class Fipe extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return FipeApiService::class;
    }
}
