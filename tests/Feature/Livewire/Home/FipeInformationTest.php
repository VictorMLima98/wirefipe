<?php

namespace Tests\Feature\Livewire\Home;

use App\Dto\FipeData;
use App\Facades\Fipe;
use App\Http\Livewire\Home\FipeInformation;
use App\Models\{Manufacturer, Type, Vehicle, VehicleYear};
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\Mocks\Services\FipeApiServiceMock;
use Tests\TestCase;

class FipeInformationTest extends TestCase
{
    /** @test */
    public function it_should_render_the_component(): void
    {
        Livewire::test(FipeInformation::class)
            ->assertOk();
    }

    /** @test */
    public function it_should_make_api_request_when_receiving_vehicle_year(): void
    {
        $year = $this->createYear();

        $response = FipeApiServiceMock::sucessfulResponse();

        Http::fake([
            Fipe::buildFakeUrl($year) => $response,
        ]);

        Livewire::test(FipeInformation::class)
            ->assertOk()
            ->call('retrieve', $year->id)
            ->assertSet('fipe', $this->createFipeDataFromResponse($response));
    }

    /** @test */
    public function it_should_display_fipe_data_in_the_frontend(): void
    {
        $year = $this->createYear();

        $response = FipeApiServiceMock::sucessfulResponse();

        Http::fake([
            Fipe::buildFakeUrl($year) => $response,
        ]);

        $fipe = $this->createFipeDataFromResponse($response);

        Livewire::test(FipeInformation::class)
            ->assertOk()
            ->call('retrieve', $year->id)
            ->assertSet('fipe', $fipe)
            ->assertSee([
                $fipe->manufacturer,
                $fipe->vehicle,
                $fipe->year,
                $fipe->fuel,
                $fipe->id,
                $fipe->price,
                str()->ucfirst($fipe->period),
            ]);
    }

    private function createYear(): VehicleYear
    {
        return VehicleYear::factory()
            ->for(
                Vehicle::factory()
                ->for(
                    Manufacturer::factory()
                    ->for(
                        Type::factory()->car()
                    )
                )
            )->create();
    }

    private function createFipeDataFromResponse(array $response): FipeData
    {
        return FipeData::from([
            'id'           => $response['CodigoFipe'],
            'price'        => $response['Valor'],
            'manufacturer' => $response['Marca'],
            'vehicle'      => $response['Modelo'],
            'year'         => $response['AnoModelo'],
            'fuelId'       => $response['SiglaCombustivel'],
            'fuel'         => $response['Combustivel'],
            'period'       => $response['MesReferencia'],
            'type'         => $response['TipoVeiculo'],
        ]);
    }
}
