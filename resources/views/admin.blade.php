<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pb-12">
        @if (session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-xl font-bold border-green-700 border-2 mt-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('success-delete'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5">
                <div class="p-3 bg-red-100 text-red-700 rounded-xl font-bold border-red-700 border-2">
                    {{ session('success-delete') }}
                </div>
            </div>
        @endif

        @auth
            @if (auth()->user()->role === 'admin')
                <h1 class="font-semibold text-2xl text-gray-800 leading-tight max-w-7xl mx-auto pt-10 pb-6">
                    {{ __('Admin Panel') }}
                </h1>

                <div class="pb-12">
                    <p class="text-m">As an admin, you can add, edit or remove games!</p>

                    <div class="flex justify-end pb-5">
                        <a href="{{ route('games.create') }}">
                            <x-primary-button>{{ __('Add new game') }}</x-primary-button>
                        </a>
                    </div>

                    <div class="grid gap-6 grid-cols-3">
                        @foreach ($games as $game)
                            <x-game-card-admin :game="$game"/>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gray-200 p-5 shadow border-2 rounded-2xl ">

                    <h2 class="mb-2 font-bold text-2xl">Manage incoming reviews</h2>
                    <p>As an admin you can accept reviews, after you've accepted a review. It will be visible for all
                        users.</p>

                    @forelse ($reviews as $review)
                        <div class="bg-white p-5 shadow border-2 rounded-2xl gray-500 my-2">
                            <div>
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                            <p class="font-bold">{{ $review->title }}</p>
                            <p class="text-sm text-gray-500">by {{ $review->user->name }}</p>
                            <p class="mt-2">{{ $review->body }}</p>


                            <p class="mt-2 text-sm font-bold {{ $review->is_visible ? 'text-green-600' : 'text-orange-500' }}">
                                {{ $review->is_visible ? 'Visible' : 'Hidden' }}
                            </p>

                            <form method="POST" action="{{ route('reviews.toggle', $review) }}" class="my-4">
                                @csrf
                                <x-primary-button>{{ $review->is_visible ? 'Hide' : 'Accept' }}</x-primary-button>
                            </form>

                        </div>
                    @empty
                        <p class="text-gray-500">No reviews yet...</p>
                    @endforelse
                </div>
            @endif
        @endauth
    </div>
</x-app-layout>
