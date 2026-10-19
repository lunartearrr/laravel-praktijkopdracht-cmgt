<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{

    public function run(): void

    {
        $genres = ['Metroidvania', 'Platformer', 'Adventure', 'Puzzle', 'Roguelike', 'Farming sim', 'Psychological horror'];

        foreach ($genres as $name) {
            Genre::create(['name' => $name]);
        }
    }
}
