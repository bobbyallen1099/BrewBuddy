<?php

namespace Tests\Unit;

use App\Http\Managers\PunkApiManager;
use App\Http\Services\PunkApiService;
use App\Models\Brew;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PunkManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_punk_manager()
    {
        $this->assertTrue($this->getCountOfBrew() === 0);
        $punkManager = new PunkApiManager();
        $punkManager->fetch();
        $this->assertTrue($this->getCountOfBrew() === $this->getTotalBrews());
    }

    private function getCountOfBrew(): int
    {
        return Brew::query()->count();
    }

    private function getTotalBrews(): int
    {
        $punkService = new PunkApiService();
        $page = 1; $total = 0;
        while ($brews = $punkService->getBrews($page)) {
            $total += count($brews);
            $page++;
            sleep(1);
        }
        return $total;
    }
}
