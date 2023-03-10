<?php

namespace App\Services;

use App\Exceptions\FipeUnknownTypeException;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Http;

class FipeApiService
{
    public const BASE_URL = 'https://parallelum.com.br/fipe/api/v1/';

    private const BRANDS_URI = 'marcas';

    private const MODELS_URI = 'modelos';

    private const YEARS_URI = 'anos';

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
        throw_if(!in_array($type, self::ACCEPTED_TYPES), FipeUnknownTypeException::class);

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
            $url = $this->buildUrl();

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

    private function buildUrl(): ?string
    {
        $url = self::BASE_URL;

        if ($this->type) {
            $url .= $this->type . '/' . self::BRANDS_URI;
        }

        if ($this->brand) {
            $url .= '/' . $this->brand . '/' . self::MODELS_URI;
        }

        if ($this->model) {
            $url .= '/' . $this->model . '/' . self::YEARS_URI;
        }

        if ($this->year) {
            $url .= '/' . $this->year;
        }

        return $url;
    }
}
