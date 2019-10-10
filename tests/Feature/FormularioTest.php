<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use App\Models\Pergunta;
use App\Models\Paragrafo;
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
        $checklist = Checklist::create([
            'titulo'         => 'Serviço de Redes',
            'usuario_alteracao' => 'Sistema'
        ]);    

        $norma = Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]);  

        $paragrafo = Paragrafo::create([
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]); 
        
        $pergunta = Pergunta::create([
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Existe fios desencapados?',
            'usuario_alteracao' => 'Sistema'
        ]);

        Formulario::create([
            'pergunta_id'  =>  $pergunta->id_pergunta,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema'
        ]);

        $this->assertDatabaseHas('formularios',[
            'pergunta_id'  =>  $pergunta->id_pergunta,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema'
        ]);
    }

    public function test_delete_formulario()
    {
        $checklist = Checklist::create([
            'titulo'         => 'Serviço de Redes',
            'usuario_alteracao' => 'Sistema'
        ]);    

        $norma = Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]);  

        $paragrafo = Paragrafo::create([
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]); 
        
        $pergunta = Pergunta::create([
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Existe fios desencapados?',
            'usuario_alteracao' => 'Sistema'
        ]);

        $formulario = Formulario::create([
            'pergunta_id'  =>  $pergunta->id_pergunta,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema'
        ]);

        $formulario->delete();
        $this->assertDatabaseMissing('formularios',[
            'pergunta_id'  =>  $pergunta->id_pergunta,
            'checklist_id'  =>  $checklist->id_checklist,
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
