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
            'email' => 'admin@agenciakmc.com',
            'password' => Hash::make('admin123'),
            'whats' => '(11) 93371-0777',
            'role' => 2
        ]);
        //$this->call(CompanySeeder::class);
    }
}
