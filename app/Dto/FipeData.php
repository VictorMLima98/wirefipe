<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class FipeData extends Data
{
    public function __construct(
        public string $id,
        public string $price,
        public string $manufacturer,
        public string $vehicle,
        public string $year,
        public string $fuelId,
        public string $fuel,
        public string $period,
        public string $type
    ) {
        //
    }
}
