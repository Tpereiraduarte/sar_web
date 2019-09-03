<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Norma extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_norma';
    protected $fillable = ['numero_norma','descricao','usuario_alteracao'];
    protected $table = 'normas';
    
    public function paragrafos()
    {
        return $this->hasMany(Paragrafo::class,'id_norma','norma_id');
    }
}
