<?php

namespace App\Http\Livewire;

use App\Facades\Fipe;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class VehicleChooser extends Component
{
    public const NOT_SELECTED = 'not_selected';

    public const TYPE_CARS = 'carros';

    public const TYPE_BIKES = 'motos';

    public const TYPE_TRUCKS = 'caminhoes';

    public ?string $type = self::NOT_SELECTED;

    public ?string $brand = self::NOT_SELECTED;

    public ?string $model = self::NOT_SELECTED;

    public ?string $year = self::NOT_SELECTED;

    public array $brands = [];

    public function updatedType(): void
    {
        if ($this->type === self::NOT_SELECTED) {
            return;
        }

        $this->brands = collect(Cache::rememberForever(
            "brands::{$this->type}",
            fn () => Fipe::ofType($this->type)->get()
        ))->map(fn (array $brand) => [
            'id'   => $brand['codigo'],
            'name' => $brand['nome'],
        ])->toArray();
    }

    public function render(): View
    {
        return view('livewire.vehicle-chooser');
    }
}
