<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class SubParagrafo extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_subparagrafo';
    protected $fillable = ['paragrafo_id','numero_paragrafo','descricao','usuario_alteracao'];
    protected $table = 'subparagrafos';        
    protected $with = ['paragrafos'];
    
    public function paragrafos()
    {
        return $this->belongsTo(Paragrafo::class,'paragrafo_id','id_paragrafo');
    }
}
