<?php

namespace Tests\Mocks\Services;

class FipeApiServiceMock
{
    public static function sucessfulResponse(): array
    {
        return [
            "TipoVeiculo"      => 1,
            "Valor"            => "R$ 18.063,00",
            "Marca"            => "Peugeot",
            "Modelo"           => "207 SW XR 1.4 Flex 8V 5p",
            "AnoModelo"        => 2010,
            "Combustivel"      => "Gasolina",
            "CodigoFipe"       => "024152-0",
            "MesReferencia"    => "abril de 2023",
            "SiglaCombustivel" => "G",
        ];
    }
}
