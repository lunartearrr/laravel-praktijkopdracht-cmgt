<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserLogin;

class UserLoginSeeder extends Seeder
{
    public function run(): void
    {
        // John kan een review plaatsen aangezien hij op drie verschillende dagen is ingelogd.
        $john = User::where('email', 'johndoe@example.com')->first();

        // John logde 6 dagen geleden in
        UserLogin::forceCreate([
            'user_id' => $john->id,
            'created_at' => now()->subDays(6),
        ]);

        // John logde 3 dagen geleden in
        UserLogin::forceCreate([
            'user_id' => $john->id,
            'created_at' => now()->subDays(3),
        ]);

        // John logde 1 dag geleden in
        UserLogin::forceCreate([
            'user_id' => $john->id,
            'created_at' => now()->subDays(1),
        ]);
    }
}
