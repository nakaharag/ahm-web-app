<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoListas extends Model
{
    protected $fillable = ['titulo','descricao'];

    public function Servico()
    {
        return $this->belongsToMany(Servico::class);
    }
}
