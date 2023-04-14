<?php

namespace App\Http\Livewire\Pages;

use App\Models\{Manufacturer as ManufacturerModel, Vehicle};
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class Manufacturer extends Component
{
    public ManufacturerModel $manufacturer;

    public function getVehiclesProperty(): LengthAwarePaginator
    {
        return Vehicle::query()
            ->ofManufacturer($this->manufacturer)
            ->withCount('years')
            ->orderBy('name')
            ->paginate(20);
    }

    public function render(): View
    {
        return view('livewire.pages.manufacturer');
    }
}
