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
            'numero_norma'      => '01',
            'descricao'         => 'DISPOSIÇÕES GERAIS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '02',
            'descricao'         => 'INSPEÇÃO PRÉVIA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '03',
            'descricao'         => 'EMBARGO OU INTERDIÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '04',
            'descricao'         => 'SERVIÇOS ESPECIALIZADOS EM ENG. DE SEGURANÇA E EM MEDICINA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '05',
            'descricao'         => 'COMISSÃO INTERNA DE PREVENÇÃO DE ACIDENTES',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '06',
            'descricao'         => 'EQUIPAMENTOS DE PROTEÇÃO INDIVIDUAL - EPI',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '07',
            'descricao'         => 'PROGRAMAS DE CONTROLE MÉDICO DE SAÚDE OCUPACIONAL',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '08',
            'descricao'         => 'EDIFICAÇÕES',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '09',
            'descricao'         => 'PROGRAMAS DE PREVENÇÃO DE RISCOS AMBIENTAIS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '10',
            'descricao'         => 'SEGURANÇA EM INSTALAÇÕES E SERVIÇOS EM ELETRICIDADE',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '11',
            'descricao'         => 'TRANSPORTE, MOVIMENTAÇÃO, ARMAZENAGEM E MANUSEIO DE MATERIAIS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '12',
            'descricao'         => 'MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '13',
            'descricao'         => 'CALDEIRAS, VASOS DE PRESSÃO E TABULAÇÕES E TANQUES METÁLICOS DE ARMAZENAMENTO',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '14',
            'descricao'         => 'FORNOS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '15',
            'descricao'         => 'ATIVIDADES E OPERAÇÕES INSALUBRES',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '16',
            'descricao'         => 'ATIVIDADES E OPERAÇÕES PERIGOSAS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '17',
            'descricao'         => 'ERGONOMIA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Norma::create([
            'numero_norma'      => '18',
            'descricao'         => 'CONDIÇÕES E MEIO AMBIENTE DE TRABALHO NA INDÚSTRIA DA CONSTRUÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '19',
            'descricao'         => 'EXPLOSIVOS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '20',
            'descricao'         => 'SEGURANÇA E SAÚDE NO TRABALHO COM INFLAMÁVEIS E COMBUSTÍVEIS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '21',
            'descricao'         => 'TRABALHOS A CÉU ABERTO',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '22',
            'descricao'         => 'SEGURANÇA E SAÚDE OCUPACIONAL NA MINERAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '23',
            
            'descricao'         => 'PROTEÇÃO CONTRA INCÊNDIOS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '24',
            'descricao'         => 'CONDIÇÕES SANITÁRIAS E DE CONFORTO NOS LOCAIS DE TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '25',
            'descricao'         => 'RESÍDUOS INDUSTRIAIS',
            'usuario_alteracao' => 'Sistema'
        ]); 
        Norma::create([
            'numero_norma'      => '26',
            'descricao'         => 'SINALIZAÇÃO DE SEGURANÇA',
            'usuario_alteracao' => 'Sistema'
        ]); 
               
    }
}
