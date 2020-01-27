<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['id_company', 'id_servico_lista', 'tempo', 'data'];

    //

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function ServicoListas()
    {
        return $this->hasOne(ServicoListas::class, 'id');
    }
}
