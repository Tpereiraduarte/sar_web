<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
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
        $perfilpermissao = factory(Perfilpermissao::class)->create();
               
        $this->assertDatabaseHas('perfilpermissaos',[
            'permissao_id'  =>  $perfilpermissao->permissao_id,
            'perfil_id'   =>  $perfilpermissao->perfil_id,
            'usuario_alteracao' => $perfilpermissao->usuario_alteracao
        ]);
    }

    public function test_update_perfil_permissao()
    {
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $perfil = factory(Perfil::class)->create();
        $permissao = factory(Permissao::class)->create();
        $perfilpermissao->permissao_id = $permissao->id_permissao;
        $perfilpermissao->perfil_id = $perfil->id_perfil;
        $perfilpermissao->usuario_alteracao = 'Sistema modificado';
        $perfilpermissao->update();
        
        $this->assertDatabaseHas('perfilpermissaos',[
            'permissao_id' => $permissao->id_permissao,
            'perfil_id' => $perfil->id_perfil,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_perfil_permissao()
    {
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $perfilpermissao->delete();
        
        $this->assertDatabaseMissing('perfilpermissaos',[
            'permissao_id'  =>  $perfilpermissao->permissao_id,
            'perfil_id'   =>  $perfilpermissao->perfil_id,
            'usuario_alteracao' => $perfilpermissao->usuario_alteracao
        ]);
    }

    public function test_rota_perfil_permissao_index_sem_autenticacao()
    {
        $response = $this->get('perfilpermissao');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_perfil_permissao_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_perfil_permissao_edit_sem_autenticacao()
    {
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $response = $this->get('perfilpermissao/'.$perfilpermissao->id_perfilpermissao.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_perfil_permissao_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $response = $this->actingAs($usuario)->get('perfilpermissao/'.$perfilpermissao->id_perfilpermissao.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_perfil_permissao_create_sem_autenticacao()
    {
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $response = $this->get('perfilpermissao/create');
        $response->assertStatus(302);
    }

    public function test_rota_perfil_permissao_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $response = $this->actingAs($usuario)->get('perfilpermissao/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_perfil_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('perfilpermissao/create');

        $perfil = factory(Perfil::class)->create();
        $permissao = factory(Permissao::class)->create();
        
        $acao = $this->json('POST', '/perfilpermissao',[
            'permissao_id' =>  $permissao->id_permissao,
            'perfil_id' => $perfil->id_perfil,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $this->assertDatabaseMissing('perfilpermissaos',[
            'permissao_id' =>  $permissao->id_permissao,
            'perfil_id' => $perfil->id_perfil,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }

    public function test_editar_perfil_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $perfilpermissao = factory(Perfilpermissao::class)->create();
        $response = $this->actingAs($usuario)->get('perfilpermissao/'.$perfilpermissao->id_perfilpermissao.'/edit');

        $perfil = factory(Perfil::class)->create();
        $permissao = factory(Permissao::class)->create();

        $acao = $this->json('GET', 'perfilpermissao/'.$perfilpermissao->id_perfilpermissao.'/edit',[
            'permissao_id' =>  $permissao->id_permissao,
            'perfil_id' => $perfil->id_perfil,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        $this->assertDatabaseMissing('perfilpermissaos',[
            'permissao_id' =>  $permissao->id_permissao,
            'perfil_id' => $perfil->id_perfil,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_perfil_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $perfilpermissao = factory(Perfilpermissao::class)->create();        
        $response = $this->actingAs($usuario)->get('perfilpermissao');

        $acao = $this->json('DELETE', 'perfilpermissao/'.$perfilpermissao->id_perfilpermissao);
        
        $this->assertDatabaseMissing('perfilpermissaos',[
            'permissao_id'  =>  $perfilpermissao->permissao_id,
            'perfil_id'   =>  $perfilpermissao->perfil_id,
            'usuario_alteracao' => $perfilpermissao->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
