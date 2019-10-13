<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class OrdemServico extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_ordemservico';
    protected $fillable = ['numero_ordem_servico','usuario_id','checklist_id','usuario_alteracao'];
    protected $table = 'ordem_servicos';
    protected $with = ['checklist', 'usuario'];

    public function checklist()
    {
        return $this->hasMany(Checklist::class,'id_checklist','checklist_id');
    }

    public function usuario()
    {
        return $this->hasMany(User::class,'id_usuario','usuario_id');
    }
}