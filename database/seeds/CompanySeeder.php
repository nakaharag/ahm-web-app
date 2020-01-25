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
            'empresa' => 'Agência KMC',
            'email' => 'financeiro@agenciakmc.com.br',
            'setor' => 'Financeiro',
            'whats' => '(11) 99999-9882',
            'responsavel' => 'Fulano',
            'horas' => '00'
        ]);

        DB::table('companies')->insert([
            'empresa' => 'Admination SA',
            'email' => Str::random(10).'@gmail.com',
            'setor' => 'CEO',
            'whats' => 'whats',
            'responsavel' => 'Zé Lelelele',
            'horas' => '50'
        ]);
        Company::create([
            'empresa' => 'Santos SA',
            'email' => Str::random(10).'@hotmail.com',
            'setor' => 'Cefe',
            'whats' => '5451222',
            'responsavel' => 'OU LLAs',
            'horas' => '40'
        ]);
        Company::create([
            'empresa' => 'SPFC',
            'email' => Str::random(10).'@testa.com',
            'setor' => 'Estagiario',
            'whats' => '12312',
            'responsavel' => 'Urbano Alimentos',
            'horas' => '20'
        ]);
        Company::create([
            'empresa' => Str::random(20),
            'email' => Str::random(10).'@hotmail.com',
            'setor' => 'Estagiario',
            'whats' => '12312',
            'responsavel' => 'Urbino',
            'horas' => '90'
        ]);
    }
}
