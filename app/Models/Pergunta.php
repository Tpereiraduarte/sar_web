<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $primaryKey = 'id_pergunta';
    protected $fillable = ['pergunta','norma_id','paragrafo','usuario_alteracao'];
    protected $table = 'perguntas';
    protected $with = 'paragrafos';

    public function paragrafos()
    {
        return $this->belongsTo(Paragrafo::class,'norma_id','norma_id');
    }
}
