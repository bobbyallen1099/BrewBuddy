<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class PunkApiService
{
    protected string $api = 'https://api.punkapi.com/v2/';
    protected int $perPage = 80;

    /**
     * Gets a page of brews from Punk API
     *
     * @param  integer $page
     * @return array|null
     */
    public function getBrews($page = 1): array|null
    {
        $response = Http::get($this->api.'beers/', [
            'per_page' => $this->perPage,
            'page' => $page
        ]);
        if ($response->successful()) {
            return $response->json() ?? null;
        }
        return null;
    }
}