<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Paragrafo;
use App\Models\SubParagrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_sub_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $this->assertDatabaseHas('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  $subparagrafo->numero_paragrafo,
            'descricao' =>  $subparagrafo->descricao,
            'usuario_alteracao' => $subparagrafo->usuario_alteracao
        ]);
    }


    public function test_update_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $subparagrafo->numero_paragrafo = '55.2.2';
        $subparagrafo->descricao = 'Alterando SubParagrafo';
        $subparagrafo->usuario_alteracao = 'Sistema modificado';
        $subparagrafo->update();
        
        $this->assertDatabaseHas('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Alterando SubParagrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $subparagrafo->delete();
        
        $this->assertDatabaseMissing('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  $subparagrafo->numero_paragrafo,
            'descricao' =>  $subparagrafo->descricao,
            'usuario_alteracao' => $subparagrafo->usuario_alteracao
        ]);
    }

    public function test_rota_subparagrafo_index_sem_autenticacao()
    {
        $response = $this->get('subparagrafo');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_subparagrafo_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_subparagrafo_edit_sem_autenticacao()
    {
        $subparagrafo = factory(Subparagrafo::class)->create();
        $response = $this->get('subparagrafo/'.$subparagrafo->id_subparagrafo.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_subparagrafo_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $subparagrafo = factory(Subparagrafo::class)->create();
        $response = $this->actingAs($usuario)->get('subparagrafo/'.$subparagrafo->id_subparagrafo.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_subparagrafo_create_sem_autenticacao()
    {
        $subparagrafo = factory(Subparagrafo::class)->create();
        $response = $this->get('subparagrafo/create');
        $response->assertStatus(302);
    }

    public function test_rota_subparagrafo_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $subparagrafo = factory(Subparagrafo::class)->create();
        $response = $this->actingAs($usuario)->get('subparagrafo/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_subparagrafo_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('subparagrafo/create');
        $paragrafo = factory(Paragrafo::class)->create();

        $acao = $this->json('POST', '/subparagrafo',[
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Alterando SubParagrafo',
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $this->assertDatabaseMissing('subparagrafos',[
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Alterando SubParagrafo',
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_subparagrafo_view()
    {
        $usuario = factory(User::class)->create();
        $subparagrafo = factory(Subparagrafo::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->actingAs($usuario)->get('subparagrafo/'.$subparagrafo->id_subparagrafo.'/edit');

        $acao = $this->json('GET', 'subparagrafo/'.$subparagrafo->id_subparagrafo.'/edit',[
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Criando SubParagrafo',
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        $this->assertDatabaseMissing('subparagrafos',[
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Criando SubParagrafo',
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_subparagrafos_view()
    {
        $usuario = factory(User::class)->create();
        $subparagrafo = factory(Subparagrafo::class)->create();        
        $response = $this->actingAs($usuario)->get('subparagrafo');

        $acao = $this->json('DELETE', 'subparagrafo/'.$subparagrafo->id_subparagrafo);
        
        $this->assertDatabaseMissing('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  $subparagrafo->numero_paragrafo,
            'descricao' =>  $subparagrafo->descricao,
            'usuario_alteracao' => $subparagrafo->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
