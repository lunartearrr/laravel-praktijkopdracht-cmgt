<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <form action="{{ route('games.store') }}" method="post" class="py-12 w-full">
        @csrf

        <h1 class="font-bold text-xl pb-5">Add a new game</h1>

        <div class="mb-5 font-bold">
            <label for="title">Name</label><br>
            <input type="text" id="title" name="title" class="border-gray-600 rounded">{{old('title')}}
            @error('title')
            <span class="text-red-500 font-normal">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5 font-bold">
            <label for="genre_id">Genre</label><br>
            <select id="genre_id" name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">
                        {{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5 font-bold">
            <label for="description">Description</label><br>
            <textarea id="description" name="description"
                      class="border-gray-600 rounded">{{old('description')}}</textarea>
            @error('description')
            <span class="text-red-500 font-normal">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex w-full">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>
