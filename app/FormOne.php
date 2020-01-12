<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormOne extends Model
{
    protected $fillable = ['nome', 'pergunta1', 'pergunta2'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function answerOne()
    {
        return $this->hasMany(AnswerOne::class);
    }
}
