<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	protected $primaryKey = 'id_usuario';
    protected $fillable = ['usuario','nome','password','email','usuario_alteracao','categorias'];
    protected $table = 'user';

}
