<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'username' => 'janedoe',
            'email' => 'janedoe@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create additional users
        User::factory(10)->create();
    }
}
