<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubParagrafo extends Model
{
    protected $primaryKey = 'id_subparagrafo';
    protected $fillable = ['paragrafo_id','numero_paragrafo','descricao','usuario_alteracao'];
    protected $table = 'subparagrafos';        
    protected $with = ['paragrafos'];
    
    public function paragrafos()
    {
        return $this->belongsTo(Paragrafo::class,'paragrafo_id','id_paragrafo');
    }
}
