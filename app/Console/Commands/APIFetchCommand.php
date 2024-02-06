<?php

namespace App\Console\Commands;

use App\Http\Managers\PunkApiManager;
use Illuminate\Console\Command;

class APIFetchCommand extends Command
{
    protected $signature = 'api:fetch';
    protected $description = 'Fetches all PunkAPI Brews';

    public function handle(PunkApiManager $punkApiManager)
    {
        $this->info('🍻 Fetching the brews!');
        $punkApiManager->fetch();
        $this->info('🍻 Brews successfully fetched!');
        return Command::SUCCESS;
    }
}
