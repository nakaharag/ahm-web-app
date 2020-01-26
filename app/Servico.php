<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['titulo', 'data', 'id_company', 'descricao', 'horas'];

    //

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
