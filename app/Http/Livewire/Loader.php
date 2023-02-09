<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Loader extends Component
{
    public bool $show = false;

    protected $listeners = [
        'showLoader',
        'hideLoader',
    ];

    public function showLoader(): void
    {
        $this->show = true;
    }

    public function hideLoader(): void
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.loader');
    }
}
