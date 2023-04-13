<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\{FipeInformation, Index, VehicleChooser};
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function the_component_can_render(): void
    {
        Livewire::test(Index::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_should_render_vehicle_chooser(): void
    {
        Livewire::test(Index::class)
            ->assertSeeLivewire(VehicleChooser::class);
    }

    /** @test */
    public function it_should_render_fipe_information_component(): void
    {
        Livewire::test(Index::class)
            ->assertSeeLivewire(FipeInformation::class);
    }
}
