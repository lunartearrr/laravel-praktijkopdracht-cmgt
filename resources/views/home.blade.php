<x-app-layout class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 space-y-8">
        <h1 class="font-semibold text-2xl text-gray-800">{{ __('Home') }}</h1>

        <form method="GET" action="{{ route('home') }}" class="flex flex-col sm:flex-row gap-3">
            <x-text-input type="text" name="search" value="{{ request('search') }}"
                          placeholder="Search games..." class="flex-1"/>

            <select name="genre" onchange="this.form.submit()"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">All genres</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(request('genre') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            <x-primary-button type="submit">{{ __('Search') }}</x-primary-button>
        </form>
    </div>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div>
            <p class="text-m">Browse all indie games. Search by name or filter by genre, and see what other players
                think.</p>
        </div>

        <div class="grid gap-6 grid-cols-3">

            @forelse ($games as $game)
                <a href="{{ route('games.show', $game) }}">
                    <x-game-card :game="$game"/>
                </a>
            @empty
                <p class="col-span-3 text-gray-500">No games found. Try another search or genre.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>

