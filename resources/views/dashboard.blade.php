<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-input-label class="flex">
        <input placeholder="Search games..." class="w-full border-2">
    </x-input-label>

    @auth
        <div class="flex justify-end m-5">
            <a href="{{ route('games.create') }}" class="">
                    <x-primary-button>{{ __('Add game') }}</x-primary-button>
            </a>
        </div>
    @endauth
</x-app-layout>
