<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
        }

        $games = $query->get();
        $genres = Genre::all();


        return view('home', compact('games', 'genres'));
    }
}
