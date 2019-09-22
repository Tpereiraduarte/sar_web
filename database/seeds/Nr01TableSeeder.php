<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr01TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSubParagrafos();
    }

    public function createSubParagrafos(){

        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','1.1')->first();
        $sub1 = $paragrafo1->id_paragrafo;
        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','1.2')->first();
        $sub2 = $paragrafo2->id_paragrafo;
        $paragrafo3 = DB::table('paragrafos')->where('numero_paragrafo','1.3')->first();
        $sub3 = $paragrafo3->id_paragrafo;
        $paragrafo4 = DB::table('paragrafos')->where('numero_paragrafo','1.4')->first();
        $sub4 = $paragrafo4->id_paragrafo;
        $paragrafo5 = DB::table('paragrafos')->where('numero_paragrafo','1.5')->first();
        $sub5 = $paragrafo5->id_paragrafo;
        $paragrafo6 = DB::table('paragrafos')->where('numero_paragrafo','1.6')->first();
        $sub6 = $paragrafo6->id_paragrafo;
        $paragrafo7 = DB::table('paragrafos')->where('numero_paragrafo','1.7')->first();
        $sub7 = $paragrafo7->id_paragrafo;
        $paragrafo8 = DB::table('paragrafos')->where('numero_paragrafo','1.8')->first();
        $sub8 = $paragrafo8->id_paragrafo;
        $paragrafo9 = DB::table('paragrafos')->where('numero_paragrafo','1.9')->first();
        $sub9 = $paragrafo9->id_paragrafo;
        $paragrafo10 = DB::table('paragrafos')->where('numero_paragrafo','1.10')->first();
        $sub10 = $paragrafo10->id_paragrafo;

        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'1.1',
            'descricao'         =>'As Normas Regulamentadoras - NR, relativas à segurança e medicina do trabalho, são de observância obrigatória pelas empresas privadas e públicas e pelos órgãos públicos da administração direta e indireta, bem como pelos órgãos dos Poderes Legislativo e Judiciário, que possuam empregados regidos pela Consolidação das Leis do Trabalho - CLT.', 'usuario_alteracao' =>'Sistema']);
        
        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'1.1.1',
            'descricao'         =>'As disposições contidas nas Normas Regulamentadoras – NR aplicam-se, no que couber, aos trabalhadores avulsos, às entidades ou empresas que lhes tomem o serviço e aos sindicatos representativos das respectivas categorias profissionais.', 'usuario_alteracao' =>'Sistema']);
            
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'1.2',
            'descricao'         =>'A observância das Normas Regulamentadoras - NR não desobriga as empresas do cumprimento de outras disposições que, com relação à matéria, sejam incluídas em códigos de obras ou regulamentos sanitários dos estados ou municípios, e outras, oriundas de convenções e acordos coletivos de trabalho.', 'usuario_alteracao' =>'Sistema']);
    
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'1.3',
            'descricao'         =>'A Secretaria de Segurança e Saúde no Trabalho - SSST é o órgão de âmbito nacional competente para coordenar, orientar, controlar e supervisionar as atividades relacionadas com a segurança e medicina do trabalho, inclusive a Campanha Nacional de Prevenção de Acidentes do Trabalho - CANPAT, o Programa de Alimentação do Trabalhador - PAT e ainda a fiscalização do cumprimento dos preceitos legais e regulamentares sobre segurança e medicina do trabalho em todo o território nacional.', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'1.3.1',
            'descricao'         =>'Compete, ainda, à Secretaria de Segurança e Saúde no Trabalho - SSST conhecer, em última instância, dos recursos voluntários ou de ofício, das decisões proferidas pelos Delegados Regionais do Trabalho, em matéria de segurança e saúde no trabalho.', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'1.3.1',
            'descricao'         =>'Compete, ainda, à Secretaria de Segurança e Saúde no Trabalho - SSST conhecer, em última instância, dos recursos voluntários ou de ofício, das decisões proferidas pelos Delegados Regionais do Trabalho, em matéria de segurança e saúde no trabalho.', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'1.4',
            'descricao'         =>'Nos limites de sua jurisdição, é o órgão regional competente para executar as atividades relacionadas com a segurança e medicina do trabalho, inclusive a Campanha Nacional de Prevenção dos Acidentes do Trabalho - CANPAT, o Programa de Alimentação do Trabalhador - PAT e ainda a fiscalização do cumprimento dos preceitos legais e regulamentares sobre segurança e medicina do trabalho', 'usuario_alteracao' =>'Sistema']);
        
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'1.4.1',
            'descricao'         =>'Compete, ainda, à Delegacia Regional do Trabalho - DRT ou à Delegacia do Trabalho Marítimo - DTM, nos limites de sua jurisdição:  

            a) adotar medidas necessárias à fiel observância dos preceitos legais e regulamentares sobre segurança e medicina do trabalho;
            
            b) impor as penalidades cabíveis por descumprimento dos preceitos legais e regulamentares sobre segurança e medicina do   trabalho;
            
            c) embargar obra, interditar estabelecimento, setor de serviço, canteiro de obra, frente de trabalho, locais de trabalho, máquinas e equipamentos;
            
            d) notificar as empresas, estipulando prazos, para eliminação e/ou neutralização de insalubridade;
            
            e) atender requisições judiciais para realização de perícias sobre segurança e medicina do trabalho nas localidades onde não houver médico do trabalho ou engenheiro de segurança do trabalho registrado no MTb. ', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'1.5',
            'descricao'         =>'Podem ser delegadas a outros órgãos federais, estaduais e municipais, mediante convênio autorizado pelo Ministro do Trabalho, atribuições de fiscalização e/ou orientação às empresas, quanto ao cumprimento dos preceitos legais e regulamentares sobre segurança e medicina do trabalho', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub6,
            'numero_paragrafo'  =>'1.6',
            'descricao'         =>') empregador, a empresa individual ou coletiva, que, assumindo os riscos da atividade econômica, admite, assalaria e dirige a prestação pessoal de serviços. Equiparam-se ao empregador os profissionais liberais, as instituições de beneficência, as associações recreativas ou outras instituições sem fins lucrativos, que admitem trabalhadores como empregados;

            b) empregado, a pessoa física que presta serviços de natureza não eventual a empregador, sob a dependência deste e mediante salário;
            
            c) empresa, o estabelecimento ou o conjunto de estabelecimentos, canteiros de obra, frente de trabalho, locais de trabalho e outras, constituindo a organização  de que se utiliza o empregador para atingir seus objetivos;
            
            d) estabelecimento, cada uma das unidades da empresa, funcionando em  lugares diferentes, tais como: fábrica, refinaria, usina, escritório, loja, oficina, depósito, laboratório;
            
            e) setor de serviço, a menor unidade administrativa ou operacional compreendida no mesmo estabelecimento;
            
            f) canteiro de obra, a área do trabalho fixa e temporária, onde se desenvolvem operações de apoio e execução à construção, demolição ou reparo de uma  obra;
            
            g) frente de trabalho, a área de trabalho móvel e temporária, onde se desenvolvem operações de apoio e execução à construção, demolição ou reparo de uma obra;

            h) local de trabalho, a área onde são executados os trabalhos. ', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub6,
            'numero_paragrafo'  =>'1.6.1',
            'descricao'         =>'Sempre que uma ou mais empresas, tendo, embora, cada uma delas, personalidade jurídica própria, estiverem sob direção, controle ou administração de outra, constituindo grupo industrial, comercial ou de qualquer outra atividade econômica, serão, para efeito de aplicação das Normas Regulamentadoras - NR, solidariamente responsáveis a empresa principal e cada uma das subordinadas.', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub7,
            'numero_paragrafo'  =>'1.7',
            'descricao'         =>'a) cumprir e fazer cumprir as disposições legais e regulamentares sobre segurança e medicina do trabalho; (101.001-8 / I1)

            b) elaborar ordens de serviço sobre segurança e saúde no trabalho, dando ciência aos empregados por comunicados, cartazes ou meios eletrônicos. (101.002-6 / I1) (Alterado pela Portaria SIT 84/2009).
            
             c) informar aos trabalhadores: (101.003-4 / I1)  
            
            I - os riscos profissionais que possam originar-se nos locais de trabalho;
            
            II - os meios para prevenir e limitar tais riscos e as medidas adotadas pela empresa;
            
            III - os resultados dos exames médicos e de exames complementares de diagnóstico aos quais os próprios trabalhadores forem submetidos;
            
            IV - os resultados das avaliações ambientais realizadas nos locais de trabalho. 
            
            d) permitir que representantes dos trabalhadores acompanhem a fiscalização dos preceitos legais e regulamentares sobre segurança e medicina do trabalho. (101.004-2 / I1) 
            
            e) determinar os procedimentos que devem ser adotados em caso de acidente ou doença relacionada ao trabalho. (Redação dada pela Portaria SIT 84/2009)', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub8,
            'numero_paragrafo'  =>'1.8',
            'descricao'         =>'a) cumprir as disposições legais e regulamentares sobre segurança e saúde do trabalho, inclusive as ordens de serviço expedidas pelo empregador;(Alterado pela Portaria SIT 84/2009).', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub8,
            'numero_paragrafo'  =>'1.8.1',
            'descricao'         =>'Constitui ato faltoso a recusa injustificada do empregado ao cumprimento do disposto no item anterior.', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub9,
            'numero_paragrafo'  =>'1.9',
            'descricao'         =>'O não cumprimento das disposições legais e regulamentares sobre segurança e medicina do trabalho acarretará ao empregador a aplicação das penalidades previstas na legislação pertinente.', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub10,
            'numero_paragrafo'  =>'1.10',
            'descricao'         =>'As dúvidas suscitadas e os casos omissos verificados na execução das Normas Regulamentadoras - NR serão decididos pela Secretaria de Segurança e Medicina do Trabalho - SSMT.', 'usuario_alteracao' =>'Sistema']);
    }
}
