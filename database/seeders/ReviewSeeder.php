<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();
        $admin = User::where('email', 'admin@example.com')->first();

        Review::forceCreate([
            'user_id' => $user->id,
            'game_id' => Game::where('title', 'Hollow Knight')->first()->id,
            'rating' => 5,
            'title' => 'A masterpiece',
            'body' => 'Beautiful world, great bosses and so many secrets to find.',
            'is_visible' => true,
        ]);

        Review::forceCreate([
            'user_id' => $admin->id,
            'game_id' => Game::where('title', 'A Short Hike')->first()->id,
            'rating' => 5,
            'title' => 'So cozy',
            'body' => 'A short and relaxing game, perfect for a rainy afternoon.',
            'is_visible' => true,
        ]);

        Review::forceCreate([
            'user_id' => $user->id,
            'game_id' => Game::where('title', 'Celeste')->first()->id,
            'rating' => 3,
            'title' => 'Too difficult for me',
            'body' => 'Great story, but some levels were really frustrating.',
            'is_visible' => false,
        ]);
    }
}
