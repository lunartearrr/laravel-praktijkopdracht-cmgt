@props(['game'])
<div
    class="flex flex-col h-full rounded-xl border bg-white shadow p-5 gap-3 hover:shadow-lg transition">
    {{--    <img href="">--}}
    <h3 class="font-semibold text-sm">{{ $game->title }}</h3>
    <p class="font-normal text-xs">{{ $game->description }}</p>

    @auth
        @if (auth()->user()->role === 'admin')
            <div class="py-4 flex justify-end gap-4">

                <a href="{{ route('games.edit', $game) }}">
                    <x-secondary-button>{{ __('Edit game') }}</x-secondary-button>
                </a>

                <form method="POST" action="{{ route('games.destroy', $game) }}">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>{{ __('Delete game') }}</x-danger-button>
                </form>
            </div>
        @endif
    @endauth
</div>
