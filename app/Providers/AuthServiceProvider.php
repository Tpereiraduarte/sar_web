<?php
namespace App\Providers;
use App\Models\Perfilpermissao;
use App\Models\User;
use App\Models\Permissao;
use App\Models\UsuarioPerfil;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Policies\UsuarioPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UsuarioPolicy::class,
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
       $this->registerPolicies();

       $gate->define('Administrador', function (User $user){

            $useradmin = DB::table('usuarioperfils')->count();
            if($useradmin == 0){

              return $admin = ["Administrador"];  

            }else{

            $admin = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfils', 'perfils.id_perfil', '=', 'usuarioperfils.perfil_id')
            ->select('perfils.nome')
            ->pluck('nome');

            foreach($admin as $adm)
            {
                return strcmp($adm, "Administrador") == 0 ;     
            }
        }

        });

       //VIEW

       $gate->define('usuario-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "usuario-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('perfil-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "perfil-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('norma-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "norma-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('usuarioperfil-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "usuarioperfil-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('paragrafo-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "paragrafo-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('pergunta-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "pergunta-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('subparagrafo-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "subparagrafo-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('permissao-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "permissao-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });

       $gate->define('perfilpermissao-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "perfilpermissao-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('formulario-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "formulario-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('ordemservico-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "ordemservico-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('respostaformulario-view', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "respostaformulario-view"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });

       //EDITAR O PROPRIO PERFIL

       $gate->define('usuario-edit-perfil', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "usuario-edit-perfil"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });


       //TIPO SERVIÇO


       $gate->define('respostaformulario-tiposervico', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "respostaformulario-tiposervico"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });

       //HISTORICO

         $gate->define('respostaformulario-historico', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "respostaformulario-historico"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });

         //mobile

         $gate->define('respostaformulario-normasmobile', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "respostaformulario-normasmobile"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });


       //SHOW

       $gate->define('formulario-show', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "formulario-show"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });
       $gate->define('respostaformulario-show', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "respostaformulario-show"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });



       //CREATE

       $gate->define('usuario-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');


            foreach($permissoes as $permissao)
            {
                 if($permissao === "usuario-create"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-create") == 0 ;     
            }

        });

$gate->define('perfil-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfil-create"){
                    return true;
                 }
                //return strcmp($permissao, "perfil-create") == 0 ;     
            }

        });
        
$gate->define('usuarioperfil-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "usuarioperfil-create"){
                    return true;
                 }
                //return strcmp($permissao, "usuarioperfil-create") == 0 ;     
            }

        });

$gate->define('pergunta-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "pergunta-create"){
                    return true;
                 }
                //return strcmp($permissao, "pergunta-create") == 0 ;     
            }

        });

$gate->define('permissao-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "permissao-create"){
                    return true;
                 }
                //return strcmp($permissao, "permissao-create") == 0 ;     
            }

        });

$gate->define('perfilpermissao-create ', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfilpermissao-create"){
                    return true;
                 }
                //return strcmp($permissao, "perfilpermissao-create ") == 0 ;     
            }

        });

$gate->define('norma-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "norma-create"){
                    return true;
                 }
                //return strcmp($permissao, "norma-create") == 0 ;     
            }

        });

$gate->define('paragrafo-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "paragrafo-create"){
                    return true;
                 }
                //return strcmp($permissao, "paragrafo-create") == 0 ;     
            }

        });

$gate->define('subparagrafo-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "subparagrafo-create"){
                    return true;
                 }
                //return strcmp($permissao, "subparagrafo-create") == 0 ;     
            }

        });
$gate->define('checklist-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "checklist-create"){
                    return true;
                 }
                //return strcmp($permissao, "checklist-create") == 0 ;     
            }

        });
$gate->define('formulario-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "formulario-create"){
                    return true;
                 }
                //return strcmp($permissao, "formulario-create") == 0 ;     
            }

        });
$gate->define('ordemservico-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "ordemservico-create"){
                    return true;
                 }
                //return strcmp($permissao, "ordemservico-create") == 0 ;     
            }

        });
