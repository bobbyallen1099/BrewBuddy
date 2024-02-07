<?php

namespace Tests\Unit;

use App\Http\Services\PunkApiService;
use Tests\TestCase;

class PunkServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_punk_service()
    {
        $punkService = new PunkApiService();
        $this->assertTrue(count($punkService->getBrews()) === PunkApiService::PER_PAGE);
    }
}
