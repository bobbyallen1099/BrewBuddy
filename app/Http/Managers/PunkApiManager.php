<?php

namespace App\Http\Managers;


use App\Http\Services\PunkApiService;
use App\Models\Brew;
use JetBrains\PhpStorm\Pure;

class PunkApiManager {

    public function callable(): PunkApiService
    {
        return new PunkApiService();
    }

    /**
     * Fetches all Brews from PunkAPI into `brews` table.
     *
     * @param  integer $startingPage
     * @return void
     */
    public function fetch($startingPage = 1): void
    {
        $page = $startingPage;
        while ($brews = $this->callable()->getBrews($page)) {
            $this->migrateBrewPage($brews);
            $page++;
            sleep(1);
        }
    }

    private function migrateBrewPage(array $brews): void
    {
        Brew::query()->upsert($this->mapBrews($brews), 'external_id');
    }

    private function mapBrews($brews): array
    {
        return collect($brews)->map(function($brew) {
            return [
                'external_id' => $brew['id'],
                'name' => $brew['name'],
                'tagline' => $brew['tagline'],
                'description' => $brew['description'],
                'since' => $brew['first_brewed'],
                'image_url' => $brew['image_url'] ?? 'https://images.punkapi.com/v2/keg.png',
                'volume' => ($brew['volume']['value'] ?? 0) .' '. ($brew['volume']['unit'] ?? 'litres'),
                'abv' => $brew['abv'] ?? 0,
                'ibu' => $brew['ibu'] ?? 0,
                'ph' => $brew['ph'] ?? 5,
                'ingredients' => json_encode($brew['ingredients']),
                'food_pairing' => json_encode($brew['food_pairing']),
                'brewers_tips' => $brew['brewers_tips'],
                'additional_data' => json_encode([
                    'boil_volume' => ($brew['boil_volume']['value'] ?? 0) .' '. ($brew['boil_volume']['unit'] ?? 'litres'),
                    'ebc' => $brew['ebc'],
                    'srm' => $brew['srm'],
                    'target_og' => $brew['target_og'],
                    'target_fg' => $brew['target_fg'],
                    'attenuation_level' => $brew['attenuation_level'],
                    'contributed_by' => $brew['contributed_by'],
                ])
            ];
        })->toArray();
    }
}