<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Genre;

class GameSeeder extends Seeder
{

    public function run(): void
    {
        Game::create([
            'genre_id' => Genre::where('name', 'Metroidvania')->first()->id,
            'title' => 'Hollow Knight',
            'description' => 'Explore a vast, ruined underground kingdom full of bugs, secrets and tough bosses.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Adventure')->first()->id,
            'title' => 'A Short Hike',
            'description' => 'Climb a mountain on a small island park to get cell reception.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Platformer')->first()->id,
            'title' => 'Celeste',
            'description' => 'Help Madeline climb Celeste Mountain in this challenging pixel-art platformer.',
        ]);
    }
}
