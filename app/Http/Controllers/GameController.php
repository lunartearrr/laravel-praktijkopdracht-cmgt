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

    }

    public function edit(Game $game)
    {

    }

    public function update(Request $request, Game $game)
    {

    }

    public function destroy(Game $game)
    {

    }
}
