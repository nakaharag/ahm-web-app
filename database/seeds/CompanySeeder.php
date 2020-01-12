<?php

use App\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'empresa' => 'Admination SA',
            'email' => Str::random(10).'@gmail.com',
            'setor' => 'CEO',
            'whats' => 'whats',
            'responsavel' => 'Zé Lelelele'
        ]);
        Company::create([
            'empresa' => 'Carasl SA',
            'email' => Str::random(10).'@hotmail.com',
            'setor' => 'Cefe',
            'whats' => '5451222',
            'responsavel' => 'OU LLAs'
        ]);
        Company::create([
            'empresa' => 'SPFC',
            'email' => Str::random(10).'@testa.com',
            'setor' => 'Estagiario',
            'whats' => '12312',
            'responsavel' => 'Urbino'
        ]);
        Company::create([
            'empresa' => Str::random(20),
            'email' => Str::random(10).'@hotmail.com',
            'setor' => 'Estagiario',
            'whats' => '12312',
            'responsavel' => 'Urbino'
        ]);
    }
}
