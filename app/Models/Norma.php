<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Norma extends Model
{
    protected $primaryKey = 'id_norma';
    protected $fillable = ['numero_norma','descricao','usuario_alteracao'];
    protected $table = 'normas';
    
    public function paragrafos()
    {
        return $this->hasMany(Paragrafo::class,'id_norma','norma_id');
    }
}
