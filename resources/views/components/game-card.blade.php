@props(['game'])

<div class="flex flex-col justify-end h-56 rounded-xl border bg-white shadow m-5 p-5 gap-1 place-items-left hover:shadow-lg">
{{--    <img href="">--}}
    <h3 class="font-semibold text-sm">{{ $game->title }}</h3>
    <p class="font-normal text-xs">{{ $game->description }}</p>
</div>
