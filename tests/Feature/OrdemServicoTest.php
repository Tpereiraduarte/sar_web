<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Checklist;
use App\Models\OrdemServico;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrdemServicoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_ordem_servico()
    {
        $ordemservico = factory(OrdemServico::class)->create();

        $this->assertDatabaseHas('ordem_servicos',[
            'numero_ordem_servico' => $ordemservico->numero_ordem_servico,
            'usuario_id'  =>  $ordemservico->usuario_id,
            'checklist_id'  =>  $ordemservico->checklist_id,
            'usuario_alteracao' => $ordemservico->usuario_alteracao
        ]); 
    }
   
    public function test_update_ordem_servico()
    {
        $ordemservico = factory(OrdemServico::class)->create();
        $usuario = factory(User::class)->create();
        $checklist = factory(Checklist::class)->create();
        $ordemservico->numero_ordem_servico = '98';
        $ordemservico->usuario_id = $usuario->id_usuario;
        $ordemservico->checklist_id = $checklist->id_checklist;
        $ordemservico->usuario_alteracao = 'Sistema modificado';
        $ordemservico->update();
                
        $this->assertDatabaseHas('ordem_servicos',[
            'numero_ordem_servico' => '98',
            'usuario_id'  =>  $usuario->id_usuario,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_ordem_servico()
    {
        $ordemservico = factory(OrdemServico::class)->create();
        $ordemservico->delete();
        
        $this->assertDatabaseMissing('ordem_servicos',[
            'numero_ordem_servico' => $ordemservico->numero_ordem_servico,
            'usuario_id'  =>  $ordemservico->usuario_id,
            'checklist_id'  =>  $ordemservico->checklist_id,
            'usuario_alteracao' => $ordemservico->usuario_alteracao
        ]);
    }
    
    public function test_rota_ordem_servico_index_sem_autenticacao()
    {
        $response = $this->get('ordemservico');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_ordem_servico_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_ordem_servico_edit_sem_autenticacao()
    {
        $ordemservico = factory(OrdemServico::class)->create();
        $response = $this->get('ordemservico/'.$ordemservico->id_ordemservico.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_ordem_servico_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $ordemservico = factory(OrdemServico::class)->create();
        $response = $this->actingAs($usuario)->get('ordemservico/'.$ordemservico->id_ordemservico.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_ordem_servico_create_sem_autenticacao()
    {
        $ordemservico = factory(OrdemServico::class)->create();
        $response = $this->get('ordemservico/create');
        $response->assertStatus(302);
    }

    public function test_rota_ordem_servico_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $ordemservico = factory(OrdemServico::class)->create();
        $response = $this->actingAs($usuario)->get('ordemservico/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_ordem_servico_view()
    {
        $usuario = factory(User::class)->create();
        $checklist = factory(Checklist::class)->create();
        $response = $this->actingAs($usuario)->get('ordemservico/create');
        
        $acao = $this->json('POST', '/ordemservico',[
            'numero_ordem_servico' => '89',
            'usuario_id'  =>  $usuario->id_usuario,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $this->assertDatabaseMissing('ordem_servicos',[
            'numero_ordem_servico' => '89',
            'usuario_id'  =>  $usuario->id_usuario,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_ordem_servico_view()
    {
        $usuario = factory(User::class)->create();
        $ordemservico = factory(OrdemServico::class)->create();
        $checklist = factory(Checklist::class)->create();

        $response = $this->actingAs($usuario)->get('ordemservico/'.$ordemservico->id_ordemservico.'/edit');

        $acao = $this->json('GET', 'ordemservico/'.$ordemservico->id_ordemservico.'/edit',[
            'numero_ordem_servico' => '2',
            'usuario_id'  =>  $usuario->id_usuario,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        $this->assertDatabaseMissing('ordem_servicos',[
            'numero_ordem_servico' => '2',
            'usuario_id'  =>  $usuario->id_usuario,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_ordem_servico_view()
    {
        $usuario = factory(User::class)->create();
        $ordemservico = factory(OrdemServico::class)->create();
        $response = $this->actingAs($usuario)->get('norma');

        $acao = $this->json('DELETE', 'ordemservico/'.$ordemservico->id_ordemservico);
        
        $this->assertDatabaseMissing('ordem_servicos',[
            'numero_ordem_servico' => $ordemservico->numero_ordem_servico,
            'usuario_id'  =>  $ordemservico->usuario_id,
            'checklist_id'  =>  $ordemservico->checklist_id,
            'usuario_alteracao' => $ordemservico->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}