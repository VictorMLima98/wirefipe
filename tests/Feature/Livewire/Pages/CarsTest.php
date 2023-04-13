<?php

namespace Tests\Feature\Livewire\Pages;

use App\Http\Livewire\Pages\Cars;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Livewire\Livewire;
use Tests\TestCase;

class CarsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Cars::class);

        $component->assertStatus(200);
    }
}
