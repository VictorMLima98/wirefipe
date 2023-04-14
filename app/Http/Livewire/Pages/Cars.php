<?php

namespace App\Http\Livewire\Pages;

use App\Models\{Manufacturer, Type};
use Illuminate\Database\Eloquent\{Builder, Collection};
use Illuminate\View\View;
use Livewire\Component;

class Cars extends Component
{
    public Type $type;

    public string $search = '';

    public function mount(): void
    {
        $this->type = Type::cars()->first();
    }

    public function getManufacturersProperty(): Collection
    {
        return Manufacturer::query()
            ->ofType($this->type)
            ->when(
                $this->search,
                fn (Builder $query) => $query->search($this->search),
                fn (Builder $query) => $query->featured()
            )
            ->withCount('vehicles')
            ->with('media')
            ->get();
    }

    public function render(): View
    {
        return view('livewire.pages.cars');
    }
}
