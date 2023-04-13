<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\VehicleChooser;
use App\Models\{Manufacturer, Type, Vehicle, VehicleYear};
use Database\Seeders\TypeSeeder;
use Livewire\Livewire;
use Tests\TestCase;

class VehicleChooserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(TypeSeeder::class);
    }

    /** @test */
    public function the_component_can_render(): void
    {
        Livewire::test(VehicleChooser::class)
            ->assertOk();
    }

    /** @test */
    public function it_should_render_all_possible_vehicle_types(): void
    {
        $options = Type::all()->map(fn (Type $type) => [
            '<option value="' . $type->id . '">' . str($type->description)->title() . '</option>',
        ])->flatten()->toArray();

        Livewire::test(VehicleChooser::class)
            ->assertOk()
            ->assertSeeHtmlInOrder($options);
    }

    /** @test */
    public function it_should_render_all_manufacturers_for_a_given_type(): void
    {
        $type = Type::first();

        $options = Manufacturer::factory(3)->create([
            'type_id' => $type,
        ])->map(fn (Manufacturer $manufacturer) => [
            '<option value="' . $manufacturer->id . '">' . str($manufacturer->name)->upper() . '</option>',
        ])->flatten()->toArray();

        Livewire::test(VehicleChooser::class, ['type' => $type->id])
            ->assertOk()
            ->assertSeeHtmlInOrder($options);
    }

    /** @test */
    public function it_should_render_all_vehicles_for_a_given_manufacturer(): void
    {
        $type = Type::first();

        $manufacturer = Manufacturer::factory()->create([
            'type_id' => $type,
        ]);

        $options = Vehicle::factory(3)->create([
            'manufacturer_id' => $manufacturer,
        ])->map(fn (Vehicle $vehicle) => [
            '<option value="' . $vehicle->id . '">' . str($vehicle->name)->upper() . '</option>',
        ])->flatten()->toArray();

        Livewire::test(VehicleChooser::class, ['type' => $type->id, 'manufacturer' => $manufacturer->id])
            ->assertOk()
            ->assertSeeHtmlInOrder($options);
    }

    /** @test */
    public function it_should_render_all_years_for_a_given_vehicle(): void
    {
        $type = Type::first();

        $manufacturer = Manufacturer::factory()->create([
            'type_id' => $type,
        ]);

        $vehicle = Vehicle::factory()->create([
            'manufacturer_id' => $manufacturer,
        ]);

        $options = VehicleYear::factory(3)->create([
            'vehicle_id' => $vehicle->id,
        ])->map(fn (VehicleYear $year) => [
            '<option value="' . $year->id . '">' . str($year->year)->upper() . '</option>',
        ])->flatten()->toArray();

        Livewire::test(VehicleChooser::class, [
            'type'         => $type->id,
            'manufacturer' => $manufacturer->id,
            'vehicle'      => $vehicle->id,
        ])->assertOk()->assertSeeHtmlInOrder($options);
    }

    /** @test */
    public function it_should_dispatch_an_event_to_fipe_information_component_when_ready_to_query_the_api(): void
    {
        $vehicleYear = VehicleYear::factory()
            ->create();

        Livewire::test(VehicleChooser::class)
            ->set('year', $vehicleYear->id)
            ->assertEmittedTo('fipe-information', 'fipe::query', $vehicleYear->id);
    }
}
