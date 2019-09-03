<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Formulario extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_formulario';
    protected $fillable = ['pergunta_id','checklist_id','usuario_alteracao'];
    protected $table = 'formularios';
    protected $with = ['pergunta'];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class,'pergunta_id','id_pergunta');
    }
}