<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class PunkApiService
{
    public const API = 'https://api.punkapi.com/v2/';
    public const PER_PAGE = 80;

    /**
     * Gets a page of brews from Punk API
     *
     * @param  integer $page
     * @return array|null
     */
    public function getBrews($page = 1): array|null
    {
        $response = Http::get($this::API.'beers/', [
            'per_page' => $this::PER_PAGE,
            'page' => $page
        ]);
        if ($response->successful()) {
            return $response->json() ?? null;
        }
        return null;
    }
}