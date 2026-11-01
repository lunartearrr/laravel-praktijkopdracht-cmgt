<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Review;


class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $reviews = Review::with('user')->orderBy('is_visible')->latest()->get();
        return view('admin', compact('games', 'reviews'));
    }
}

