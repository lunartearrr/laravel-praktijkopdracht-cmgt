<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h2 class="font-bold pb-3 text-2xl">Selected Game</h2>

        <div class="bg-white p-5 shadow border-2 rounded-2xl gray-500">
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
        </div>

        @guest
            <div class="flex flex-col mt-5">
                <a href="{{ route('login') }}" class="underline text-gray-500 font-semibold hover:text-gray-700">
                    Sign in to rate or review!
                </a>
            </div>
        @endguest

        @if (session('success'))
            <p class="mt-5 text-green-600">{{ session('success') }}</p>
        @endif

        @error('review')
        <div
            class="font-bold text-red-500 mt-5 rounded border-2 border-red-500 text-sm shadow bg-red-100 p-2 flex text-center mx-auto">
            {{ $message }}
        </div>
        @enderror

        @auth
            <form action="{{ route('reviews.store', $game) }}" method="post" class="mt-5">
                @csrf
                <div class="bg-gray-200 border-2 shadow rounded-2xl p-5 border-gray-300">
                    <h2 class="font-bold pb-3 text-2xl">Write a review!</h2>

                    <div class="mb-5 font-bold">
                        <span class="">Rating</span><br>
                        <div x-data="{ rating: {{ (int) old('rating', 0) }}, hover: 0 }"
                             class="flex gap-1 text-3xl pt-3">
                            <input type="hidden" name="rating" :value="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button"
                                        @click="rating = {{ $i }}"
                                        @mouseenter="hover = {{ $i }}"
                                        @mouseleave="hover = 0"
                                        :class="(hover || rating) >= {{ $i }} ? 'text-yellow-500' : 'text-gray-300'"><i
                                        class="fa-solid fa-star"></i>
                                </button>
                            @endfor
                        </div>
                        @error('rating')
                        <span class="text-red-500 font-normal">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 font-bold">
                        <label for="title">Title</label><br>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                               class="border-gray-600 rounded">
                        @error('title')
                        <span class="text-red-500 font-normal">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 font-bold">
                        <label for="body">Review</label><br>
                        <textarea id="body" name="body" class="border-gray-600 rounded">{{ old('body') }}</textarea>
                        @error('body')
                        <span class="text-red-500 font-normal">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-primary-button>{{__('Post review')}}</x-primary-button>
                </div>
            </form>
        @endauth

        <div class="flex flex-col mt-5">
            <h2 class="mb-2 font-bold text-2xl">Reviews</h2>

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

                    @can('update', $review)
                        <div class="flex gap-4 mt-4">
                            <a href="{{ route('reviews.edit', $review) }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                                Edit review
                                <i class="fa-solid fa-pen pl-2"></i>
                            </a>

                            <form action="{{ route('reviews.destroy', $review) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit">
                                    Delete review
                                    <i class="fa-solid fa-trash pl-2"></i>
                                </x-danger-button>
                            </form>
                        </div>
                    @endcan
                </div>

            @empty
                <p class="text-gray-500">No reviews yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
