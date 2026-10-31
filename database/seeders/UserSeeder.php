<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::forceCreate([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        User::forceCreate([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'johndoe123',
            'role' => 'user'
        ]);

        User::forceCreate([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);
    }
}
