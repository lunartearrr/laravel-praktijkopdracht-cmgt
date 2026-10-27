<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">

        <h1 class="font-bold text-xl pb-5">Selected game</h1>

        <div class="flex pb-2">
            <h2 class="mb-5 font-bold">Title: </h2>
            <p class="">{{ $game->title }}</p>
        </div>

        <div class="flex pb-2">
            <h2 class="mb-5 font-bold">Genre: </h2>
            <p class="">{{ $game->genre->name }}</p>
        </div>

        <div class="flex flex-col pb-5">
            <h2 class="pb-2 font-bold">Description </h2>
            <p>{{ $game->description }}</p>
        </div>

        <div class="flex flex-col">
            <h2 class="mb-2 font-bold">Ratings </h2>
            {{--            <p class="">{{ $game->reviews }}</p>--}}
            @guest
                <a href="{{ route('login') }}" class="underline text-gray-500 font-semibold hover:text-gray-700">
                    Sign in to rate or review!
                </a>
            @endguest
        </div>

    </div>
</x-app-layout>
