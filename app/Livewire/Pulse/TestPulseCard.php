<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\View\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

#[Lazy]
class TestPulseCard extends Card
{
    public function render(): View
    {
        $counts = $this->aggregate(
            'rocket_league_wins',
            'count',
            limit: 10,
        );

        $users = Pulse::resolveUsers($counts->pluck('key'));
        $counts = $counts->map(fn($row) => (object)[
            'key' => $row->key,
            'user' => $users->find($row->key),
            'count' => (int)$row->count,
        ]);
        return view('livewire.pulse.test-pulse-card', ['wins' => $counts]);
    }
}
