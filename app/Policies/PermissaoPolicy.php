<?php
namespace App\Policies;
use App\Models\User;
use App\Models\UsuarioPerfil;
use App\Models\Perfilpermissao;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissaoPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    
    public function view(User $usuarioPerfil, Perfilpermissao $perfilPermissao)
    {
           
    }
    
}