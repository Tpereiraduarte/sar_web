<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Perfilpermissao;
use App\Models\Usuarioperfil;
use App\Models\Permissao;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public  function usuario_permissoes(User $user){

        $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');  

        return $permissoes;
    }

    public function usuarioView(User $user)
    {
        
          $userPermissao = $this->usuario_permissoes()

        foreach ($userPermissao as $value) {

            if ($strcmp($value, "usuario-view") == 0) {

                return true;
            }else{
                return false;
            }
            
        }

        
    }
}
