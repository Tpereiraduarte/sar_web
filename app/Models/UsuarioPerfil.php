<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPerfil extends Model
{
	protected $primaryKey = 'id_usuarioperfil';
    protected $fillable = ['usuario_id','perfil_id','usuario_alteracao'];
    protected $table = 'UsuarioPerfil';
}
