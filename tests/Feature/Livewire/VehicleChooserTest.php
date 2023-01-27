<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\VehicleChooser;
use Livewire\Livewire;
use Tests\TestCase;

class VehicleChooserTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(VehicleChooser::class);

        $component->assertStatus(200);
    }
}
