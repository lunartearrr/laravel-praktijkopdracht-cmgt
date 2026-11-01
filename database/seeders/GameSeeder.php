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

        Game::create([
            'genre_id' => Genre::where('name', 'Metroidvania')->first()->id,
            'title' => 'Ori and the Blind Forest',
            'description' => 'Guide a small forest spirit through a beautiful, glowing world in this emotional platforming adventure.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Platformer')->first()->id,
            'title' => 'Cuphead',
            'description' => 'Fight your way through tough boss battles in a hand-drawn world inspired by 1930s cartoons.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Platformer')->first()->id,
            'title' => 'Night in the Woods',
            'description' => 'Return to your small hometown as Mae and uncover something strange in this story-driven game.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Puzzle')->first()->id,
            'title' => 'Unpacking',
            'description' => 'Unpack boxes in different homes over the years and piece together someone’s life story.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Roguelike')->first()->id,
            'title' => 'Hades',
            'description' => 'Fight your way out of the underworld again and again, growing stronger with every attempt.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'RPG')->first()->id,
            'title' => 'Undertale',
            'description' => 'Meet strange monsters in an underground world where you can choose to fight or befriend them.',
        ]);

        Game::create([
            'genre_id' => Genre::where('name', 'Cozy')->first()->id,
            'title' => 'Spiritfarer',
            'description' => 'Build a boat for spirits, care for them and help them say goodbye in this cozy game about loss.',
        ]);
    }
}
