<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;


class Company extends Model
{
    use Notifiable;

    protected $fillable = [
        'empresa', 'responsavel', 'email', 'setor', 'whats', 'horas'
    ];

    public function Survey()
    {
        return $this->hasMany(Survey::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
