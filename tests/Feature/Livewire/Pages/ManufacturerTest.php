<?php

namespace Tests\Feature\Livewire\Pages;

use App\Http\Livewire\Pages\Manufacturer;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Livewire\Livewire;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Manufacturer::class);

        $component->assertStatus(200);
    }
}
