<?php

use App\User;
use App\Company;
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
        User::create([
            'nome' => 'User 2',
            'email' => 'user2@test.com',
            'password' => Hash::make('secret'),
            'whats' => 'whats',
            'role' => 1
        ]);
        User::create([
            'nome' => 'User 3',
            'email' => 'user3@test.com',
            'password' => Hash::make('secret'),
            'whats' => 'whats',
            'role' => 1
        ]);
        User::create([
            'nome' => 'User 4',
            'email' => 'user4@test.com',
            'password' => Hash::make('secret'),
            'whats' => 'whats',
            'role' => 1
        ]);
        $this->call(CompanySeeder::class);
    }
}
