<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

    @auth
        @if (auth()->user()->role === 'admin')
            <div class="py-12">
                <p class="text-sm">As an admin, you can add games!</p>
                <div class="flex justify-end m-5">
                    <a href="{{ route('games.create') }}" class="">
                        <x-primary-button>{{ __('Add game') }}</x-primary-button>
                    </a>
                </div>
            </div>
        @endif
    @endauth
    </div>
</x-app-layout>
