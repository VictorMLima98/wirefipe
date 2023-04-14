<?php

namespace App\Http\Livewire\Pages;

use App\Models\{Manufacturer as ManufacturerModel, Vehicle};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\{Component, WithPagination};

class Manufacturer extends Component
{
    use WithPagination;

    public const LOAD_MORE = 16;

    public ManufacturerModel $manufacturer;

    public int $perPage = 20;

    public string $search = '';

    public function getVehiclesProperty(): LengthAwarePaginator
    {
        return Vehicle::query()
            ->ofManufacturer($this->manufacturer)
            ->when(
                $this->search,
                fn (Builder $query) => $query->search($this->search),
            )
            ->withCount('years')
            ->orderBy('name')
            ->paginate($this->perPage);
    }

    public function loadMore(): void
    {
        $this->perPage += self::LOAD_MORE;
    }

    public function render(): View
    {
        return view('livewire.pages.manufacturer');
    }
}
