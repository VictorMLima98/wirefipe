<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FipeInformation extends Component
{
    public ?array $fipe = null;

    protected $listeners = [
        'fipe::retrieved' => 'setFipe',
    ];

    public function setFipe(array $fipe)
    {
        $this->fipe = $fipe;

        $this->emitTo('loader', 'hideLoader');
    }

    public function render()
    {
        return view('livewire.fipe-information');
    }
}
