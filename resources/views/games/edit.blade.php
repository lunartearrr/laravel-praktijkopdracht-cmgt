<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form action="{{ route('games.update', $game) }}" method="POST" class="py-12 w-full">
            @csrf
            @method('PUT')


            <div class="max-w-2xl mx-auto space-y-3">

                @error('no_changes')
                <div class="p-3 bg-gray-50 text-gray-700 rounded-xl font-bold border-gray-700 border-2">
                    {{ $message }}
                </div>
                @enderror

                <h1 class="font-bold text-xl pb-5">Edit selected game</h1>

                <div class="flex gap-3 items-center">
                    <h2 class="font-bold">Title</h2>
                    <x-text-input name="title" value="{{ old('title', $game->title) }}"></x-text-input>
                </div>

                <div class="flex gap-3 items-center mb-5">
                    <h2 class="font-bold">Genre</h2>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="genre_id">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(old('genre_id', $game->genre_id) == $genre->id)>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col pb-5">
                    <h2 class="pb-2 font-bold">Description </h2>
                    <x-text-input name="description"
                                  value="{{ old('description', $game->description) }}"></x-text-input>
                </div>

                <div class="flex w-full">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
