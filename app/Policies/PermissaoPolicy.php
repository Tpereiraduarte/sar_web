<?php
namespace App\Policies;
use App\Models\User;
use App\Models\Permissao;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissaoPolicy
{
    use HandlesAuthorization;
    
    public function view(User $user, Permissao $permissao)
    {
        $usuario = Auth()->user()->id_usuario;

        $permissoes = DB::table('usuarioperfils')
        ->join('users','usuarioperfils.usuario_id', '=','users.id_usuario')
        ->join('perfils', 'usuarioperfils.perfil_id', '=', 'perfils.id_perfil')
        ->join('perfilpermissaos', 'perfils.id_perfil', '=', 'perfilpermissaos.perfil_id')
        ->join('permissoes', 'perfilpermissaos.permissao_id', '=', 'permissoes.id_permissao')
        ->where('users.id_usuario','=',$usuario);
        return true;	
    }
    
}