<?php

namespace App\Http\Livewire;

use App\Dto\FipeData;
use App\Facades\Fipe;
use App\Models\VehicleYear;
use Livewire\Component;

class FipeInformation extends Component
{
    protected ?FipeData $fipeData = null;

    public bool $show = false;

    protected $listeners = [
        'fipe::query' => 'retrieve',
    ];

    public function retrieve(VehicleYear $year): void
    {
        $this->fipeData = Fipe::ofType($year->vehicle->manufacturer->type->name)
            ->ofBrand($year->vehicle->manufacturer->external_id)
            ->ofModel($year->vehicle->external_id)
            ->ofYear($year->external_id)
            ->get();

        $this->dispatchBrowserEvent('hide-loader');

        $this->show = true;
    }

    public function getFipeProperty(): ?FipeData
    {
        return $this->fipeData;
    }

    public function render()
    {
        return view('livewire.fipe-information');
    }
}
