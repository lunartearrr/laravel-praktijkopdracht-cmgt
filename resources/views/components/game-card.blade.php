@props(['game'])
<div
    class="flex flex-col h-full rounded-xl border bg-white shadow p-5 gap-3 hover:shadow-lg transition">
    {{--    <img href="">--}}
    <h3 class="font-semibold text-sm">{{ $game->title }}</h3>
    <p class="font-normal text-xs">{{ $game->description }}</p>
</div>
