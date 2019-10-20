<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Permissao;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissaoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_permissao()
    {
        $permissao = factory(Permissao::class)->create();
        $this->assertDatabaseHas('permissoes',[
            'nome'  => $permissao->nome,
            'descricao'  => $permissao->descricao,
            'usuario_alteracao' => $permissao->usuario_alteracao
        ]);
    }

    public function test_update_permissao()
    {
        $permissao = factory(Permissao::class)->create();
        $permissao->nome = 'Criando Nova permissao';
        $permissao->descricao = 'Permissao para nova funcionalidade';
        $permissao->usuario_alteracao = 'Sistema modificado';
        $permissao->update();
        
        $this->assertDatabaseHas('permissoes',[
            'nome' => 'Criando Nova permissao',
            'descricao' => 'Permissao para nova funcionalidade',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_permissao()
    {
        $permissao = factory(Permissao::class)->create();
        $permissao->delete();
        
        $this->assertDatabaseMissing('permissoes',[
            'nome'  => $permissao->nome,
            'descricao'  => $permissao->descricao,
            'usuario_alteracao' => $permissao->usuario_alteracao
        ]);
    }

    public function test_rota_permissao_index_sem_autenticacao()
    {
        $response = $this->get('permissao');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_permissao_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_permissao_edit_sem_autenticacao()
    {
        $permissao = factory(Permissao::class)->create();
        $response = $this->get('permissao/'.$permissao->id_permissao.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_permissao_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $permissao = factory(Permissao::class)->create();
        $response = $this->actingAs($usuario)->get('permissao/'.$permissao->id_permissao.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_permissao_create_sem_autenticacao()
    {
        $permissao = factory(Permissao::class)->create();
        $response = $this->get('permissao/create');
        $response->assertStatus(302);
    }

    public function test_rota_permissao_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $permissao = factory(Permissao::class)->create();
        $response = $this->actingAs($usuario)->get('permissao/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $permissao = factory(Permissao::class)->create();
        $response = $this->actingAs($usuario)->get('permissao/create');

        $acao = $this->json('POST', '/permissao',[
            'nome' => 'Criando Nova permissao',
            'descricao' => 'Permissao para nova funcionalidade',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $this->assertDatabaseMissing('permissoes',[
            'nome' => 'Criando Nova permissao',
            'descricao' => 'Permissao para nova funcionalidade',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $permissao = factory(Permissao::class)->create();
        $response = $this->actingAs($usuario)->get('permissao/'.$permissao->id_permissao.'/edit');

        $acao = $this->json('GET', 'permissao/'.$permissao->id_permissao.'/edit',[
            'nome' => 'Criando Nova permissao',
            'descricao' => 'Permissao para nova funcionalidade',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        $this->assertDatabaseMissing('permissoes',[
            'nome' => 'Criando Nova permissao',
            'descricao' => 'Permissao para nova funcionalidade',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_permissao_view()
    {
        $usuario = factory(User::class)->create();
        $permissao = factory(Permissao::class)->create();        
        $response = $this->actingAs($usuario)->get('permissao');

        $acao = $this->json('DELETE', 'permissao/'.$permissao->id_permissao);
        
        $this->assertDatabaseMissing('permissoes',[
            'nome'  => $permissao->nome,
            'descricao'  => $permissao->descricao,
            'usuario_alteracao' => $permissao->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}