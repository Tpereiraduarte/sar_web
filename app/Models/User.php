<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
	protected $primaryKey = 'id_usuario';
    protected $fillable = ['matricula','nome','password','email','usuario_alteracao','email_verified_at'];
    protected $table = 'users';

    public function usuarioperfil(){
    	return $this->belongsTo(UsuarioPerfil::class,'id_usuario','usuario_id');
    }
}


