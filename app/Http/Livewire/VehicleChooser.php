<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VehicleChooser extends Component
{
    public ?string $type = null;

    public ?string $brand = null;

    public ?string $name = null;

    public ?string $year = null;

    public function render()
    {
        return view('livewire.vehicle-chooser');
    }
}
