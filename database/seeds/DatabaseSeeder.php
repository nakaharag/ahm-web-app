<?php

use App\User;
//use App\Company;
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
            'whats' => '(11) 93371-0777',
            'role' => 2,
            'id_company' => 1
        ]);
        User::create([
            'nome' => 'Financeiro',
            'email' => 'financeiro@test.com',
            'password' => Hash::make('user'),
            'whats' => '(11) 93371-0777',
            'role' => 1,
            'id_company' => 1
        ]);
        User::create([
            'nome' => 'Teeste',
            'email' => 'user@test.com',
            'password' => Hash::make('user'),
            'whats' => '(11) 93371-0777',
            'role' => 3,
            'id_company' => 1
        ]);
        User::create([
            'nome' => 'User 2 Teeste',
            'email' => 'user2@test.com',
            'password' => Hash::make('user2'),
            'whats' => '(11) 93371-0777',
            'role' => 3,
            'id_company' => 3
        ]);
        User::create([
            'nome' => 'User 3 Teeste',
            'email' => 'user3@test.com',
            'password' => Hash::make('user3'),
            'whats' => '(11) 93223-344',
            'role' => 3,
            'id_company' => 4
        ]);
        $this->call(CompanySeeder::class);
    }
}
