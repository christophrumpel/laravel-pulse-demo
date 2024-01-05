<?php

namespace App\PulseRecorders;

use App\Events\RocketLeagueWinEvent;
use Laravel\Pulse\Facades\Pulse;

class RocketLeagueWinsRecorder
{
    public array $listen = [
        RocketLeagueWinEvent::class
    ];

    public function record(RocketLeagueWinEvent $event): void
    {
        Pulse::record('rocket_league_win', $event->userId, 1)->count();
    }
}
