<?php

namespace App\Http\Livewire\Home;

use App\Models\{Manufacturer, Type, Vehicle, VehicleYear};
use Exception;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class VehicleChooser extends Component
{
    use Actions;

    public const NONE = 'none';

    public const TYPE_CARS = 'carros';

    public const TYPE_BIKES = 'motos';

    public const TYPE_TRUCKS = 'caminhoes';

    public string | int | null $type = null;

    public string | int | null $manufacturer = null;

    public string | int | null $vehicle = null;

    public string | int | null $year = null;

    public function updatedType(): void
    {
        if ($this->type === self::NONE) {
            $this->reset('type');
        }

        $this->reset('manufacturer', 'vehicle', 'year');
    }

    public function updatedManufacturer(): void
    {
        if ($this->manufacturer === self::NONE) {
            $this->reset('manufacturer');
        }

        $this->reset('vehicle', 'year');
    }

    public function updatedVehicle(): void
    {
        if ($this->vehicle === self::NONE) {
            $this->reset('vehicle');
        }

        $this->reset('year');
    }

    public function updatedYear(): void
    {
        if ($this->year === self::NONE) {
            $this->dispatchBrowserEvent('hide-loader');

            return;
        }

        $this->submit();
    }

    public function getTypesProperty(): Collection
    {
        return Type::all();
    }

    public function getManufacturersProperty(): Collection
    {
        if ($this->type === self::NONE) {
            return collect([]);
        }

        return Manufacturer::query()
            ->where('type_id', $this->type)
            ->orderBy('name')
            ->get();
    }

    public function getVehiclesProperty(): Collection
    {
        if ($this->manufacturer === self::NONE) {
            return collect([]);
        }

        return Vehicle::query()
            ->where('manufacturer_id', $this->manufacturer)
            ->orderBy('name')
            ->get();
    }

    public function getYearsProperty(): Collection
    {
        if ($this->vehicle === self::NONE) {
            return collect([]);
        }

        return VehicleYear::query()
            ->where('vehicle_id', $this->vehicle)
            ->orderBy('year')
            ->get();
    }

    private function submit(): void
    {
        try {
            $this->emitTo('home.fipe-information', 'fipe::query', $this->year);
        } catch (Exception $e) {
            report($e);

            $this->dispatchBrowserEvent('hide-loader');

            $this->notification()->error(
                title: "Erro",
                description: "Ocorreu um erro ao consultar a Tabela FIPE, por favor tente novamente."
            );
        }
    }

    public function render(): View
    {
        return view('livewire.home.vehicle-chooser');
    }
}
