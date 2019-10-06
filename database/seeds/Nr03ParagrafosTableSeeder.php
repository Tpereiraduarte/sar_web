<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Nr03ParagrafosTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->createParagrafos();
    }
    public function createParagrafos(){

        $resultado = DB::table('normas')->where('numero_norma','03')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '3.1',
            'descricao'         => 'EMBARGO E INTERDIÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '3.2',
            'descricao'         => 'CONSIDERA-SE GRAVE E IMINENTE RISCO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '3.3',
            'descricao'         => 'O EMBARGO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '3.4',
            'descricao'         => 'DURANTE A VIGÊNCIA DA INTERDIÇÃO OU DO EMBARGO ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '3.5',
            'descricao'         => 'DURANTE A PARALISAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
    } 
}
