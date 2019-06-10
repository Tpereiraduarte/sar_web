<?php

use Illuminate\Database\Seeder;
use App\Models\Norma;

class NormasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createNormas();
    }
    public function createNormas(){
        Norma::create([
            'numero_norma'      => '10',
            'descricao'         => 'SEGURANÇA EM INSTALAÇÕES E SERVIÇOS EM ELETRICIDADE',
            'usuario_alteracao' => ''
        ]);        
    }
}
