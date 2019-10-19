<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $this->assertDatabaseHas('perfils',[
            'nome'  => $perfil->nome,
            'usuario_alteracao' => $perfil->usuario_alteracao
        ]);
    }
    
    public function test_update_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $perfil->nome = 'Perfil Alterado';
        $perfil->usuario_alteracao = 'Sistema modificado';
        $perfil->update();
        
        $this->assertDatabaseHas('perfils',[
            'nome'    =>  'Perfil Alterado',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $perfil->delete();
        
        $this->assertDatabaseMissing('perfils',[
            'nome'  => $perfil->nome,
            'usuario_alteracao' => $perfil->usuario_alteracao
        ]);
    }

    public function test_cria_nome_perfil()
    {
        $perfil = new Perfil();
        $perfil->nome = 'Super Usuário';
        $this->assertEquals('Super Usuário', $perfil->nome);
    }

    public function test_rota_perfil_index_sem_autenticacao()
    {
        $response = $this->get('perfil');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_perfil_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_perfil_edit_sem_autenticacao()
    {
        $perfil = factory(Perfil::class)->create();
        $response = $this->get('perfil/'.$perfil->id_perfil.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_perfil_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $perfil = factory(Perfil::class)->create();
        $response = $this->actingAs($usuario)->get('perfil/'.$perfil->id_perfil.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_perfil_create_sem_autenticacao()
    {
        $perfil = factory(Perfil::class)->create();
        $response = $this->get('perfil/create');
        $response->assertStatus(302);
    }

    public function test_rota_perfil_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $perfil = factory(Perfil::class)->create();
        $response = $this->actingAs($usuario)->get('perfil/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_perfil_view()
    {
        $usuario = factory(User::class)->create();
        $perfil = factory(Perfil::class)->create();
        $response = $this->actingAs($usuario)->get('perfil/create');

        $acao = $this->json('POST', '/perfil',[
            'nome' =>  'Novo Perfil',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $this->assertDatabaseMissing('perfils',[
            'nome' =>  'Novo Perfil',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_perfil_view()
    {
        $usuario = factory(User::class)->create();
        $perfil = factory(Perfil::class)->create();
        $response = $this->actingAs($usuario)->get('perfil/'.$perfil->id_perfil.'/edit');

        $acao = $this->json('GET', 'perfil/'.$perfil->id_perfil.'/edit',[
            'nome' =>  'Novo perfil',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        $this->assertDatabaseMissing('perfils',[
            'nome' =>  'Novo perfil',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_perfil_view()
    {
        $usuario = factory(User::class)->create();
        $perfil = factory(Perfil::class)->create();        
        $response = $this->actingAs($usuario)->get('perfil');

        $acao = $this->json('DELETE', 'perfil/'.$perfil->id_perfil);
        
        $this->assertDatabaseMissing('perfils',[
            'nome' =>  $perfil->nome,
            'usuario_alteracao' => $perfil->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}

