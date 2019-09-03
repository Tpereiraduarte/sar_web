<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class RespostaFormulario extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_reposta';
    protected $fillable = ['titulo_formulario','ordem_servico', 'pergunta', 'valor', 'localizacao', 'imagem', 'status','usuario_alteracao'];
    protected $table = 'resposta_formularios';
}
