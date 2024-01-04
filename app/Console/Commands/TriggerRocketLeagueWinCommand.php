<?php

namespace App\Console\Commands;

use App\Events\RocketLeagueWinEvent;
use Illuminate\Console\Command;

class TriggerRocketLeagueWinCommand extends Command
{
    protected $signature = 'rocket-league:trigger-win {userId}';

    protected $description = 'Trigger a rocket league win.';

    public function handle(): void
    {
        $userId = $this->argument('userId');

        event(new RocketLeagueWinEvent($userId));
    }
}
