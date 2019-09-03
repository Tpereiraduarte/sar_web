<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class UsuarioPerfil extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $primaryKey = 'id_usuarioperfil';
    protected $fillable = ['usuario_id','perfil_id','usuario_alteracao'];
    protected $table = 'usuarioperfils';
    protected $with = ['perfil','usuario'];

    public function perfil(){
    	return $this->belongsTo(Perfil::class,'perfil_id','id_perfil');
    }

     public function usuario(){
    	return $this->belongsTo(User::class,'usuario_id','id_usuario');
    }
}
