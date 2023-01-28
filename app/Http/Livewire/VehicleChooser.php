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

    public array $models = [];

    public array $years = [];

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

    public function updatedBrand(): void
    {
        if ($this->brand === self::NOT_SELECTED) {
            return;
        }

        $this->models = collect(
            Cache::rememberForever(
                "models::{$this->type}::{$this->brand}",
                fn () => Fipe::ofType($this->type)->ofBrand($this->brand)->get()
            )['modelos']
        )->map(fn (array $model) => [
            'id'   => $model['codigo'],
            'name' => $model['nome'],
        ])->toArray();
    }

    public function updatedModel(): void
    {
        if ($this->model === self::NOT_SELECTED) {
            return;
        }

        $this->years = collect(
            Cache::rememberForever(
                "years::{$this->type}::{$this->brand}::{$this->model}",
                fn () => Fipe::ofType($this->type)->ofBrand($this->brand)->ofModel($this->model)->get()
            )
        )->map(fn (array $year) => [
            'id'   => $year['codigo'],
            'name' => $year['nome'],
        ])->toArray();
    }

    public function updatedYear(): void
    {
        if ($this->year === self::NOT_SELECTED) {
            return;
        }

        $fipe = collect(
            Cache::rememberForever(
                "fipe::{$this->type}::{$this->brand}::{$this->model}::{$this->year}",
                fn () => Fipe::ofType($this->type)->ofBrand($this->brand)->ofModel($this->model)->ofYear($this->year)->get()
            )
        );

        $sanitizedFipe = [];

        $sanitizedFipe['price']            = $fipe['Valor'];
        $sanitizedFipe['brand']            = $fipe['Marca'];
        $sanitizedFipe['model']            = $fipe['Modelo'];
        $sanitizedFipe['year']             = $fipe['AnoModelo'];
        $sanitizedFipe['fuel_id']          = $fipe['SiglaCombustivel'];
        $sanitizedFipe['fuel_description'] = $fipe['Combustivel'];
        $sanitizedFipe['fipe_id']          = $fipe['CodigoFipe'];
        $sanitizedFipe['fipe_period']      = $fipe['MesReferencia'];
        $sanitizedFipe['vehicle_type']     = $fipe['TipoVeiculo'];

        $this->emitTo('fipe-information', 'fipe::retrieved', $sanitizedFipe);
    }

    public function render(): View
    {
        return view('livewire.vehicle-chooser');
    }
}
