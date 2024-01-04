<?php

namespace App\Recorders;

use App\Events\RocketLeagueWinEvent;
use Laravel\Pulse\Facades\Pulse;

class RocketLeagueWinsRecorder
{
    public array $listen = [RocketLeagueWinEvent::class];

    public function record(RocketLeagueWinEvent $event): void
    {
        Pulse::record("rocket_league_wins", $event->userId, 1)
            ->sum()
            ->count();
    }
}
