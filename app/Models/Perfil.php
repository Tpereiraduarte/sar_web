<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Perfil extends Model
{
    use Uuids;
    public $incrementing = false;
    
    protected $primaryKey = 'id_perfil';
    protected $fillable = ['nome','usuario_alteracao'];
    protected $table = 'perfils';

    public function usuarioperfil(){
    	return $this->belongsTo(User::class,'id_perfil','id_perfil');
    }
    
     public function perfilpermissao(){
        return $this->belongsTo(Permissao::class,'id_perfil','id_perfil');
    }
}
