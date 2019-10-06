<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr04TableSeeder extends Seeder
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

        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','4.1')->first();
        $sub1 = $paragrafo1->id_paragrafo;
        
        $paragrafo2 = DB::table('paragrafos')->where('numero_paragrafo','4.2')->first();
        $sub2 = $paragrafo2->id_paragrafo;
        
        $paragrafo3 = DB::table('paragrafos')->where('numero_paragrafo','4.3')->first();
        $sub3 = $paragrafo3->id_paragrafo;
        
        $paragrafo4 = DB::table('paragrafos')->where('numero_paragrafo','4.4')->first();
        $sub4 = $paragrafo4->id_paragrafo;
        
        $paragrafo5 = DB::table('paragrafos')->where('numero_paragrafo','4.5')->first();
        $sub5 = $paragrafo5->id_paragrafo;
        
        $paragrafo6 = DB::table('paragrafos')->where('numero_paragrafo','4.6')->first();
        $sub6 = $paragrafo6->id_paragrafo;
        
        $paragrafo7 = DB::table('paragrafos')->where('numero_paragrafo','4.7')->first();
        $sub7 = $paragrafo7->id_paragrafo;
        
        $paragrafo8 = DB::table('paragrafos')->where('numero_paragrafo','4.8')->first();
        $sub8 = $paragrafo8->id_paragrafo;
        
        $paragrafo9 = DB::table('paragrafos')->where('numero_paragrafo','4.9')->first();
        $sub9 = $paragrafo9->id_paragrafo;
        
        $paragrafo10 = DB::table('paragrafos')->where('numero_paragrafo','4.10')->first();
        $sub10 = $paragrafo10->id_paragrafo;
        
        $paragrafo11 = DB::table('paragrafos')->where('numero_paragrafo','4.11')->first();
        $sub11 = $paragrafo11->id_paragrafo;
        
        $paragrafo12 = DB::table('paragrafos')->where('numero_paragrafo','4.12')->first();
        $sub12 = $paragrafo12->id_paragrafo;
        
        $paragrafo13 = DB::table('paragrafos')->where('numero_paragrafo','4.13')->first();
        $sub13 = $paragrafo13->id_paragrafo;
        
        $paragrafo14 = DB::table('paragrafos')->where('numero_paragrafo','4.14')->first();
        $sub14 = $paragrafo14->id_paragrafo;
        
        $paragrafo15 = DB::table('paragrafos')->where('numero_paragrafo','4.15')->first();
        $sub15 = $paragrafo15->id_paragrafo;
        
        $paragrafo16 = DB::table('paragrafos')->where('numero_paragrafo','4.16')->first();
        $sub16 = $paragrafo16->id_paragrafo;

        $paragrafo17 = DB::table('paragrafos')->where('numero_paragrafo','4.17')->first();
        $sub17 = $paragrafo17->id_paragrafo;

        $paragrafo18 = DB::table('paragrafos')->where('numero_paragrafo','4.18')->first();
        $sub18 = $paragrafo18->id_paragrafo;

        $paragrafo19 = DB::table('paragrafos')->where('numero_paragrafo','4.19')->first();
        $sub19 = $paragrafo19->id_paragrafo;

        $paragrafo20 = DB::table('paragrafos')->where('numero_paragrafo','4.20')->first();
        $sub20 = $paragrafo20->id_paragrafo;

        
        SubParagrafo::create([
        'paragrafo_id'      => $sub1,
        'numero_paragrafo'  =>'4.1',
        'descricao'         =>'As empresas privadas e públicas, os órgãos públicos da administração direta e indireta e dos poderes Legislativo e Judiciário, que possuam empregados regidos pela Consolidação das Leis do Trabalho - CLT, manterão, obrigatoriamente, Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, com a finalidade de promover a saúde e proteger a integridade do trabalhador no local de trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2',
            'descricao'         =>'O dimensionamento dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho vincula-se à gradação do risco da, atividade principal e ao número total de empregados do estabelecimento, constantes dos Quadros I e II, anexos, observadas as exceções previstas nesta NR.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.1',
            'descricao'         =>'Para fins de dimensionamento, os canteiros de obras e as frentes de trabalho com menos de 1 (um) mil empregados e situados no mesmo estado, território ou Distrito Federal não serão considerados como estabelecimentos, mas como integrantes da empresa de engenharia principal responsável, a quem caberá organizar os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.1.1',
            'descricao'         =>'Neste caso, os engenheiros de segurança do trabalho, os médicos do trabalho e os enfermeiros do trabalho poderão ficar centralizados.','usuario_alteracao' =>'Sistema']);        
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.1.2',
            'descricao'         =>'Para os técnicos de segurança do trabalho e auxiliares de enfermagem do trabalho, o dimensionamento será feito por canteiro de obra ou frente de trabalho, conforme o Quadro II, anexo.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.2',
            'descricao'         =>'As empresas que possuam mais de 50 (cinquenta) por cento de seus empregados em estabelecimentos ou setores com atividade cuja gradação de risco seja de grau superior ao da atividade principal deverão dimensionar os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, em função do maior grau de risco, obedecido o disposto no Quadro II desta NR','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.3',
            'descricao'         =>'A empresa poderá constituir Serviço Especializado em Engenharia de Segurança e em Medicina do Trabalho centralizado para atender a um conjunto de estabelecimentos pertencentes a ela, desde que a distância a ser percorrida entre aquele em que se situa o serviço e cada um dos demais não ultrapasse a 5 (cinco) mil metros, dimensionando-o em função do total de empregados e do risco, de acordo com o Quadro II, anexo, e o subitem 4.2.2.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.4',
            'descricao'         =>'Havendo, na empresa, estabelecimento(s) que se enquadre(m) no Quadro II, desta NR, e outro(s) que não se enquadre(m), a assistência a este(s) será feita pelos serviços especializados daquele(s), dimensionados conforme os subitens 4.2.5.1 e 4.2.5.2 e desde que localizados no mesmo estado, território ou Distrito Federal.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.5',
            'descricao'         =>'Havendo, na mesma empresa, apenas estabelecimentos que, isoladamente, não se enquadrem no Quadro II, anexo, o cumprimento desta NR será feito através de Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho centralizados em cada estado, território ou Distrito Federal, desde que o total de empregados dos estabelecimentos no estado, território ou Distrito Federal alcance os limites previstos no Quadro II, anexo, aplicado o disposto no subitem 4.2.2.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'4.2.5.1',
            'descricao'         =>'Para as empresas enquadradas no grau de risco 1 o dimensionamento dos serviços referidos no subitem 4.2.5 obedecerá ao Quadro II, anexo, considerando-se como número de empregados o somatório dos empregados existentes no estabelecimento que possua o maior número e a média aritmética do número de empregados dos demais estabelecimentos, devendo todos os profissionais integrantes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, assim constituídos, cumprirem tempo integral.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
                'paragrafo_id'      => $sub2,
                'numero_paragrafo'  =>'4.2.5.2',
                'descricao'         =>'Para as empresas enquadradas nos graus de risco 2, 3 e 4, o dimensionamento dos serviços referidos no subitem 4.2.5 obedecerá o Quadro II, anexo, considerando-se como número de empregados o somatório dos empregados de todos os estabelecimentos.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3',
            'descricao'         =>'As empresas enquadradas no grau de risco 1 obrigadas a constituir Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho e que possuam outros serviços de medicina e engenharia poderão integrar estes serviços com os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho constituindo um serviço único de engenharia e medicina.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.1',
            'descricao'         =>'As empresas que optarem pelo serviço único de engenharia e medicina ficam obrigadas a elaborar e submeter à aprovação da Secretaria de Segurança e Medicina do Trabalho, até o dia 30 de março, um programa bienal de segurança e medicina do trabalho a ser desenvolvido.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.1.1',
            'descricao'         =>'As empresas novas que se instalarem após o dia 30 de março de cada exercício poderão constituir o serviço único de que trata o subitem 4.3.1 e elaborar o programa respectivo a ser submetido à Secretaria de Segurança e Medicina do Trabalho, no prazo de 90 (noventa) dias a contar de sua instalação.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.1.2',
            'descricao'         =>'As empresas novas, integrantes de grupos empresariais que já possuam serviço único, poderão ser assistidas pelo referido serviço, após comunicação à DRT.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.2',
            'descricao'         =>'À Secretaria de Segurança e Medicina do Trabalho fica reservado o direito de controlar a execução do programa e aferir a sua eficácia.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.3',
            'descricao'         =>'O serviço único de engenharia e medicina deverá possuir os profissionais especializados previstos no Quadro II desta NR. (Alteração dada pela Portaria MTPS 510/2016).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'4.3.3',
            'descricao'         =>'O serviço único de engenharia e medicina deverá possuir os profissionais especializados previstos no Quadro II desta NR. (Alteração dada pela Portaria MTPS 510/2016).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho devem ser compostos por Médico do Trabalho, Engenheiro de Segurança do Trabalho, Técnico de Segurança do Trabalho, Enfermeiro do Trabalho e Auxiliar ou Técnico em Enfermagem do Trabalho, obedecido o Quadro II desta NR.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4.1',
            'descricao'         =>'O serviço único de engenharia e medicina deverá possuir os profissionais especializados previstos no Quadro II desta NR. (Alteração dada pela Portaria MTPS 510/2016).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4.1',
            'descricao'         =>'Os profissionais integrantes do SESMT devem possuir formação e registro profissional em conformidade com o disposto na regulamentação da profissão e nos instrumentos normativos emitidos pelo respectivo Conselho Profissional, quando existente.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4.1',
            'descricao'         =>'O serviço único de engenharia e medicina deverá possuir os profissionais especializados previstos no Quadro II desta NR. (Alteração dada pela Portaria MTPS 510/2016). 
            a) engenheiro de segurança do trabalho - engenheiro ou arquiteto portador de certificado de conclusão de curso de especialização em Engenharia de Segurança do Trabalho, em nível de pós-graduação;

            b) médico do trabalho - médico portador de certificado de conclusão de curso de especialização em Medicina do Trabalho, em nível de pós-graduação, ou portador de certificado de residência médica em área de concentração em saúde do trabalhador ou denominação equivalente, reconhecida pela Comissão Nacional de Residência Médica, do Ministério da Educação, ambos ministrados por universidade ou faculdade que mantenha curso de graduação em Medicina;
            c) enfermeiro do trabalho - enfermeiro portador de certificado de conclusão de curso de especialização em Enfermagem do Trabalho, em nível de pós-graduação, ministrado por universidade ou faculdade que mantenha curso de graduação em enfermagem;

            d) auxiliar de enfermagem do trabalho - auxiliar de enfermagem ou técnico de enfermagem portador de certificado de conclusão de curso de qualificação de auxiliar de enfermagem do trabalho, ministrado por instituição especializada reconhecida e autorizada pelo Ministério da Educação;

            e) técnico de segurança do trabalho: técnico portador de comprovação de registro profissional expedido pelo Ministério do Trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4.1.1',
            'descricao'         =>'Em relação às Categorias mencionadas nas alíneas "a" e "c", observar-se-à o disposto na Lei no 7.410, de 27 de novembro de 1985.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'4.4.2',
            'descricao'         =>'Os profissionais integrantes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho deverão ser empregados da empresa, salvo os casos previstos nos itens 4.14 e 4.15.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5',
            'descricao'         =>'A empresa que contratar outra(s) para prestar serviços em estabelecimentos enquadrados no Quadro II, anexo, deverá estender a assistência de seus Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho aos empregados da(s) contratada(s), sempre que o número de empregados desta(s), exercendo atividade naqueles estabelecimentos, não alcançar os limites previstos no Quadro II, devendo, ainda, a contratada cumprir o disposto no subitem 4.2.5.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.1',
            'descricao'         =>'Quando a empresa contratante e as outras por ela contratadas não se enquadrarem no Quadro II, anexo, mas que pelo número total de empregados de ambos, no estabelecimento, atingirem os limites dispostos no referido quadro, deverá ser constituído um serviço especializado em Engenharia de Segurança e em Medicina do Trabalho comum, nos moldes do item 4.14. (104.015-4 / I2)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.2',
            'descricao'         =>'Quando a empresa contratada não se enquadrar no Quadro II, anexo, mesmo considerando-se o total de empregados nos estabelecimentos, a contratante deve estender aos empregados da contratada a assistência de seus Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, sejam estes centralizados ou por estabelecimento. (104.016-2 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.3',
            'descricao'         =>'A empresa que contratar outras para prestar serviços em seu estabelecimento pode constituir SESMT comum para assistência aos empregados das contratadas, sob gestão própria, desde que previsto em Convenção ou Acordo Coletivo de Trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.3.1',
            'descricao'         =>'O dimensionamento do SESMT organizado na forma prevista no subitem 4.5.3 deve considerar o somatório dos trabalhadores assistidos e a atividade econômica do estabelecimento da contratante.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.3.2',
            'descricao'         =>'No caso previsto no item 4.5.3, o número de empregados da empresa contratada no estabelecimento da contratante, assistidos pelo SESMT comum, não integra a base de cálculo para dimensionamento do SESMT da empresa contratada.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'4.5.3.3',
            'descricao'         =>'O SESMT organizado conforme o subitem 4.5.3 deve ter seu funcionamento avaliado semestralmente, por Comissão composta de representantes da empresa contratante, do sindicato de trabalhadores e da Delegacia Regional do Trabalho, ou na forma e periodicidade previstas na Convenção ou Acordo Coletivo de Trabalho. (Subitem 4.5.3 aprovado pela Portaria SST 17/2007).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub6,
            'numero_paragrafo'  =>'4.6',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho das empresas que operem em regime sazonal deverão ser dimensionados, tomando-se por base a média aritmética do número de trabalhadores do ano civil anterior e obedecidos os Quadros I e II anexos. (104.017-0 / I1).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub7,
            'numero_paragrafo'  =>'4.7',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho deverão ser chefiados por profissional qualificado, segundo os requisitos especificados no subitem 4.4.1 desta NR. (104.018-9 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub8,
            'numero_paragrafo'  =>'4.8',
            'descricao'         =>'O técnico de segurança do trabalho e o auxiliar de enfermagem do trabalho deverão dedicar 8 (oito) horas por dia para as atividades dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, de acordo com o estabelecido no Quadro II, anexo. (104.019-7 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub9,
            'numero_paragrafo'  =>'4.9',
            'descricao'         =>'O engenheiro de segurança do trabalho, o médico do trabalho e o enfermeiro do trabalho deverão dedicar, no mínimo, 3 (três) horas (tempo parcial) ou 6 (seis) horas (tempo integral) por dia para as atividades dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, de acordo com o estabelecido no Quadro II, anexo, respeitada a legislação pertinente em vigor. (104.020-0 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub9,
            'numero_paragrafo'  =>'4.9.1',
            'descricao'         =>'Relativamente ao médico do trabalho, para cumprimento das atividades dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho em tempo integral, a empresa poderá contratar mais de um profissional, desde que cada um dedique, no mínimo, 3 (três) horas de trabalho, sendo necessário que o somatório das horas diárias trabalhadas por todos seja de, no mínimo, 6 (seis) horas.  (Inclusão dada pela Portaria MTE 590/2014).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub10,
            'numero_paragrafo'  =>'4.10',
            'descricao'         =>'Ao profissional especializado em Segurança e em Medicina do Trabalho é vedado o exercício de outras atividades na empresa, durante o horário de sua atuação nos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho. (104.021-9 / I2)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub11,
            'numero_paragrafo'  =>'4.11',
            'descricao'         =>'Ficará por conta exclusiva do empregador todo o ônus decorrente da instalação e manutenção dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho. (104.022-7 / I2).','usuario_alteracao' =>'Sistema']);
        // SubParagrafo::create([
        //     'paragrafo_id'      => $sub12,
        //     'numero_paragrafo'  =>'4.12',
        //     'descricao'         =>'Compete aos profissionais integrantes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho:

        //     a) aplicar os conhecimentos de engenharia de segurança e de medicina do trabalho ao ambiente de trabalho e a todos os seus componentes, inclusive máquinas e equipamentos, de modo a reduzir até eliminar os riscos ali existentes à saúde do trabalhador;
            
        //     b) determinar, quando esgotados todos os meios conhecidos para a eliminação do risco e este persistir, mesmo reduzido, a utilização, pelo trabalhador, de Equipamentos de Proteção Individual-EPI, de acordo com o que determina a NR 6, desde que a concentração, a intensidade ou característica do agente assim o exija;
            
        //     c) colaborar, quando solicitado, nos projetos e na implantação de novas instalações físicas e tecnológicas da empresa, exercendo a competência disposta na alínea "a";
            
        //     d) responsabilizar-se tecnicamente, pela orientação quanto ao cumprimento do disposto nas NR aplicáveis às atividades executadas pela empresa e/ou seus estabelecimentos;
        //     e) manter permanente relacionamento com a CIPA, valendo-se ao máximo de suas observações, além de apoiá-la, treiná-la e atendê-la, conforme dispõe a NR 5;

        //     f) promover a realização de atividades de conscientização, educação e orientação dos trabalhadores para a prevenção de acidentes do trabalho e doenças ocupacionais, tanto através de campanhas quanto de programas de duração permanente;

        //     g) esclarecer e conscientizar os empregadores sobre acidentes do trabalho e doenças ocupacionais, estimulando-os em favor da prevenção;

        //     h) analisar e registrar em documento(s) específico(s) todos os acidentes ocorridos na empresa ou estabelecimento, com ou sem vítima, e todos os casos de doença ocupacional, descrevendo a história e as características do acidente e/ou da doença ocupacional, os fatores ambientais, as características do agente e as condições do(s) indivíduo(s) portador(es) de doença ocupacional ou acidentado(s);

        //     i) registrar mensalmente os dados atualizados de acidentes do trabalho, doenças ocupacionais e agentes de insalubridade, preenchendo, no mínimo, os quesitos descritos nos modelos de mapas constantes nos Quadros III, IV, V e VI, devendo a empresa encaminhar um mapa contendo avaliação anual dos mesmos dados à Secretaria de Segurança e Medicina do Trabalho até o dia 31 de janeiro, através do órgão regional do MTb;

        //     j) manter os registros de que tratam as alíneas "h" e "i" na sede dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho ou facilmente alcançáveis a partir da mesma, sendo de livre escolha da empresa o método de arquivamento e recuperação, desde que sejam asseguradas condições de acesso aos registros e entendimento de seu conteúdo, devendo ser guardados somente os mapas anuais dos dados correspondentes às alíneas "h" e "i" por um período não- inferior a 5 (cinco) anos;

        //     l) as atividades dos profissionais integrantes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho são essencialmente prevencionistas, embora não seja vedado o atendimento de emergência, quando se tornar necessário. Entretanto, a elaboração de planos de controle de efeitos de catástrofes, de disponibilidade de meios que visem ao combate a incêndios e ao salvamento e de imediata atenção à vítima deste ou de qualquer outro tipo de acidente estão incluídos em suas atividades.',
        //     'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub13,
            'numero_paragrafo'  =>'4.13',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho deverão manter entrosamento permanente com a CIPA, dela valendo-se como agente multiplicador, e deverão estudar suas observações e solicitações, propondo soluções corretivas e preventivas, conforme o disposto no subitem 5.14.1. da NR 5.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14',
            'descricao'         =>'As empresas cujos estabelecimentos não se enquadrem no Quadro II, anexo a esta NR, poderão dar assistência na área de segurança e medicina do trabalho a seus empregados através de Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho comuns, organizados pelo sindicato ou associação da categoria econômica correspondente ou pelas próprias empresas interessadas.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.1',
            'descricao'         =>'A manutenção desses Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho deverá ser feita pelas empresas usuárias, que participarão das despesas em proporção ao número de empregados de cada uma.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.2',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho previstos no item 4.14 deverão ser dimensionados em função do somatório dos empregados das empresas participantes, obedecendo ao disposto nos Quadros I e II e no subitem 4.2.1.2, desta NR.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.3',
            'descricao'         =>'As empresas de mesma atividade econômica, localizadas em um mesmo município, ou em municípios limítrofes, cujos estabelecimentos se enquadrem no Quadro II, podem constituir SESMT comum, organizado pelo sindicato patronal correspondente ou pelas próprias empresas interessadas, desde que previsto em Convenção ou Acordo Coletivo de Trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.3.1',
            'descricao'         =>'O SESMT comum pode ser estendido a empresas cujos estabelecimentos não se enquadrem no Quadro II, desde que atendidos os demais requisitos do subitem 4.14.3.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.3.2',
            'descricao'         =>'O dimensionamento do SESMT organizado na forma do subitem 4.14.3 deve considerar o somatório dos trabalhadores assistidos.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.3.3',
            'descricao'         =>'No caso previsto no item 4.14.3, o número de empregados assistidos pelo SESMT comum não integra a base de cálculo para dimensionamento do SESMT das empresas.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.3.4',
            'descricao'         =>'O SESMT organizado conforme o subitem 4.14.3 deve ter seu funcionamento avaliado semestralmente, por Comissão composta de representantes das empresas, do sindicato de trabalhadores e da Delegacia Regional do Trabalho, ou na forma e periodicidade previstas na Convenção ou Acordo Coletivo de Trabalho. (Subitem 4.14.3 aprovado pela Portaria SST 17/2007).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.4',
            'descricao'         =>'As empresas que desenvolvem suas atividades em um mesmo polo industrial ou comercial podem constituir SESMT comum, organizado pelas próprias empresas interessadas, desde que previsto nas Convenções ou Acordos Coletivos de Trabalho das categorias envolvidas.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.4.1',
            'descricao'         =>'O dimensionamento do SESMT comum organizado na forma do subitem 4.14.4 deve considerar o somatório dos trabalhadores assistidos e a atividade econômica que empregue o maior número entre os trabalhadores assistidos.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.4.2',
            'descricao'         =>'No caso previsto no item 4.14.4, o número de empregados assistidos pelo SESMT comum não integra a base de cálculo para dimensionamento do SESMT das empresas.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub14,
            'numero_paragrafo'  =>'4.14.4.2',
            'descricao'         =>'O SESMT organizado conforme o subitem 4.14.4 deve ter seu funcionamento avaliado semestralmente, por Comissão composta de representantes das empresas, dos sindicatos de trabalhadores e da Delegacia Regional do Trabalho, ou na forma e periodicidade previstas nas Convenções ou Acordos Coletivos de Trabalho. (Subitem 4.14.4 aprovado pela Portaria SST 17/2007).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub15,
            'numero_paragrafo'  =>'4.15',
            'descricao'         =>'As empresas referidas no item 4.14 poderão optar pelos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho de instituição oficial ou instituição privada de utilidade pública, cabendo às empresas o custeio das despesas, na forma prevista no subitem 4.14.1.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub16,
            'numero_paragrafo'  =>'4.16',
            'descricao'         =>'As empresas cujos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho não possuam médico do trabalho e/ou engenheiro de segurança do trabalho, de acordo com o Quadro II desta NR, poderão se utilizar dos serviços destes profissionais existentes nos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho mencionados no item 4.14 e subitem 4.14.1 ou no item 4.15, para atendimento do disposto nas NR.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub16,
            'numero_paragrafo'  =>'4.16.1',
            'descricao'         =>'O ônus decorrente dessa utilização caberá à empresa solicitante.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub17,
            'numero_paragrafo'  =>'4.17',
            'descricao'         =>'Os serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho de que trata esta NR deverão ser registrados no órgão regional do MTb. (104.023-5 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub17,
            'numero_paragrafo'  =>'4.17.1',
            'descricao'         =>'O registro referido no item 4.17 deverá ser requerido ao órgão regional do MTb e o requerimento deverá conter os seguintes dados:

            a) nome dos profissionais integrantes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho;
            
            b) número de registro dos profissionais na Secretaria de Segurança e Medicina do Trabalho do MTb;
            
            c) número de empregados da requerente e grau de risco das atividades, por estabelecimento;
            
            d) especificação dos turnos de trabalho, por estabelecimento;
            
            e) horário de trabalho dos profissionais dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub18,
            'numero_paragrafo'  =>'4.18',
            'descricao'         =>'Os Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho, já constituídos, deverão ser redimensionados nos termos desta NR e a empresa terá 90 (noventa) dias de prazo, a partir da publicação desta Norma, para efetuar o redimensionamento e o registro referido no item 4.17. (104.024-3 / I1)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub19,
            'numero_paragrafo'  =>'4.19',
            'descricao'         =>'A empresa é responsável pelo cumprimento da NR, devendo assegurar, como um dos meios para concretizar tal responsabilidade, o exercício profissional dos componentes dos Serviços Especializados em Engenharia de Segurança e em Medicina do Trabalho. O impedimento do referido exercício profissional, mesmo que parcial e o desvirtuamento ou desvio de funções constituem, em conjunto ou separadamente, infrações classificadas no grau I4, se devidamente comprovadas, para os fins de aplicação das penalidades previstas na NR 28. (104.025-1 / I4)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub20,
            'numero_paragrafo'  =>'4.20',
            'descricao'         =>'Quando se tratar de empreiteiras ou empresas prestadoras de serviços, considera-se estabelecimento, para fins de aplicação desta NR, o local em que os seus empregados estiverem exercendo suas atividades.','usuario_alteracao' =>'Sistema']);
        }
}