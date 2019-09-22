<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Nr01ParagrafosTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->createParagrafos();
    }
    public function createParagrafos(){

        $resultado = DB::table('normas')->where('numero_norma','01')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.1',
            'descricao'         => 'AS NORMAS REGULAMENTADORAS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.2',
            'descricao'         => 'AS DISPOSIÇÕES CONTIDAS NAS NORMAS REGULAMENTADORAS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.3',
            'descricao'         => 'A OBSERVÂNCIA DAS NORMAS REGULAMENTADORAS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.4',
            'descricao'         => 'A DELEGACIA REGIONAL DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.5',
            'descricao'         => 'PODEM SER DELEGADAS A OUTROS ÓRGÃOS FEDERAIS, ESTADUAIS E MUNICIPAIS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.6',
            'descricao'         => 'PARA FINS DE APLICAÇÃO DAS NORMAS REGULAMENTADORAS – NR, considera-se:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.7',
            'descricao'         => 'CABE AO EMPREGADOR',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.8',
            'descricao'         => 'CABE AO EMPREGADO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.9',
            'descricao'         => 'O NÃO CUMPRIMENTO DAS DISPOSIÇÕES LEGAIS E REGULAMENTARES',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '1.10',
            'descricao'         => 'AS DÚVIDAS SUSCITADAS E OS CASOS OMISSOS',
            'usuario_alteracao' => 'Sistema'
        ]);

    }
}
