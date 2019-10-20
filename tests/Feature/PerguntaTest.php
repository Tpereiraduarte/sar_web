<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Norma;
use App\Models\Pergunta;
use App\Models\Paragrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerguntaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_pergunta()
    {
        $pergunta = factory(Pergunta::class)->create();
        $this->assertDatabaseHas('perguntas',[
            'norma_id'  =>  $pergunta->norma_id,
            'paragrafo_id'  =>  $pergunta->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);
    }
    public function test_update_pergunta()
    {
        $pergunta = factory(Pergunta::class)->create();
        $norma = factory(Norma::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();
        $pergunta->norma_id = $norma->id_norma;
        $pergunta->paragrafo_id = $paragrafo->id_paragrafo;
        $pergunta->pergunta = $pergunta->pergunta;
        $pergunta->usuario_alteracao = $pergunta->usuario_alteracao;
        $pergunta->update();
        
        $this->assertDatabaseHas('perguntas',[
            'norma_id'  =>  $pergunta->norma_id,
            'paragrafo_id'  =>  $pergunta->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);
    }

    public function test_delete_pergunta()
    {
        $pergunta = factory(Pergunta::class)->create();
        $pergunta->delete();
        
        $this->assertDatabaseMissing('perguntas',[
            'norma_id'  =>  $pergunta->norma_id,
            'paragrafo_id'  =>  $pergunta->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);
    }

    public function test_rota_pergunta_index_sem_autenticacao()
    {
        $response = $this->get('pergunta');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_pergunta_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_pergunta_edit_sem_autenticacao()
    {
        $pergunta = factory(pergunta::class)->create();
        $response = $this->get('pergunta/'.$pergunta->id_pergunta.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_pergunta_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $pergunta = factory(Pergunta::class)->create();
        $response = $this->actingAs($usuario)->get('pergunta/'.$pergunta->id_pergunta.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_pergunta_create_sem_autenticacao()
    {
        $pergunta = factory(Pergunta::class)->create();
        $response = $this->get('pergunta/create');
        $response->assertStatus(302);
    }

    public function test_rota_pergunta_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $pergunta = factory(Pergunta::class)->create();
        $response = $this->actingAs($usuario)->get('pergunta/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_pergunta_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('pergunta/create');
        
        $norma = factory(Norma::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();

        $acao = $this->json('POST', '/pergunta',[
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Pergunta nova',
            'usuario_alteracao' => 'George'
        ]);

        $this->assertDatabaseMissing('perguntas',[
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Pergunta nova',
            'usuario_alteracao' => 'George'
        ]);
        //tenho que arrumar esse teste
        $acao->assertStatus(422);
    }

    public function test_editar_pergunta_view()
    {
        $usuario = factory(User::class)->create();
        $pergunta = factory(Pergunta::class)->create();
        $response = $this->actingAs($usuario)->get('pergunta/'.$pergunta->id_pergunta.'/edit');

        $norma = factory(Norma::class)->create();
        $paragrafo = factory(Paragrafo::class)->create();

        $acao = $this->json('GET', 'pergunta/'.$pergunta->id_pergunta.'/edit',[
            'norma_id'  =>  $norma->norma_id,
            'paragrafo_id'  =>  $paragrafo->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);
        $this->assertDatabaseMissing('perguntas',[
            'norma_id'  =>  $norma->norma_id,
            'paragrafo_id'  =>  $paragrafo->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_pergunta_view()
    {
        $usuario = factory(User::class)->create();
        $pergunta = factory(Pergunta::class)->create();        
        $response = $this->actingAs($usuario)->get('pergunta');

        $acao = $this->json('DELETE', 'pergunta/'.$pergunta->id_pergunta);
        
        $this->assertDatabaseMissing('perguntas',[
            'norma_id'  =>  $pergunta->norma_id,
            'paragrafo_id'  =>  $pergunta->paragrafo_id,
            'pergunta' =>  $pergunta->pergunta,
            'usuario_alteracao' => $pergunta->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
