<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\View\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;

class RocketLeagueWinsCard extends Card
{
    public function render(): View
    {

        $wins = $this->aggregate('rocket_league_win', 'count');
        $users = Pulse::resolveUsers($wins->pluck('key'));

        $wins = $wins->map(fn($row) => (object)[
            'key' => $row->key,
            'user' => $users->find($row->key),
            'count' => (int)$row->count,
        ]);

        return view('livewire.pulse.rocket-league-wins-card', [
            'wins' => $wins,
        ]);
    }
}
