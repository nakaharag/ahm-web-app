<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerOne extends Model
{   
    protected $fillable = ['resposta1', 'resposta2'];

    public function formOne()
    {
        return $this->belongsTo(AnswerOne::class);
    }
}
