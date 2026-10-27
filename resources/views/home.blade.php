<x-app-layout class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <x-input-label class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-8 rounded">
        <input placeholder="Search games..." class="w-full border-2">
    </x-input-label>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="pt-10">
            <p class="text-m">Browse all indie games. Search by name or filter by genre, and see what other players think.</p>
        </div>

        <div class="grid grid-cols-3">

            @foreach ($games as $game)
                <a href="{{ route('games.show', $game) }}">
                    <x-game-card :game="$game"/>
                </a>
            @endforeach

        </div>
    </div>

</x-app-layout>

