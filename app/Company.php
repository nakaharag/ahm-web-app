<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;


class Company extends Model
{
    use Notifiable;

    protected $fillable = [
        'empresa', 'responsavel', 'email', 'setor', 'whats'
    ];

    public function Survey()
    {
        return $this->hasMany(Survey::class);
    }
}
