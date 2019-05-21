<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $primaryKey = 'id_pergunta';
    protected $fillable = ['pergunta','norma','usuario_alteracao'];
    protected $table = 'perguntas';
}
