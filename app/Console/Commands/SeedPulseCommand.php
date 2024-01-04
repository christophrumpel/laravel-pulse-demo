<?php

namespace App\Console\Commands;

use App\Events\RocketLeagueWinEvent;
use App\Jobs\PublishLiveStreamJob;
use App\Jobs\SlowJob;
use App\Models\LiveStream;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Laravel\Pulse\Facades\Pulse;

class SeedPulseCommand extends Command
{
    protected $signature = 'seed:pulse';

    protected $description = 'Seed the Pulse dashboard with fake data.';

    public function handle(): void
    {
        while (true) {
            $this->info('Seed Pulse');

            $this->info('Dispatch jobs');
            PublishLiveStreamJob::dispatch()->onQueue('live-streams');
            if (rand(1, 3) === 1) {
                SlowJob::dispatch();
            }

            $this->info('Cache data');
            if (rand(1, 10) === 1) {
                Cache::remember('all-streams', 60, fn() => LiveStream::all());
            } else {
                $stream = LiveStream::find(rand(1, 10000));
                Cache::remember("stream:$stream->id", 60, fn() => $stream);
            }

            $this->info('Make slow request');


            $endpoints = collect([
                'http://laravel-pulse.test',
                'http://laravel-pulse.test/status',
                'http://laravel-pulse.test/contact',
                'http://laravel-pulse.test/export',
                'http://laravel-pulse.test/permium',
                'http://laravel-pulse.test/api',
            ]);
            Http::get($endpoints->random());


            $this->info('Slow query');
            $streams = DB::table('live_streams')
                ->whereRaw('LOWER(title) like ?', ['%example@mail.com%'])
                ->get();


            $this->info('Make user requests');
            Pulse::record(
                type: 'user_request',
                key: rand(1, 11),
                timestamp: now()
            )->count();
            Pulse::record(
                type: 'user_request',
                key: rand(1, 11),
                timestamp: now()
            )->count();
            Pulse::record(
                type: 'user_request',
                key: rand(1, 11),
                timestamp: now()
            )->count();

            $this->info('See Rocket League wins');
            event(new RocketLeagueWinEvent(2));
            event(new RocketLeagueWinEvent(2));
            event(new RocketLeagueWinEvent(rand(1, 11)));

            app()->make(\Laravel\Pulse\Pulse::class)->ingest();
            
            // Sleep for 5 seconds
            sleep(3);
        }

    }
}
