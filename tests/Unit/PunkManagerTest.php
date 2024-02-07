<?php

namespace Tests\Unit;

use App\Http\Managers\PunkApiManager;
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
        $this->assertTrue($this->getCountOfBrew() === 325);
    }

    private function getCountOfBrew(): int
    {
        return Brew::query()->count();
    }
}
