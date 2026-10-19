<x-app-layout>
    @if (session('success'))
        <div class="m-10 p-3 bg-green-100 text-green-700 rounded-xl font-bold border-green-700 border-2">
            {{ session('success') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <x-input-label class="flex">
        <input placeholder="Search games..." class="w-full border-2">
    </x-input-label>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

    <div class="pt-10">
        <p class="text-sm">Zie hier een overzicht van indie games. Je kan ze bekijken, beoordelen en zoeken op
            naam.</p>
    </div>

    <div class="grid grid-cols-3">

        @foreach ($games as $game)
            <a href="{{ route('games.show', $game) }}">
                <x-game-card :game="$game"/>
            </a>
        @endforeach
    </div>

</x-app-layout>

