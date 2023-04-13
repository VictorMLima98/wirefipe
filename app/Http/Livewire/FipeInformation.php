<?php

namespace App\Http\Livewire;

use App\Dto\FipeData;
use App\Facades\Fipe;
use App\Models\VehicleYear;
use Exception;
use Livewire\Component;
use WireUi\Traits\Actions;

class FipeInformation extends Component
{
    use Actions;

    protected ?FipeData $fipeData = null;

    public bool $show = false;

    protected $listeners = [
        'fipe::query' => 'retrieve',
    ];

    public function retrieve(int $yearId): void
    {
        try {
            $year = VehicleYear::query()
                ->with('vehicle.manufacturer.type')
                ->findOrFail($yearId);

            $this->fipeData = Fipe::ofType($year->vehicle->manufacturer->type->name)
                ->ofBrand($year->vehicle->manufacturer->external_id)
                ->ofModel($year->vehicle->external_id)
                ->ofYear($year->external_id)
                ->get();

            $this->show = true;
        } catch (Exception $e) {
            report($e);

            $this->notification()->error(
                title: "Erro",
                description: "Ocorreu um erro ao consultar a Tabela FIPE, por favor tente novamente."
            );
        } finally {
            $this->dispatchBrowserEvent('hide-loader');
        }
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
