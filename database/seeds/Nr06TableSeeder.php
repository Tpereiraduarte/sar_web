<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr06TableSeeder extends Seeder
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

        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','6.1')->first();
        $sub1 = $paragrafo1->id_paragrafo;
        
        $paragrafo2 = DB::table('paragrafos')->where('numero_paragrafo','6.2')>first();
        $sub2 = $paragrafo2->id_paragrafo;
        
        $paragrafo3 = DB::table('paragrafos')->where('numero_paragrafo','6.3')->first();
        $sub3 = $paragrafo3->id_paragrafo;
        
        $paragrafo4 = DB::table('paragrafos')->where('numero_paragrafo','6.4')->first();
        $sub4 = $paragrafo4->id_paragrafo;
        
        $paragrafo5 = DB::table('paragrafos')->where('numero_paragrafo','6.5')->first();
        $sub5 = $paragrafo5->id_paragrafo;
        
        $paragrafo6 = DB::table('paragrafos')->where('numero_paragrafo','6.6')->first();
        $sub6 = $paragrafo6->id_paragrafo;
        
        $paragrafo7 = DB::table('paragrafos')->where('numero_paragrafo','6.7')->first();
        $sub7 = $paragrafo7->id_paragrafo;
        
        $paragrafo8 = DB::table('paragrafos')->where('numero_paragrafo','6.8')->first();
        $sub8 = $paragrafo8->id_paragrafo;
        
        $paragrafo9 = DB::table('paragrafos')->where('numero_paragrafo','6.9')->first();
        $sub9 = $paragrafo9->id_paragrafo;
        
        $paragrafo10 = DB::table('paragrafos')->where('numero_paragrafo','6.10')->first();
        $sub10 = $paragrafo10->id_paragrafo;
        
        $paragrafo11 = DB::table('paragrafos')->where('numero_paragrafo','6.11')->first();
        $sub11 = $paragrafo11->id_paragrafo;
        

        
        SubParagrafo::create([
        'paragrafo_id'      => $sub1,
        'numero_paragrafo'  =>'6.1',
        'descricao'         =>'Para os fins de aplicação desta Norma Regulamentadora - NR, considera-se Equipamento de Proteção Individual - EPI, todo dispositivo ou produto, de uso individual utilizado pelo trabalhador, destinado à proteção de riscos suscetíveis de ameaçar a segurança e a saúde no trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'6.1.1',
            'descricao'         =>'Entende-se como Equipamento Conjugado de Proteção Individual, todo aquele composto por vários dispositivos, que o fabricante tenha associado contra um ou mais riscos que possam ocorrer simultaneamente e que sejam suscetíveis de ameaçar a segurança e a saúde no trabalho.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.2',
            'descricao'         =>'O equipamento de proteção individual, de fabricação nacional ou importado, só poderá ser posto à venda ou utilizado com a indicação do Certificado de Aprovação - CA, expedido pelo órgão nacional competente em matéria de segurança e saúde no trabalho do Ministério do Trabalho e Emprego.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.3',
            'descricao'         =>'A empresa é obrigada a fornecer aos empregados, gratuitamente, EPI adequado ao risco, em perfeito estado de conservação e funcionamento, nas seguintes circunstâncias:

                a) sempre que as medidas de ordem geral não ofereçam completa proteção contra os riscos de acidentes do trabalho ou de doenças profissionais e do trabalho;
                
                 b) enquanto as medidas de proteção coletiva estiverem sendo implantadas; e,
                
                c) para atender a situações de emergência.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.4',
            'descricao'         =>' Atendidas as peculiaridades de cada atividade profissional, e observado o disposto no item 6.3, o empregador deve fornecer aos trabalhadores os EPI adequados, de acordo com o disposto no ANEXO I desta NR.','usuario_alteracao' =>'Sistema']);        
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.5',
            'descricao'         =>'As solicitações para que os produtos que não estejam relacionados no ANEXO I, desta NR, sejam considerados como EPI, bem como as propostas para reexame daqueles ora elencados, deverão ser avaliadas por comissão tripartite a ser constituída pelo órgão nacional competente em matéria de segurança e saúde no trabalho, após ouvida a CTPP, sendo as conclusões submetidas àquele órgão do Ministério do Trabalho e Emprego para aprovação.Compete ao Serviço Especializado em Engenharia de Segurança e em Medicina do Trabalho – SESMT, ouvida a Comissão Interna de Prevenção de Acidentes - CIPA e trabalhadores usuários, recomendar ao empregador o EPI adequado ao risco existente em determinada atividade.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.5.1',
            'descricao'         =>'Nas empresas desobrigadas a constituir SESMT, cabe ao empregador selecionar o EPI adequado ao risco, mediante orientação de profissional tecnicamente habilitado, ouvida a CIPA ou, na falta desta, o designado e trabalhadores usuários. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.6',
            'descricao'         =>'Responsabilidades do empregador. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.6.1',
            'descricao'         =>'Cabe ao empregador quanto ao EPI :

            a) adquirir o adequado ao risco de cada atividade;            
            b) exigir seu uso;            
            c) fornecer ao trabalhador somente o aprovado pelo órgão nacional competente em matéria de segurança e saúde no trabalho;            
            d) orientar e treinar o trabalhador sobre o uso adequado, guarda e conservação;
            e) substituir imediatamente, quando danificado ou extraviado;
            f) responsabilizar-se pela higienização e manutenção periódica; e,
            g) comunicar ao MTE qualquer irregularidade observada.
            h) registrar o seu fornecimento ao trabalhador, podendo ser adotados livros, fichas ou sistema eletrônico.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.7',
            'descricao'         =>'Responsabilidades do trabalhador. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
                'paragrafo_id'      => $sub2,
                'numero_paragrafo'  =>'6.7.1',
                'descricao'         =>'Cabe ao empregado quanto ao EPI:
                a) usar, utilizando-o apenas para a finalidade a que se destina;
                b) responsabilizar-se pela guarda e conservação;                
                c) comunicar ao empregador qualquer alteração que o torne impróprio para uso; e,                
                d) cumprir as determinações do empregador sobre o uso adequado.','usuario_alteracao' =>'Sistema']);        
        SubParagrafo::create([
                    'paragrafo_id'      => $sub2,
                    'numero_paragrafo'  =>'6.8',
                    'descricao'         =>'Responsabilidades de fabricantes e/ou importadores. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.8.1',
            'descricao'         =>'O fabricante nacional ou o importador deverá:
            a) cadastrar-se junto ao órgão nacional competente em matéria de segurança e saúde no trabalho; (alterado pela Portaria SIT/DSST 194/2010)            
            b) solicitar a emissão do CA; (alterado pela Portaria SIT/DSST 194/2010)
            c) solicitar a renovação do CA quando vencido o prazo de validade estipulado pelo órgão nacional competente em matéria de segurança e saúde do trabalho; (alterado pela Portaria SIT/DSST 194/2010)
            d) requerer novo CA quando houver alteração das especificações do equipamento aprovado; (alterado pela Portaria SIT/DSST 194/2010)
            e) responsabilizar-se pela manutenção da qualidade do EPI que deu origem ao Certificado de Aprovação - CA;
            f) comercializar ou colocar à venda somente o EPI, portador de CA;. 
            g) comunicar ao órgão nacional competente em matéria de segurança e saúde no trabalho quaisquer alterações dos dados cadastrais fornecidos; h) comercializar o EPI com instruções técnicas no idioma nacional, orientando sua utilização, manutenção, restrição e demais referências ao seu uso;
            i) fazer constar do EPI o número do lote de fabricação; e,
            j) providenciar a avaliação da conformidade do EPI no âmbito do SINMETRO, quando for o caso;
            k) fornecer as informações referentes aos processos de limpeza e higienização de seus EPI, indicando quando for o caso, o número de higienizações acima do qual é necessário proceder à revisão ou à substituição do equipamento, a fim de garantir que os mesmos mantenham as características de proteção original. (alterado pela Portaria SIT/DSST 194/2010)
            l) promover adaptação do EPI detentor de Certificado de Aprovação para pessoas com deficiência. (Alterado pela Portaria MTB 877/2018)','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.8.1.1',
            'descricao'         =>'Os procedimentos de cadastramento de fabricante e/ou importador de EPI e de emissão e/ou renovação de CA devem atender os requisitos estabelecidos em Portaria específica.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9',
            'descricao'         =>'Certificado de Aprovação - CA ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9.1',
            'descricao'         =>'Para fins de comercialização o CA concedido aos EPI terá validade:
            a) de 5 (cinco) anos, para aqueles equipamentos com laudos de ensaio que não tenham sua conformidade avaliada no âmbito do SINMETRO;
            b) do prazo vinculado à avaliação da conformidade no âmbito do SINMETRO, quando for o caso.
            c) de 2 (dois) anos, quando não existirem normas técnicas nacionais ou internacionais, oficialmente reconhecidas, ou laboratório capacitado para realização dos ensaios, sendo que nesses casos os EPI terão sua aprovação pelo órgão nacional competente em matéria de segurança e saúde no trabalho, mediante apresentação e análise do Termo de Responsabilidade Técnica e da especificação técnica de fabricação, podendo ser renovado por 24 (vinte e quatro) meses, quando se expirarão os prazos concedidos; e,
            d) de 2 (dois) anos, renováveis por igual período, para os EPI desenvolvidos após a data da publicação desta NR, quando não existirem normas técnicas nacionais ou internacionais, oficialmente reconhecidas, ou laboratório capacitado para realização dos ensaios, caso em que os EPI serão aprovados pelo órgão nacional competente em matéria de segurança e saúde no trabalho, mediante apresentação e análise do Termo de Responsabilidade Técnica e da especificação técnica de fabricação. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9.2',
            'descricao'         =>' O órgão nacional competente em matéria de segurança e saúde no trabalho, quando necessário e mediante justificativa, poderá estabelecer prazos diversos daqueles dispostos no subitem 6.9.1.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9.3',
            'descricao'         =>'Todo EPI deverá apresentar em caracteres indeléveis e bem visíveis, o nome comercial da empresa fabricante, o lote de fabricação e o número do CA, ou, no caso de EPI importado, o nome do importador, o lote de fabricação e o número do CA.

            ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9.3.1',
            'descricao'         =>'Na impossibilidade de cumprir o determinado no item 6.9.3, o órgão nacional competente em matéria de segurança e saúde no trabalho poderá autorizar forma alternativa de gravação, a ser proposta pelo fabricante ou importador, devendo esta constar do CA.
            6.10 - Restauração, lavagem e higienização de EPI            
            6.10.1 - Os EPI passíveis de restauração, lavagem e higienização, serão definidos pela comissão tripartite constituída, na forma do disposto no item 6.4.1, desta NR, devendo manter as características de proteção original.(Item excluído pela Portaria SIT/DSST 194/2010).','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.9.3.2',
            'descricao'         =>'A adaptação do Equipamento de Proteção Individual para uso pela pessoa com deficiência feita pelo fabricante ou importador detentor do Certificado de Aprovação não invalida o certificado já emitido, sendo desnecessária a emissão de novo CA','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.10',
            'descricao'         =>'Da competência do Ministério do Trabalho e Emprego / MTE','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.11',
            'descricao'         =>'Cabe ao órgão nacional competente em matéria de segurança e saúde no trabalho:
            a) cadastrar o fabricante ou importador de EPI;            
            b) receber e examinar a documentação para emitir ou renovar o CA de EPI;            
            c) estabelecer, quando necessário, os regulamentos técnicos para ensaios de EPI;            
            d) emitir ou renovar o CA e o cadastro de fabricante ou importador;            
            e) fiscalizar a qualidade do EPI;            
            f) suspender o cadastramento da empresa fabricante ou importadora; e,
            g) cancelar o CA. ','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.11.1.1',
            'descricao'         =>'Sempre que julgar necessário o órgão nacional competente em matéria de segurança e saúde no trabalho, poderá requisitar amostras de EPI, identificadas com o nome do fabricante e o número de referência, além de outros requisitos.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.11.1.1',
            'descricao'         =>'Sempre que julgar necessário o órgão nacional competente em matéria de segurança e saúde no trabalho, poderá requisitar amostras de EPI, identificadas com o nome do fabricante e o número de referência, além de outros requisitos.','usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'6.11.2',
            'descricao'         =>'Cabe ao órgão regional do MTE:
            a) fiscalizar e orientar quanto ao uso adequado e a qualidade do EPI;            
            b) recolher amostras de EPI; e,            
            c) aplicar, na sua esfera de competência, as penalidades cabíveis pelo descumprimento desta NR.            
            6.12 e Subitens (Revogados pela Portaria SIT n.º 125/2009).','usuario_alteracao' =>'Sistema']);
        
        }
}