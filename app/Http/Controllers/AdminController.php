<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;


class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin', compact('games'));
    }
}

