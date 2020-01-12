<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'whats' => 'whats',
            'role' => 2
        ]);
        User::create([
            'nome' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'whats' => 'whats',
            'role' => 1
        ]);
    }
}
