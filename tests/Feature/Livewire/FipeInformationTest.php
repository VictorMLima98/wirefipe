<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\FipeInformation;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Livewire\Livewire;
use Tests\TestCase;

class FipeInformationTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(FipeInformation::class);

        $component->assertStatus(200);
    }
}
