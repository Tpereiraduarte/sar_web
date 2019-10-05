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

    // public function existePerfil($perfil)
    // {
    //     if (is_string($perfil)) {
    //         $perfil = Perfil::where('nome','=',$perfil)->firstOrFail();
    //     }
    //     return (boolean) $this->perfil()->find($perfil->id);
    // }


    // public function eAdmin()
    // {
    //   //return $this->id == 1;
    //   return $this->existePerfil('Administrador');
    // }


    //  public function temUmPerfilDestes($perfil)
    // {
    //   $userPerfil = $this->perfil;
    //   return $perfil->intersect($userPerfil)->count();
    // }


  public function temUmPerfil($perfil){

    if(is_array($perfil) || is_object($roles)){
        return !! $perfil->intersect($this->perfil)->count();
    }

    return $this->perfil->contains('nome', $perfil);
    
    }

    
     public function temUmPerfilDestes(Perfilpermissao $permissao){
        return  $this->temUmPerfil($permissao->perfil);
    }
}
