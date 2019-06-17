<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $primaryKey = 'id_pergunta';
    protected $fillable = ['pergunta','norma_id','paragrafo_id','usuario_alteracao'];
    protected $table = 'perguntas';
    protected $with = ['paragrafos','normas'];

    public function paragrafos()
    {
        return $this->belongsTo(Paragrafo::class,'paragrafo_id','id_paragrafo');
    }

    public function normas()
    {
        return $this->belongsTo(Norma::class,'norma_id','id_norma');
    }
}
