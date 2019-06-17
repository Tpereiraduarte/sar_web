<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paragrafo extends Model
{
    protected $primaryKey = 'id_paragrafo';
    protected $fillable = ['norma_id','numero_paragrafo','descricao','usuario_alteracao'];
    protected $table = 'paragrafos';
    protected $with = ['normas','perguntas','subparagrafos'];
    
    public function perguntas()
    {
        return $this->hasMany(Pergunta::class,'paragrafo_id','paragrafo_id');
    }

    public function normas()
    {
        return $this->belongsTo(Norma::class,'norma_id','id_norma');
    }

    public function subparagrafos()
    {
        return $this->hasMany(SubParagrafo::class,'paragrafo_id','id_paragrafo');
    }
}
