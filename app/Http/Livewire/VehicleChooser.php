<?php

namespace App\Http\Livewire;

use App\Models\{Manufacturer, Type, Vehicle, VehicleYear};
use Exception;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class VehicleChooser extends Component
{
    use Actions;

    public const EMPTY_VALUE = 'empty';

    public const TYPE_CARS = 'carros';

    public const TYPE_BIKES = 'motos';

    public const TYPE_TRUCKS = 'caminhoes';

    public ?string $type = null;

    public ?int $manufacturer = null;

    public ?int $vehicle = null;

    public ?int $year = null;

    public function updatedType(): void
    {
        if ($this->type === self::EMPTY_VALUE) {
            $this->reset('type');
        }

        $this->reset('manufacturer', 'vehicle', 'year');
    }

    public function updatedManufacturer(): void
    {
        if ($this->manufacturer === self::EMPTY_VALUE) {
            $this->reset('manufacturer');
        }

        $this->reset('vehicle', 'year');
    }

    public function updatedVehicle(): void
    {
        if ($this->vehicle === self::EMPTY_VALUE) {
            $this->reset('vehicle');
        }

        $this->reset('year');
    }

    public function updatedYear(): void
    {
        if ($this->year === self::EMPTY_VALUE) {
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
        if ($this->type === self::EMPTY_VALUE) {
            return collect([]);
        }

        return Manufacturer::query()
            ->where('type_id', $this->type)
            ->get();
    }

    public function getVehiclesProperty(): Collection
    {
        if ($this->manufacturer === self::EMPTY_VALUE) {
            return collect([]);
        }

        return Vehicle::query()
            ->where('manufacturer_id', $this->manufacturer)
            ->get();
    }

    public function getYearsProperty(): Collection
    {
        if ($this->vehicle === self::EMPTY_VALUE) {
            return collect([]);
        }

        return VehicleYear::query()
            ->where('vehicle_id', $this->vehicle)
            ->get();
    }

    private function submit(): void
    {
        try {
            $this->emitTo('fipe-information', 'fipe::query', $this->year);
        } catch (Exception $e) {
            throw $e;
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
        return view('livewire.vehicle-chooser');
    }
}
