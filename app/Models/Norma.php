<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Norma extends Model
{
    protected $primaryKey = 'id_norma';
    protected $fillable = ['numero_norma','paragrafo','descricao','usuario_alteracao'];
    protected $table = 'normas';
}
