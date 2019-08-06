<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $primaryKey = 'id_formulario';
    protected $fillable = ['pergunta_id','checklist_id','usuario_alteracao'];
    protected $table = 'formularios';
    protected $with = ['pergunta'];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class,'pergunta_id','id_pergunta');
    }
}