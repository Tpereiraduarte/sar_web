<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Norma;
use App\Models\Paragrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();

        $this->assertDatabaseHas('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  $paragrafo->numero_paragrafo,
            'descricao' =>  $paragrafo->descricao,
            'usuario_alteracao' => $paragrafo->usuario_alteracao
        ]);
    }

    public function test_update_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $paragrafo->numero_paragrafo = '55.2';
        $paragrafo->descricao = 'Novo Paragrafo';
        $paragrafo->usuario_alteracao = 'Sistema modificado';
        $paragrafo->update();
        
        $this->assertDatabaseHas('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  $paragrafo->numero_paragrafo,
            'descricao' =>  $paragrafo->descricao,
            'usuario_alteracao' => $paragrafo->usuario_alteracao
        ]);
    }

    public function test_delete_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $paragrafo->delete();
        
        $this->assertDatabaseMissing('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  $paragrafo->numero_paragrafo,
            'descricao' =>  $paragrafo->descricao,
            'usuario_alteracao' => $paragrafo->usuario_alteracao
        ]);
    }
    public function test_rota_paragrafo_index_sem_autenticacao()
    {
        $response = $this->get('paragrafo');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_paragrafo_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('paragrafo');
        $response->assertStatus(200);
    }

    public function test_rota_paragrafo_edit_sem_autenticacao()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->get('paragrafo/'.$paragrafo->id_paragrafo.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_paragrafo_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->actingAs($usuario)->get('paragrafo/'.$paragrafo->id_paragrafo.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_paragrafo_create_sem_autenticacao()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->get('paragrafo/create');
        $response->assertStatus(302);
    }

    public function test_rota_paragrafo_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->actingAs($usuario)->get('paragrafo/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_paragrafo_view()
    {
        $usuario = factory(User::class)->create();
        $norma = factory(Norma::class)->create();
        $response = $this->actingAs($usuario)->get('paragrafo/create');

        $acao = $this->json('POST', '/paragrafo',[
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    => '55.2',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $this->assertDatabaseMissing('paragrafos',[
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    => '55.2',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_paragrafo_view()
    {
        $usuario = factory(User::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();
        $response = $this->actingAs($usuario)->get('paragrafo/'.$paragrafo->id_paragrafo.'/edit');

        $acao = $this->json('GET', 'paragrafo/'.$paragrafo->id_paragrafo.'/edit',[
            'numero_paragrafo'    =>  '55.2',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        $this->assertDatabaseMissing('paragrafos',[
            'numero_paragrafo'    =>  '55.2',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_paragrafo_view()
    {
        $usuario = factory(User::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();        
        $response = $this->actingAs($usuario)->get('paragrafo');

        $acao = $this->json('DELETE', 'paragrafo/'.$paragrafo->id_paragrafo);
        
        $this->assertDatabaseMissing('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  $paragrafo->numero_paragrafo,
            'descricao' =>  $paragrafo->descricao,
            'usuario_alteracao' => $paragrafo->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
