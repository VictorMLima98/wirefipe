<?php

namespace App\Services;

use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Http;

class FipeApiService
{
    public const BASE_URL = 'https://parallelum.com.br/fipe/api/v1/';

    public const ACCEPTED_TYPES = [
        'carros',
        'motos',
        'caminhoes',
    ];

    public ?string $type = null;

    public ?string $brand = null;

    public ?string $model = null;

    public ?string $year = null;

    public function ofType(string $type): self
    {
        if (!in_array($type, self::ACCEPTED_TYPES)) {
            return new JsonResponse([
                'message' => 'Invalid type.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $this->type = $type;

        return $this;
    }

    public function ofBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function ofModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function ofYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function get(): JsonResponse | array
    {
        try {
            $url = self::BASE_URL .
                $this->type . '/marcas/' .
                $this->brand . '/modelos/' .
                $this->model . '/anos/' . $this->year;

            $response = Http::get($url)->json();

            if (!$response) {
                return new JsonResponse([
                    'message' => 'Invalid request',
                ], Response::HTTP_BAD_REQUEST);
            }

            return $response;
        } catch (\Throwable $th) {
            report($th);

            throw $th;
        }
    }
}
