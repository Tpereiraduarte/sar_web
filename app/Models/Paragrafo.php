<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paragrafo extends Model
{
    protected $primaryKey = 'id_paragrafo';
    protected $fillable = ['norma_id','paragrafo','descricao','usuario_alteracao'];
    protected $table = 'paragrafos';
    protected $with = ['normas','perguntas'];
        
    public function normas()
    {
        return $this->belongsTo(Norma::class,'norma_id','id_norma');
    }

    public function perguntas()
    {
        return $this->hasMany(Pergunta::class,'norma_id','id_norma');
    }
}
