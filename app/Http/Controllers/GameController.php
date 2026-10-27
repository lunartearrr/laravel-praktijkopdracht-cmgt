<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required|string',
        ]);

        Game::create($validated);

        return redirect()->route('home')->with('success', 'Game created!');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $genres = Genre::all();
        return view('games.edit', compact('game', 'genres'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required|string',
        ]);

        $game->fill($validated);

        if (! $game->isDirty()){
            return back()->withErrors(['no_changes' => 'You did not change anything...']);
        }

        $game->save();

        return redirect()->route('admin', $game)->with('success', 'Game updated!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('home')->with('success-delete', 'Game deleted!');
    }
}
