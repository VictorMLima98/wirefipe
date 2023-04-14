<?php

namespace Tests\Feature\Livewire\Pages;

use App\Http\Livewire\Pages\Cars;
use App\Models\{Manufacturer, Type};
use Database\Seeders\TypeSeeder;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Livewire\Livewire;
use Tests\TestCase;

class CarsTest extends TestCase
{
    public Type $type;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(TypeSeeder::class);

        $this->type = Type::cars()->first();
    }

    /** @test */
    public function it_should_render_the_component(): void
    {
        Livewire::test(
            Cars::class,
            ['type' => $this->type]
        )->assertOk();
    }

    /** @test */
    public function it_should_render_the_featured_manufacturers(): void
    {
        $manufacturers = Manufacturer::factory(8)->for(Type::cars()->first())->featured()->create();

        $component = Livewire::test(
            Cars::class,
            ['type' => $this->type]
        )->assertOk();

        $manufacturers->each(
            fn (Manufacturer $manufacturer) => $component->assertSeeHtml($manufacturer->name)
                ->assertSeeHtml($manufacturer->vehicles->count())
        );
    }
}
