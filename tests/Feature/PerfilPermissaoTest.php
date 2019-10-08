<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Perfil;
use App\Models\Permissao;
use App\Models\Perfilpermissao;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilPermissaoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_perfil_permissao()
    {
        $permissao = Permissao::create([
            'nome'  => 'Adiciona View',
            'descricao'  => 'Usuário pode ver essa tela',
            'usuario_alteracao' => 'Sistema'
        ]);
        
        $perfil = Perfil::create([
            'nome'         => 'Novo Perfil',
            'usuario_alteracao' => 'Sistema'
        ]);
        Perfilpermissao::create([
            'permissao_id'  =>  $permissao->id_permissao,
            'perfil_id'   =>  $perfil->id_perfil,
            'usuario_alteracao' => 'Sistema'
        ]); 
               
        $this->assertDatabaseHas('perfilpermissaos',[
            'permissao_id'  =>  $permissao->id_permissao,
            'perfil_id'   =>  $perfil->id_perfil,
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
