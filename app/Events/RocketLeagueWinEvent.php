<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class RocketLeagueWinEvent
{
    use Dispatchable;

    public function __construct(public int $userId)
    {
    }
}
