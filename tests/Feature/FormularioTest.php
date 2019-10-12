<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Pergunta;
use App\Models\Checklist;
use App\Models\Formulario;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormularioTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_formulario()
    {
        $formulario = factory(Formulario::class)->create();
        $this->assertDatabaseHas('formularios',[
            'pergunta_id'  =>  $formulario->pergunta_id,
            'checklist_id'  =>  $formulario->checklist_id,
            'usuario_alteracao' => $formulario->usuario_alteracao
        ]);
    }
    public function test_update_formulario()
    {
        $formulario = factory(Formulario::class)->create();
        $pergunta = factory(Pergunta::class)->create();
        $checklist = factory(Checklist::class)->create();
        $formulario->pergunta_id = $pergunta->id_pergunta;
        $formulario->checklist_id = $checklist->id_checklist;
        $formulario->usuario_alteracao = 'Sistema modificado';
        $formulario->update();
        
        $this->assertDatabaseHas('formularios',[
            'pergunta_id'  =>  $formulario->pergunta_id,
            'checklist_id'  =>  $formulario->checklist_id,
            'usuario_alteracao' => $formulario->usuario_alteracao
        ]);
    }

    public function test_delete_formulario()
    {
        $formulario = factory(Formulario::class)->create();
        $formulario->delete();
        
        $this->assertDatabaseMissing('formularios',[
            'pergunta_id'  =>  $formulario->pergunta_id,
            'checklist_id'  =>  $formulario->checklist_id,
            'usuario_alteracao' => $formulario->usuario_alteracao
        ]);
    }

    public function test_rota_formulario_index_sem_autenticacao()
    {
        $response = $this->get('formulario');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_formulario_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_formulario_edit_sem_autenticacao()
    {
        $checklist = factory(Checklist::class)->create();
        $response = $this->get('formulario/'.$checklist->id_checklist.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_formulario_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $checklist = factory(Checklist::class)->create();
        $response = $this->actingAs($usuario)->get('formulario/'.$checklist->id_checklist.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_formulario_create_sem_autenticacao()
    {
        $formulario = factory(Formulario::class)->create();
        $response = $this->get('formulario/create');
        $response->assertStatus(302);
    }

    public function test_rota_formulario_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $formulario = factory(Formulario::class)->create();
        $response = $this->actingAs($usuario)->get('formulario/create');
        $response->assertStatus(200);
    }

    // public function test_cadastrar_formulario_view()
    // {
    //     $usuario = factory(User::class)->create();
    //     $response = $this->actingAs($usuario)->get('formulario/create');
    //     $pergunta = factory(Pergunta::class)->create();
    //     $checklist = factory(Checklist::class)->create();

    //     $acao = $this->json('POST', '/formulario',[
    //         'pergunta_id'  =>  $pergunta->pergunta_id,
    //         'checklist_id'  =>  $checklist->checklist_id,
    //         'usuario_alteracao' => $usuario->usuario_alteracao
    //     ]);

    //     $this->assertDatabaseMissing('formularios',[
    //         'pergunta_id'  =>  $pergunta->pergunta_id,
    //         'checklist_id'  =>  $checklist->checklist_id,
    //         'usuario_alteracao' => $usuario->usuario_alteracao
    //     ]);
        
    //     $acao->assertStatus(302);
    // }

    public function test_editar_formulario_view()
    {
        $usuario = factory(User::class)->create();
        $formulario = factory(Formulario::class)->create();
        $checklist = factory(Checklist::class)->create();
        $pergunta = factory(Pergunta::class)->create();

        $response = $this->actingAs($usuario)->get('formulario/'.$checklist->id_checklist.'/edit');

        $acao = $this->json('GET', 'formulario/'.$checklist->id_checklist.'/edit',[
            'pergunta_id'  =>  $pergunta->pergunta_id,
            'checklist_id'  =>  $checklist->checklist_id,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        $this->assertDatabaseMissing('formularios',[
            'pergunta_id'  =>  $pergunta->pergunta_id,
            'checklist_id'  =>  $checklist->checklist_id,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_formulario_view()
    {
        $usuario = factory(User::class)->create();
        $formulario = factory(Formulario::class)->create();
        $checklist = factory(Checklist::class)->create();
        
        $response = $this->actingAs($usuario)->get('formulario');

        $primeiropasso = $this->json('DELETE', 'formulario/'.$checklist->id_checklist);
        $segundopasso = $this->json('DELETE', 'formulario/'.$formulario->checklist_id);
        
        $this->assertDatabaseMissing('formularios',[
            'pergunta_id'  =>  $formulario->pergunta_id,
            'checklist_id'  =>  $formulario->checklist_id,
            'usuario_alteracao' => $formulario->usuario_alteracao
        ]);

        $segundopasso->assertStatus(302);
    }
}