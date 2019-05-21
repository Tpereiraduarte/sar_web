<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $primaryKey = 'id_perfil';
    protected $fillable = ['nome','usuario_alteracao'];
    protected $table = 'perfils';
}
