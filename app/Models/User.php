<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $primaryKey = 'id_usuario';
    protected $fillable = ['matricula','nome','password','email','usuario_alteracao','categoria','email_verified_at'];
    protected $table = 'users';
}
