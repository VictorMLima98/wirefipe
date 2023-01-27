<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class VehicleChooser extends Component
{
    public const NOT_SELECTED = 'not_selected';

    public const TYPE_CARS = 'cars';

    public const TYPE_BIKES = 'bikes';

    public const TYPE_TRUCKS = 'trucks';

    public ?string $type = self::NOT_SELECTED;

    public ?string $brand = self::NOT_SELECTED;

    public ?string $name = self::NOT_SELECTED;

    public ?string $year = self::NOT_SELECTED;

    public function render(): View
    {
        return view('livewire.vehicle-chooser');
    }
}
