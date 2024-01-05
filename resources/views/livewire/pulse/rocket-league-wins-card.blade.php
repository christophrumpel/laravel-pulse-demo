<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Rocket League Wins">
        <x-slot:icon>
            <x-pulse::icons.rocket-launch/>
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        <div class="grid grid-cols-1 @lg:grid-cols-2 @3xl:grid-cols-3 @6xl:grid-cols-4 gap-2">
            @foreach($wins as $win)
                <x-pulse::user-card wire:key="{{ $win->key }}" :user="$win->user">
                    <x-slot:stats>
                        {{ $win->count }}
                    </x-slot:stats>
                </x-pulse::user-card>
            @endforeach
        </div>
    </x-pulse::scroll>
</x-pulse::card>