$gate->define('respostaformulario-create', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "respostaformulario-create"){
                    return true;
                 }
                //return strcmp($permissao, "respostaformulario-create") == 0 ;     
            }

        });

        //EDIT

        $gate->define('usuario-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "usuario-edit"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-edit") == 0 ;     
            }

        });
        $gate->define('perfil-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfil-edit"){
                    return true;
                 }
                //return strcmp($permissao, "perfil-edit") == 0 ;     
            }

        });
        $gate->define('usuarioperfil-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "usuarioperfil-edit"){
                    return true;
                 }
                //return strcmp($permissao, "usuarioperfil-edit") == 0 ;     
            }

        });
        $gate->define('pergunta-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "pergunta-edit"){
                    return true;
                 }
                //return strcmp($permissao, "pergunta-edit") == 0 ;     
            }

        });
        $gate->define('permissao-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "permissao-edit"){
                    return true;
                 }
                //return strcmp($permissao, "permissao-edit") == 0 ;     
            }

        });
        $gate->define('perfilpermissao-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfilpermissao-edit"){
                    return true;
                 }
                //return strcmp($permissao, "perfilpermissao-edit") == 0 ;     
            }

        });
        $gate->define('norma-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "norma-edit"){
                    return true;
                 }
                //return strcmp($permissao, "norma-edit") == 0 ;     
            }

        });
        $gate->define('paragrafo-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "paragrafo-edit"){
                    return true;
                 }
                //return strcmp($permissao, "paragrafo-edit") == 0 ;     
            }

        });
        $gate->define('subparagrafo-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "subparagrafo-edit"){
                    return true;
                 }
                //return strcmp($permissao, "subparagrafo-edit") == 0 ;     
            }

        });
        $gate->define('checklist-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "checklist-edit"){
                    return true;
                 }
                //return strcmp($permissao, "checklist-edit") == 0 ;     
            }

        });
        $gate->define('checklist-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "checklist-edit"){
                    return true;
                 }
                //return strcmp($permissao, "formulario-edit") == 0 ;     
            }

        });
        $gate->define('ordemservico-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "ordemservico-edit"){
                    return true;
                 }
                //return strcmp($permissao, "ordemservico-edit") == 0 ;     
            }

        });
        $gate->define('respostaformulario-edit', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "respostaformulario-edit"){
                    return true;
                 }
                //return strcmp($permissao, "respostaformulario-edit") == 0 ;     
            }

        });

        //DELETE

        $gate->define('usuario-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "usuario-delete"){
                    return true;
                 }
                //return strcmp($permissao, "usuario-delete") == 0 ;     
            }

        });
        $gate->define('perfil-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfil-delete"){
                    return true;
                 }
                //return strcmp($permissao, "perfil-delete") == 0 ;     
            }

        });
        $gate->define('usuarioperfil-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "usuarioperfil-delete"){
                    return true;
                 }
                //return strcmp($permissao, "usuarioperfil-delete") == 0 ;     
            }

        });
        $gate->define('pergunta-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "pergunta-delete"){
                    return true;
                 }
                //return strcmp($permissao, "pergunta-delete") == 0 ;     
            }

        });
        $gate->define('permissao-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "permissao-delete"){
                    return true;
                 }
                //return strcmp($permissao, "permissao-delete") == 0 ;     
            }

        });
        $gate->define('perfilpermissao-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "perfilpermissao-delete"){
                    return true;
                 }
                //return strcmp($permissao, "perfilpermissao-delete") == 0 ;     
            }

        });
        $gate->define('norma-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "norma-delete"){
                    return true;
                 }
                //return strcmp($permissao, "norma-delete") == 0 ;     
            }

        });
        $gate->define('paragrafo-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "paragrafo-delete"){
                    return true;
                 }
                //return strcmp($permissao, "paragrafo-delete") == 0 ;     
            }

        });
        $gate->define('subparagrafo-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "subparagrafo-delete"){
                    return true;
                 }
                //return strcmp($permissao, "subparagrafo-delete") == 0 ;     
            }

        });
        $gate->define('checklist-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "checklist-delete"){
                    return true;
                 }
                //return strcmp($permissao, "checklist-delete") == 0 ;     
            }

        });
        $gate->define('formulario-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "formulario-delete"){
                    return true;
                 }
                //return strcmp($permissao, "formulario-delete") == 0 ;     
            }

        });
        $gate->define('ordemservico-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "ordemservico-delete"){
                    return true;
                 }
                //return strcmp($permissao, "ordemservico-delete") == 0 ;     
            }

        });
        $gate->define('respostaformulario-delete', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "respostaformulario-delete"){
                    return true;
                 }
                //return strcmp($permissao, "respostaformulario-delete") == 0 ;     
            }

        });

        // RELATORIOS

        $gate->define('relatorio-usuario', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                
                
                if($permissao === "relatorio-usuario"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-usuario") == 0 ; 
            }

        });

$gate->define('relatorio-usuarioperfil', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-usuarioperfil"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-usuarioperfil") == 0 ;     
            }

        });

$gate->define('relatorio-perfil', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-perfil"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-perfil") == 0 ;     
            }

        });

$gate->define('relatorio-permissao', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-permissao"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-permissao") == 0 ;     
            }

        });

$gate->define('relatorio-perfilpermissao', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-perfilpermissao"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-perfilpermissao") == 0 ;     
            }

        });

$gate->define('relatorio-normas', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-normas"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-normas") == 0 ;     
            }

        });

$gate->define('relatorio-paragrafo', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-paragrafo"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-paragrafo") == 0 ;     
            }

        });

$gate->define('relatorio-subparagrafo', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-subparagrafo"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-subparagrafo") == 0 ;     
            }

        });

$gate->define('relatorio-perguntas', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-perguntas"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-perguntas") == 0 ;     
            }

        });
$gate->define('relatorio-ordemservico', function (User $user){

            $permissoes = DB::table('users')->where('id_usuario','=',$user->id_usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');

            foreach($permissoes as $permissao)
            {
                if($permissao === "relatorio-ordemservico"){
                    return true;
                 }
                //return strcmp($permissao, "relatorio-ordemservico") == 0 ;     
            }

        });
    }
}
