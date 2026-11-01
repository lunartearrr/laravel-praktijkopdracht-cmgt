<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form action="{{ route('reviews.update', $review) }}" method="POST" class="py-12 w-full">
            @csrf
            @method('PUT')


            <div class="max-w-2xl mx-auto space-y-3">

                @error('no_changes')
                <div class="p-3 bg-gray-50 text-gray-700 rounded-xl font-bold border-gray-700 border-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="bg-white p-5 shadow border-2 rounded-2xl gray-500 my-1">

                    <h1 class="font-bold text-xl pb-5">Edit your review for {{ $review->game->title }}</h1>

                    <div class="mb-5 font-bold">
                        <span>Rating</span>
                        <div x-data="{ rating: {{ (int) old('rating', $review->rating) }}, hover: 0 }"
                             class="flex gap-1 text-3xl pt-3">
                            <input type="hidden" name="rating" :value="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" @click="rating = {{ $i }}" @mouseenter="hover = {{ $i }}"
                                        @mouseleave="hover = 0"
                                        :class="(hover || rating) >= {{ $i }} ? 'text-yellow-500' : 'text-gray-300'">
                                    <i class="fa-solid fa-star"></i>
                                </button>
                            @endfor
                        </div>
                        @error('rating')
                        <span class="text-red-500 font-normal">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-5">
                        <label for="title" class="font-bold pb-2">Title</label>
                        <x-text-input id="title" name="title" value="{{ old('title', $review->title) }}"></x-text-input>

                        @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="flex flex-col mb-5">
                        <label for="title" class="font-bold pb-2">Description</label>
                        <x-text-input id="body" name="body" value="{{ old('body', $review->body) }}"></x-text-input>

                        @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex w-full">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
