<?php

namespace Tests\Feature\Livewire;

use App\Dto\FipeData;
use App\Facades\Fipe;
use App\Http\Livewire\FipeInformation;
use App\Models\{Manufacturer, Type, Vehicle, VehicleYear};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\Mocks\Services\FipeApiServiceMock;
use Tests\TestCase;

class FipeInformationTest extends TestCase
{
    /** @test */
    public function the_component_can_render(): void
    {
        Livewire::test(FipeInformation::class)
            ->assertOk();
    }

    /** @test */
    public function it_should_make_api_request_when_receiving_vehicle_year(): void
    {
        $year = VehicleYear::factory()
            ->for(
                Vehicle::factory()->for(
                    Manufacturer::factory()->for(
                        Type::factory()->car()
                    )
                )
            )
            ->create();

        $response = FipeApiServiceMock::sucessfulResponse();

        Http::fake([
            Fipe::buildFakeUrl($year) => $response,
        ]);

        Livewire::test(FipeInformation::class)
            ->assertOk()
            ->call('retrieve', $year->id)
            ->assertSet('fipe', FipeData::from([
                'id'           => $response['CodigoFipe'],
                'price'        => $response['Valor'],
                'manufacturer' => $response['Marca'],
                'vehicle'      => $response['Modelo'],
                'year'         => $response['AnoModelo'],
                'fuelId'       => $response['SiglaCombustivel'],
                'fuel'         => $response['Combustivel'],
                'period'       => $response['MesReferencia'],
                'type'         => $response['TipoVeiculo'],
            ]));
    }
}
