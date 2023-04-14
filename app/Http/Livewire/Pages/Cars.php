<?php

namespace App\Http\Livewire\Pages;

use App\Models\{Manufacturer, Type};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Cars extends Component
{
    public Type $type;

    public function mount(): void
    {
        $this->type = Type::cars()->first();
    }

    public function getManufacturersProperty(): Collection
    {
        return Manufacturer::featured($this->type)->withCount('vehicles')->get();
    }

    public function render(): View
    {
        return view('livewire.pages.cars');
    }
}
