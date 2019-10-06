<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Nr12ParagrafosTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->createParagrafos();
    }
    public function createParagrafos(){

        $resultado = DB::table('normas')->where('numero_norma','12')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.1',
            'descricao'         => 'ESTA NORMA REGULAMENTADORA E SEUS ANEXOS DEFINEM REFERÊNCIAS TÉCNICAS, PRINCÍPIOS FUNDAMENTAIS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.2',
            'descricao'         => 'AS DISPOSIÇÕES DESTA NORMA REFEREM-SE A MÁQUINAS E EQUIPAMENTOS NOVOS E USADOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.3',
            'descricao'         => 'O EMPREGADOR DEVE ADOTAR MEDIDAS DE PROTEÇÃO PARA O TRABALHO EM MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.4',
            'descricao'         => 'SÃO CONSIDERADAS MEDIDAS DE PROTEÇÃO, A SER ADOTADAS NESSA ORDEM DE PRIORIDADE:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.5',
            'descricao'         => 'NA APLICAÇÃO DESTA NORMA E DE SEUS ANEXOS, DEVEM-SE CONSIDERAR AS CARACTERÍSTICAS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.6',
            'descricao'         => 'NOS LOCAIS DE INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.7',
            'descricao'         => 'OS MATERIAIS EM UTILIZAÇÃO NO PROCESSO PRODUTIVO DEVEM SER ALOCADOS EM ÁREAS ESPECIFICAS DE ARMAZENAMENTO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.8',
            'descricao'         => 'OS ESPAÇOS AO REDOR DAS MÁQUINAS E EQUIPAMENTOS DEVEM SER ADEQUADOS AO SEU TIPO E AO TIPO DE OPERAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.9',
            'descricao'         => 'OS PISOS DOS LOCAIS DE TRABALHO ONDE SE INSTALAM MÁQUINAS E EQUIPAMENTOS E DAS ÁREAS DE CIRCULAÇÃO DEVEM:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.10',
            'descricao'         => 'AS FERRAMENTAS UTILIZADAS NO PROCESSO PRODUTIVO DEVEM SER ORGANIZADAS E ARMAZENADAS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.11',
            'descricao'         => 'AS MÁQUINAS ESTACIONÁRIAS DEVEM POSSUIR MEDIDAS PREVENTIVAS QUANTO À SUA ESTABILIDADE',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.12',
            'descricao'         => 'NAS MÁQUINAS MÓVEIS QUE POSSUEM RODÍZIOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.13',
            'descricao'         => 'AS MÁQUINAS, AS ÁREAS DE CIRCULAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.14',
            'descricao'         => 'AS INSTALAÇÕES ELÉTRICAS DAS MÁQUINAS E EQUIPAMENTOS DEVEM SER PROJETADAS E MANTIDAS DE MODO A PREVENIR',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.15',
            'descricao'         => 'DEVEM SER ATERRADOS, CONFORME AS NORMAS TÉCNICAS OFICIAIS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.16',
            'descricao'         => 'AS INSTALAÇÕES ELÉTRICAS DAS MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.17',
            'descricao'         => 'OS CONDUTORES DE ALIMENTAÇÃO ELÉTRICA DAS MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.18',
            'descricao'         => 'OS QUADROS DE ENERGIA DAS MÁQUINAS E EQUIPAMENTOS DEVEM ATENDER AOS SEGUINTES REQUISITOS MÍNIMOS DE SEGURANÇA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.19',
            'descricao'         => 'AS LIGAÇÕES E DERIVAÇÕES DOS CONDUTORES ELÉTRICOS DAS MÁQUINAS E EQUIPAMENTOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.20',
            'descricao'         => ' AS INSTALAÇÕES ELÉTRICAS DAS MÁQUINAS E EQUIPAMENTOS QUE UTILIZEM ENERGIA ELÉTRICA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.21',
            'descricao'         => 'SÃO PROIBIDAS NAS MÁQUINAS E EQUIPAMENTOS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.22',
            'descricao'         => 'AS BATERIAS DEVEM ATENDER AOS SEGUINTES REQUISITOS MÍNIMOS DE SEGURANÇA:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.23',
            'descricao'         => 'OS SERVIÇOS E SUBSTITUIÇÕES DE BATERIAS DEVEM SER REALIZADOS CONFORME INDICAÇÃO CONSTANTE DO MANUAL DE OPERAÇÃO:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.24',
            'descricao'         => 'OS DISPOSITIVOS DE PARTIDA, ACIONAMENTO E PARADA DAS MÁQUINAS DEVEM SER PROJETADOS, SELECIONADOS E INSTALADOS DE MODO QUE:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.25',
            'descricao'         => 'OS COMANDOS DE PARTIDA OU ACIONAMENTO DAS MÁQUINAS DEVEM ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.26',
            'descricao'         => 'QUANDO FOREM UTILIZADOS DISPOSITIVOS DE ACIONAMENTO BIMANUAL',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.27',
            'descricao'         => 'NAS MÁQUINAS E EQUIPAMENTOS OPERADOS POR DOIS OU MAIS DISPOSITIVOS DE ACIONAMENTO BIMANUAL',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.28',
            'descricao'         => 'OS DISPOSITIVOS DE ACIONAMENTO BIMANUAL DEVEM SER POSICIONADOS A UMA DISTÂNCIA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.29',
            'descricao'         => 'OS DISPOSITIVOS DE ACIONAMENTO BIMANUAL MÓVEIS INSTALADOS EM PEDESTAIS DEVEM: ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.30',
            'descricao'         => 'NAS MÁQUINAS E EQUIPAMENTOS CUJA OPERAÇÃO REQUEIRA A PARTICIPAÇÃO DE MAIS DE UMA PESSOA:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.31',
            'descricao'         => 'AS MÁQUINAS OU EQUIPAMENTOS CONCEBIDOS E FABRICADOS: ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.32',
            'descricao'         => 'AS MÁQUINAS E EQUIPAMENTOS, CUJO ACIONAMENTO POR PESSOAS NÃO AUTORIZADAS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.33',
            'descricao'         => 'O ACIONAMENTO E O DESLIGAMENTO SIMULTÂNEO POR UM ÚNICO COMANDO ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.34',
            'descricao'         => 'DEVEM SER ADOTADAS, QUANDO NECESSÁRIAS, MEDIDAS ADICIONAIS DE ALERTA:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.35',
            'descricao'         => 'AS MÁQUINAS E EQUIPAMENTOS COMANDADOS POR RADIOFREQÜÊNCIA DEVEM POSSUIR:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.36',
            'descricao'         => 'OS COMPONENTES DE PARTIDA, PARADA, ACIONAMENTO E CONTROLES QUE COMPÕEM A INTERFACE DE OPERAÇÃO:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.37',
            'descricao'         => 'SE INDICADA PELA APRECIAÇÃO DE RISCOS A NECESSIDADE DE REDUNDÂNCIA DOS DISPOSITIVOS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.38',
            'descricao'         => 'AS ZONAS DE PERIGO DAS MÁQUINAS E EQUIPAMENTOS DEVEM POSSUIR SISTEMAS DE SEGURANÇA:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.39',
            'descricao'         => 'OS SISTEMAS DE SEGURANÇA DEVEM SER SELECIONADOS E INSTALADOS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.40',
            'descricao'         => 'OS SISTEMAS DE SEGURANÇA, SE INDICADO PELA APRECIAÇÃO DE RISCOS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.41',
            'descricao'         => 'PARA FINS DE APLICAÇÃO DESTA NORMA CONSIDERA-SE PROTEÇÃO O ELEMENTO ESPECIFICAMENTE:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.42',
            'descricao'         => 'PARA FINS DE APLICAÇÃO DESTA NORMA, CONSIDERAM-SE DISPOSITIVOS DE SEGURANÇA OS COMPONENTES:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.39',
            'descricao'         => 'OS SISTEMAS DE SEGURANÇA DEVEM SER SELECIONADOS E INSTALADOS:',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '12.39',
            'descricao'         => 'OS SISTEMAS DE SEGURANÇA DEVEM SER SELECIONADOS E INSTALADOS:',
            'usuario_alteracao' => 'Sistema'
        ]);



    } 
}
