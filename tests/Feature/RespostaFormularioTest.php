<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\RespostaFormulario;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RespostaFormularioTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_resposta_formulario()
    {
        $reposta = factory(RespostaFormulario::class)->create();
        
        $this->assertDatabaseHas('resposta_formularios',[
            'titulo_formulario'  => $reposta->titulo_formulario,
            'ordemservico_id'  => $reposta->ordemservico_id,
            'pergunta' => $reposta->pergunta,
            'valor' =>  $reposta->valor,
            'localizacao'   =>  $reposta->localizacao,
            'imagem'    =>  $reposta->imagem,
            'status'    =>  $reposta->status,
            'observacao'    =>  $reposta->observacao,
            'conclusao_servico'    =>  $reposta->conclusao_servico,
            'usuario_alteracao' => $reposta->usuario_alteracao
        ]);
    }
}
