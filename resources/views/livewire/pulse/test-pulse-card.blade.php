<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Rocket League Wins">
        <x-slot:icon>
            <x-pulse::icons.rocket-launch/>
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        @foreach ($wins as $win)
            <x-pulse::user-card wire:key="{{ $win->key }}" :user="$win->user">
                <x-slot:stats>
                    {{ number_format($win->count) }}
                </x-slot:stats>
            </x-pulse::user-card>
            {{--            {{ $win->user->name }}--}}
            {{--            {{ $win->count }}--}}
        @endforeach
    </x-pulse::scroll>
</x-pulse::card>
