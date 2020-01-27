<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;


class Company extends Model
{
    use Notifiable;

    protected $fillable = [
        'empresa', 'responsavel', 'email', 'setor', 'whats', 'horas','url_hospedagem','user_hospedagem','pw_hospedagem','url_googleads','user_googleads','pw_googleads','url_linkedin','user_linkedin','pw_linkedin','url_twitter','user_twitter',
        'pw_twitter','url_youtube','user_youtube','pw_youtube','url_facebook','user_facebook','pw_facebook','url_instagram','user_instagram','pw_instagram',
        'margem', 'faturamento', 'clientes', 'fans_face', 'seguidores_insta', 'inscritos', 'contatos',
        'seguidores_twitter', 'obs'
    
    ];

    public function Survey()
    {
        return $this->hasMany(Survey::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function Servico()
    {
        return $this->hasMany(Servico::class);
    }
}
