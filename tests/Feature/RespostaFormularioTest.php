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
        RespostaFormulario::create([
            'titulo_formulario'  => 'Serviço de Instalação de Redes',
            'ordem_servico'  => '32',
            'pergunta' => 'Existe fios desencapados no poste?',
            'valor' =>  'S',
            'localizacao'   =>  '123123123',
            'imagem'    =>  'imagem.jpg',
            'status'    =>  'indeferido',
            'usuario_alteracao' => 'Sistema'
        ]);        
        $this->assertDatabaseHas('resposta_formularios',[
            'titulo_formulario'  => 'Serviço de Instalação de Redes',
            'ordem_servico'  => '32',
            'pergunta' => 'Existe fios desencapados no poste?',
            'valor' =>  'S',
            'localizacao'   =>  '123123123',
            'imagem'    =>  'imagem.jpg',
            'status'    =>  'indeferido',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
