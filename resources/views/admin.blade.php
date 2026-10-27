<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if (session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-xl font-bold border-green-700 border-2 mt-6">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if (auth()->user()->role === 'admin')
                <div class="py-12">
                    <p class="text-m">As an admin, you can add, edit or remove games!</p>

                    <div class="flex justify-end">
                        <a href="{{ route('games.create') }}">
                            <x-primary-button>{{ __('Add new game') }}</x-primary-button>
                        </a>
                    </div>

                    <div class="grid grid-cols-3">
                        @foreach ($games as $game)
                                <x-game-card-admin :game="$game"/>
                        @endforeach
                    </div>
                </div>
            @endif
        @endauth
    </div>
</x-app-layout>
