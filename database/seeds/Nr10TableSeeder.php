<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr10TableSeeder extends Seeder
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
        SubParagrafo::create([
        'paragrafo_id'      =>'1',
        'numero_paragrafo'  =>'10.1.1',
        'descricao'         =>'Esta Norma Regulamentadora - NR estabelece os requisitos e condições mínimas objetivando a implementação de medidas de controle e sistemas preventivos, de forma a garantir a segurança e a saúde dos trabalhadores que, direta ou indiretamente, interajam em instalações elétricas e serviços com eletricidade.',
        'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'1',
            'numero_paragrafo'  =>'10.1.2',
            'descricao'         =>'Esta NR se aplica às fases de geração, transmissão, distribuição e consumo, incluindo as etapas de projeto, construção, montagem, operação, manutenção das instalações elétricas e quaisquer trabalhos realizados nas suas proximidades, observando-se as normas técnicas oficiais estabelecidas pelos órgãos competentes e, na ausência ou omissão destas, as normas internacionais cabíveis.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.1',
            'descricao'         =>'Em todas as intervenções em instalações elétricas devem ser adotadas medidas preventivas de controle do risco elétrico e de outros riscos adicionais, mediante técnicas de análise de risco, de forma a garantir a segurança e a saúde no trabalho.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.2',
            'descricao'         =>'As medidas de controle adotadas devem integrar-se às demais iniciativas da empresa, no âmbito da preservação da segurança, da saúde e do meio ambiente do trabalho.',
            'usuario_alteracao' =>'']);
            
        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.3',
            'descricao'         =>'As empresas estão obrigadas a manter esquemas unifilares atualizados das instalações elétricas dos seus estabelecimentos com as especificações do sistema de aterramento e demais equipamentos e dispositivos de proteção.',
            'usuario_alteracao' =>'']);
            
        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.4',
            'descricao'         =>'Os estabelecimentos com carga instalada superior a 75 kW devem constituir e manter o Prontuário de Instalações Elétricas, contendo, além do disposto no subitem 10.2.3, no mínimo:
            a) conjunto de procedimentos e instruções técnicas e administrativas de segurança e saúde, implantadas e
            relacionadas a esta NR e descrição das medidas de controle existentes;
            b) documentação das inspeções e medições do sistema de proteção contra descargas atmosféricas e aterramentos elétricos;
            c) especificação dos equipamentos de proteção coletiva e individual e o ferramental, aplicáveis conforme determina esta NR;
            d) documentação comprobatória da qualificação, habilitação, capacitação, autorização dos trabalhadores e dos treinamentos realizados;
            e) resultados dos testes de isolação elétrica realizados em equipamentos de proteção individual e coletiva;
            f) certificações dos equipamentos e materiais elétricos em áreas classificadas;
            g) relatório técnico das inspeções atualizadas com recomendações, cronogramas de adequações, contemplando as alíneas de (a à f).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.5',
            'descricao'         =>'As empresas que operam em instalações ou equipamentos integrantes do sistema elétrico de potência devem constituir prontuário com o conteúdo do item 10.2.4 e acrescentar ao prontuário os documentos a seguir listados:
            a) descrição dos procedimentos para emergências;
            b) certificações dos equipamentos de proteção coletiva e individual;',
            'usuario_alteracao' =>'']);
        
        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.5.1',
            'descricao'         =>'As empresas que realizam trabalhos em proximidade do Sistema Elétrico de Potência devem constituir prontuário contemplando as alíneas (a), (c), (d) e (e), do item 10.2.4 e alíneas (a) e (b) do item 10.2.5.',
            'usuario_alteracao' =>'']);
            
        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.6',
            'descricao'         =>'O Prontuário de Instalações Elétricas deve ser organizado e mantido atualizado pelo empregador ou pessoa
            formalmente designada pela empresa, devendo permanecer à disposição dos trabalhadores envolvidos nas instalações e serviços em eletricidade.',
            'usuario_alteracao' =>'']);        
          
        SubParagrafo::create([
            'paragrafo_id'      =>'2',
            'numero_paragrafo'  =>'10.2.7',
            'descricao'         =>'Os documentos técnicos previstos no Prontuário de Instalações Elétricas devem ser elaborados por profissional legalmente habilitado.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'3',
            'numero_paragrafo'  =>'10.2.8.1',
            'descricao'         =>'Em todos os serviços executados em instalações elétricas devem ser previstas e adotadas, prioritariamente, medidas de proteção coletiva aplicáveis, mediante procedimentos, às atividades a serem desenvolvidas, de forma a garantir a segurança e a saúde dos trabalhadores.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'3',
            'numero_paragrafo'  =>'10.2.8.2',
            'descricao'         =>'As medidas de proteção coletiva compreendem, prioritariamente, a desenergização elétrica conforme estabelece esta NR e, na sua impossibilidade, o emprego de tensão de segurança.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'3',
            'numero_paragrafo'  =>'10.2.8.2.1',
            'descricao'         =>'Na impossibilidade de implementação do estabelecido no subitem 10.2.8.2., devem ser utilizadas outras medidas de proteção coletiva, tais como: isolação das partes vivas, obstáculos, barreiras, sinalização, sistema de seccionamento automático de alimentação, bloqueio do religamento automático.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'3',
            'numero_paragrafo'  =>'10.2.8.3',
            'descricao'         =>'O aterramento das instalações elétricas deve ser executado conforme regulamentação estabelecida pelos órgãos competentes e, na ausência desta, deve atender às Normas Internacionais vigentes.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'4',
            'numero_paragrafo'  =>'10.2.9.1',
            'descricao'         =>'Nos trabalhos em instalações elétricas, quando as medidas de proteção coletiva forem tecnicamente inviáveis ou insuficientes para controlar os riscos, devem ser adotados equipamentos de proteção individual específicos e adequados às atividades desenvolvidas, em atendimento ao disposto na NR 6.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'4',
            'numero_paragrafo'  =>'10.2.9.2',
            'descricao'         =>'As vestimentas de trabalho devem ser adequadas às atividades, devendo contemplar a condutibilidade, inflamabilidade e influências eletromagnéticas.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'4',
            'numero_paragrafo'  =>'10.2.9.3',
            'descricao'         =>'É vedado o uso de adornos pessoais nos trabalhos com instalações elétricas ou em suas proximidades.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.1',
            'descricao'         =>'É obrigatório que os projetos de instalações elétricas especifiquem dispositivos de desligamento de circuitos que possuam recursos.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.2',
            'descricao'         =>'O projeto elétrico, na medida do possível, deve prever a instalação de dispositivo de seccionamento de ação simultânea, que permita a aplicação de impedimento de reenergização do circuito.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.3',
            'descricao'         =>'O projeto de instalações elétricas deve considerar o espaço seguro, quanto ao dimensionamento e a localização de seus componentes e as influências externas, quando da operação e da realização de serviços de construção e manutenção.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.4',
            'descricao'         =>'O projeto deve definir a configuração do esquema de aterramento, a obrigatoriedade ou não da interligação entre o condutor neutro e o de proteção e a conexão à terra das partes condutoras não destinadas à condução da eletricidade.',
            'usuario_alteracao' =>'']);       
 
        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.5',
            'descricao'         =>'Sempre que for tecnicamente viável e necessário, devem ser projetados dispositivos de seccionamento que incorporem recursos fixos de equipotencialização e aterramento do circuito seccionado.',
            'usuario_alteracao' =>'']);       

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.6',
            'descricao'         =>'Todo projeto deve prever condições para a adoção de aterramento temporário.',
            'usuario_alteracao' =>'']);       
        
        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.7',
            'descricao'         =>'O projeto das instalações elétricas deve ficar à disposição dos trabalhadores autorizados, das autoridades competentes e de outras pessoas autorizadas pela empresa e deve ser mantido atualizado.',
            'usuario_alteracao' =>'']);
        
        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.8',
            'descricao'         =>'O projeto elétrico deve atender ao que dispõem as Normas Regulamentadoras de Saúde e Segurança no Trabalho, as regulamentações técnicas oficiais estabelecidas, e ser assinado por profissional legalmente habilitado.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.9',
            'descricao'         =>'O memorial descritivo do projeto deve conter, no mínimo, os seguintes itens de segurança:
            a) especificação das características relativas à proteção contra choques elétricos, queimaduras e outros riscos adicionais;
            b) indicação de posição dos dispositivos de manobra dos circuitos elétricos: (Verde - “D”, desligado e Vermelho - (L), ligado);
            c) descrição do sistema de identificação de circuitos elétricos e equipamentos, incluindo dispositivos de manobra, de controle, de proteção, de intertravamento, dos condutores e os próprios equipamentos e estruturas, definindo como tais indicações devem ser aplicadas fisicamente nos componentes das instalações;
            d) recomendações de restrições e advertências quanto ao acesso de pessoas aos componentes das instalações;
            e) precauções aplicáveis em face das influências externas;
            f) o princípio funcional dos dispositivos de proteção, constantes do projeto, destinados à segurança das pessoas;
            g) descrição da compatibilidade dos dispositivos de proteção com a instalação elétrica.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'5',
            'numero_paragrafo'  =>'10.3.10',
            'descricao'         =>'Os projetos devem assegurar que as instalações proporcionem aos trabalhadores iluminação adequada e uma posição de trabalho segura, de acordo com a NR 17 - Ergonomia.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.1',
            'descricao'         =>'As instalações elétricas devem ser construídas, montadas, operadas, reformadas, ampliadas, reparadas e inspecionadas de forma a garantir a segurança e a saúde dos trabalhadores e dos usuários, e serem supervisionadas por profissional autorizado, conforme dispõe esta NR.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.2',
            'descricao'         =>'Nos trabalhos e nas atividades referidas devem ser adotadas medidas preventivas destinadas ao controle dos riscos adicionais, especialmente quanto a altura, confinamento, campos elétricos e magnéticos, explosividade, umidade, poeira, fauna e flora e outros agravantes, adotando-se a sinalização de segurança.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.3',
            'descricao'         =>'Nos locais de trabalho só podem ser utilizados equipamentos, dispositivos e ferramentas elétricas compatíveis com a instalação elétrica existente, preservando-se as características de proteção, respeitadas as recomendações do fabricante e as influências externas.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.3.1',
            'descricao'         =>'Os equipamentos, dispositivos e ferramentas que possuam isolamento elétrico devem estar adequados às tensões envolvidas, e serem inspecionados e testados de acordo com as regulamentações existentes ou recomendações dos fabricantes.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.4',
            'descricao'         =>'As instalações elétricas devem ser mantidas em condições seguras de funcionamento e seus sistemas de proteção devem ser inspecionados e controlados periodicamente, de acordo com as regulamentações existentes e definições de projetos.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.4.1',
            'descricao'         =>'Os locais de serviços elétricos, compartimentos e invólucros de equipamentos e instalações elétricas são exclusivos para essa finalidade, sendo expressamente proibido utilizá-los para armazenamento ou guarda de quaisquer objetos.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.5',
            'descricao'         =>'Para atividades em instalações elétricas deve ser garantida ao trabalhador iluminação adequada e uma posição de trabalho segura, de acordo com a NR 17 - Ergonomia, de forma a permitir que ele disponha dos membros superiores livres para a realização das tarefas.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'6',
            'numero_paragrafo'  =>'10.4.6',
            'descricao'         =>'Os ensaios e testes elétricos laboratoriais e de campo ou comissionamento de instalações elétricas devem atender à regulamentação estabelecida nos itens 10.6 e 10.7, e somente podem ser realizados por trabalhadores que atendam às condições de qualificação, habilitação, capacitação e autorização estabelecidas nesta NR.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'7',
            'numero_paragrafo'  =>'10.5.1',
            'descricao'         =>'Somente serão consideradas desenergizadas as instalações elétricas liberadas para trabalho, mediante os procedimentos apropriados, obedecida a seqüência abaixo:
            a) seccionamento;
            b) impedimento de reenergização;
            c) constatação da ausência de tensão;
            d) instalação de aterramento temporário com equipotencialização dos condutores dos circuitos;
            e) proteção dos elementos energizados existentes na zona controlada (Anexo II); (Alterada pela Portaria MTPS n.º 508, de 29 de abril de 2016)
            f) instalação da sinalização de impedimento de reenergização.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'7',
            'numero_paragrafo'  =>'10.5.2',
            'descricao'         =>'O estado de instalação desenergizada deve ser mantido até a autorização para reenergização, devendo ser reenergizada respeitando a seqüência de procedimentos abaixo:
            a) retirada das ferramentas, utensílios e equipamentos;
            b) retirada da zona controlada de todos os trabalhadores não envolvidos no processo de reenergização;
            c) remoção do aterramento temporário, da equipotencialização e das proteções adicionais;
            d) remoção da sinalização de impedimento de reenergização;
            e) destravamento, se houver, e religação dos dispositivos de seccionamento.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'7',
            'numero_paragrafo'  =>'10.5.3',
            'descricao'         =>'As medidas constantes das alíneas apresentadas nos itens 10.5.1 e 10.5.2 podem ser alteradas, substituídas, ampliadas ou eliminadas, em função das peculiaridades de cada situação, por profissional legalmente habilitado, autorizado e mediante justificativa técnica previamente formalizada, desde que seja mantido o mesmo nível de segurança originalmente preconizado.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'7',
            'numero_paragrafo'  =>'10.5.4',
            'descricao'         =>'Os serviços a serem executados em instalações elétricas desligadas, mas com possibilidade de energização, por qualquer meio ou razão, devem atender ao que estabelece o disposto no item 10.6.',
            'usuario_alteracao' =>'']);        

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.1',
            'descricao'         =>'As intervenções em instalações elétricas com tensão igual ou superior a 50 Volts em corrente alternada ou superior a 120 Volts em corrente contínua somente podem ser realizadas por trabalhadores que atendam ao que estabelece o item 10.8 desta Norma.',
            'usuario_alteracao' =>'']);
            
        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.1.1',
            'descricao'         =>'Os trabalhadores de que trata o item anterior devem receber treinamento de segurança para trabalhos com instalações elétricas energizadas, com currículo mínimo, carga horária e demais determinações estabelecidas no Anexo III desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.1.2',
            'descricao'         =>'As operações elementares como ligar e desligar circuitos elétricos, realizadas em baixa tensão, com materiais e equipamentos elétricos em perfeito estado de conservação, adequados para operação, podem ser realizadas por qualquer pessoa não advertida.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.2',
            'descricao'         =>'Os trabalhos que exigem o ingresso na zona controlada devem ser realizados mediante procedimentos específicos respeitando as distâncias previstas no Anexo II. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.3',
            'descricao'         =>'Os serviços em instalações energizadas, ou em suas proximidades devem ser suspensos de imediato na iminência de ocorrência que possa colocar os trabalhadores em perigo.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.4',
            'descricao'         =>'Sempre que inovações tecnológicas forem implementadas ou para a entrada em operações de novas instalações ou equipamentos elétricos devem ser previamente elaboradas análises de risco, desenvolvidas com circuitos desenergizados, e respectivos procedimentos de trabalho.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'8',
            'numero_paragrafo'  =>'10.6.5',
            'descricao'         =>'O responsável pela execução do serviço deve suspender as atividades quando verificar situação ou condição de risco não prevista, cuja eliminação ou neutralização imediata não seja possível.',
            'usuario_alteracao' =>'']);
            
        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.1',
            'descricao'         =>'Os trabalhadores que intervenham em instalações elétricas energizadas com alta tensão, que exerçam suas ao disposto no item 10.8 desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.2',
            'descricao'         =>'Os trabalhadores de que trata o item 10.7.1 devem receber treinamento de segurança, específico em segurança no Sistema Elétrico de Potência (SEP) e em suas proximidades, com currículo mínimo, carga horária e demais determinações estabelecidas no Anexo III desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.3',
            'descricao'         =>'Os serviços em instalações elétricas energizadas em AT, bem como aqueles executados no Sistema Elétrico de Potência - SEP, não podem ser realizados individualmente.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.4',
            'descricao'         =>'Todo trabalho em instalações elétricas energizadas em AT, bem como aquelas que interajam com o SEP, somente pode ser realizado mediante ordem de serviço específica para data e local, assinada por superior responsável pela área.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.5',
            'descricao'         =>'Antes de iniciar trabalhos em circuitos energizados em AT, o superior imediato e a equipe, responsáveis pela execução do serviço, devem realizar uma avaliação prévia, estudar e planejar as atividades e ações a serem desenvolvidas de forma a atender os princípios técnicos básicos e as melhores técnicas de segurança em eletricidade aplicáveis ao serviço.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.6',
            'descricao'         =>'Os serviços em instalações elétricas energizadas em AT somente podem ser realizados quando houver procedimentos específicos, detalhados e assinados por profissional autorizado.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.7',
            'descricao'         =>'A intervenção em instalações elétricas energizadas em AT dentro dos limites estabelecidos como zona de risco, conforme Anexo II desta NR, somente pode ser realizada mediante a desativação, também conhecida como bloqueio, dos conjuntos e dispositivos de religamento automático do circuito, sistema ou equipamento. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.7.1',
            'descricao'         =>'Os equipamentos e dispositivos desativados devem ser sinalizados com identificação da condição de desativação, conforme procedimento de trabalho específico padronizado.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.8',
            'descricao'         =>'Os equipamentos, ferramentas e dispositivos isolantes ou equipados com materiais isolantes, destinados ao trabalho em alta tensão, devem ser submetidos a testes elétricos ou ensaios de laboratório periódicos, obedecendose as especificações do fabricante, os procedimentos da empresa e na ausência desses, anualmente.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'9',
            'numero_paragrafo'  =>'10.7.9',
            'descricao'         =>'Todo trabalhador em instalações elétricas energizadas em AT, bem como aqueles envolvidos em atividades no SEP devem dispor de equipamento que permita a comunicação permanente com os demais membros da equipe ou com o centro de operação durante a realização do serviço.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.1',
            'descricao'         =>'É considerado trabalhador qualificado aquele que comprovar conclusão de curso específico na área elétrica reconhecido pelo Sistema Oficial de Ensino.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.2',
            'descricao'         =>'É considerado profissional legalmente habilitado o trabalhador previamente qualificado e com registro no competente conselho de classe.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.3',
            'descricao'         =>'É considerado trabalhador capacitado aquele que atenda às seguintes condições, simultaneamente:
            a) receba capacitação sob orientação e responsabilidade de profissional habilitado e autorizado; e
            b) trabalhe sob a responsabilidade de profissional habilitado e autorizado.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.3.1',
            'descricao'         =>'A capacitação só terá validade para a empresa que o capacitou e nas condições estabelecidas pelo profissional habilitado e autorizado responsável pela capacitação.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.4',
            'descricao'         =>'São considerados autorizados os trabalhadores qualificados ou capacitados e os profissionais habilitados, com anuência formal da empresa.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.5',
            'descricao'         =>'A empresa deve estabelecer sistema de identificação que permita a qualquer tempo conhecer a abrangência da autorização de cada trabalhador, conforme o item 10.8.4.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.6',
            'descricao'         =>'Os trabalhadores autorizados a trabalhar em instalações elétricas devem ter essa condição consignada no sistema de registro de empregado da empresa.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.7',
            'descricao'         =>'Os trabalhadores autorizados a intervir em instalações elétricas devem ser submetidos a exame de saúde compatível com as atividades a serem desenvolvidas, realizado em conformidade com a NR 7 e registrado em seu prontuário médico.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.8',
            'descricao'         =>'Os trabalhadores autorizados a intervir em instalações elétricas devem possuir treinamento específico sobre os riscos decorrentes do emprego da energia elétrica e as principais medidas de prevenção de acidentes em instalações elétricas, de acordo com o estabelecido no Anexo III desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.8.1',
            'descricao'         =>'A empresa concederá autorização na forma desta NR aos trabalhadores capacitados ou qualificados e aos profissionais habilitados que tenham participado com avaliação e aproveitamento satisfatórios dos cursos constantes do Anexo III desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.8.2',
            'descricao'         =>'Deve ser realizado um treinamento de reciclagem bienal e sempre que ocorrer alguma das situações a seguir:
            a) troca de função ou mudança de empresa;
            b) retorno de afastamento ao trabalho ou inatividade, por período superior a três meses;
            c) modificações significativas nas instalações elétricas ou troca de métodos, processos e organização do trabalho.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.8.3',
            'descricao'         =>'A carga horária e o conteúdo programático dos treinamentos de reciclagem destinados ao atendimento das alíneas (a), (b) e (c) do item 10.8.8.2 devem atender as necessidades da situação que o motivou.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.8.4',
            'descricao'         =>'Os trabalhos em áreas classificadas devem ser precedidos de treinamento especifico de acordo com risco envolvido.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'10',
            'numero_paragrafo'  =>'10.8.9',
            'descricao'         =>'Os trabalhadores com atividades não relacionadas às instalações elétricas desenvolvidas em zona livre e na vizinhança da zona controlada, conforme define esta NR, devem ser instruídos formalmente com conhecimentos que permitam identificar e avaliar seus possíveis riscos e adotar as precauções cabíveis.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'11',
            'numero_paragrafo'  =>'10.9.1',
            'descricao'         =>'As áreas onde houver instalações ou equipamentos elétricos devem ser dotadas de proteção contra incêndio e explosão, conforme dispõe a NR 23 - Proteção Contra Incêndios.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'11',
            'numero_paragrafo'  =>'10.9.2',
            'descricao'         =>'Os materiais, peças, dispositivos, equipamentos e sistemas destinados à aplicação em instalações elétricas de ambientes com atmosferas potencialmente explosivas devem ser avaliados quanto à sua conformidade, no âmbito do Sistema Brasileiro de Certificação.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'11',
            'numero_paragrafo'  =>'10.9.3',
            'descricao'         =>'Os processos ou equipamentos susceptíveis de gerar ou acumular eletricidade estática devem dispor de proteção específica e dispositivos de descarga elétrica.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'11',
            'numero_paragrafo'  =>'10.9.4',
            'descricao'         =>'Nas instalações elétricas de áreas classificadas ou sujeitas a risco acentuado de incêndio ou explosões, devem ser adotados dispositivos de proteção, como alarme e seccionamento automático para prevenir sobretensões, sobrecorrentes, falhas de isolamento, aquecimentos ou outras condições anormais de operação.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'11',
            'numero_paragrafo'  =>'10.9.5',
            'descricao'         =>'Os serviços em instalações elétricas nas áreas classificadas somente poderão ser realizados mediante permissão para o trabalho com liberação formalizada, conforme estabelece o item 10.5 ou supressão do agente de risco que determina a classificação da área.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'12',
            'numero_paragrafo'  =>'10.10.1',
            'descricao'         =>'Nas instalações e serviços em eletricidade deve ser adotada sinalização adequada de segurança, destinada à advertência e à identificação, obedecendo ao disposto na NR-26 - Sinalização de Segurança, de forma a atender, dentre outras, as situações a seguir:
            a) identificação de circuitos elétricos;
            b) travamentos e bloqueios de dispositivos e sistemas de manobra e comandos;
            c) restrições e impedimentos de acesso;
            d) delimitações de áreas;
            e) sinalização de áreas de circulação, de vias públicas, de veículos e de movimentação de cargas;
            f) sinalização de impedimento de energização;
            g) identificação de equipamento ou circuito impedido.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.1',
            'descricao'         =>'Os serviços em instalações elétricas devem ser planejados e realizados em conformidade com procedimentos de trabalho específicos, padronizados, com descrição detalhada de cada tarefa, passo a passo, assinados por profissional que atenda ao que estabelece o item 10.8 desta NR.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.2',
            'descricao'         =>'Os serviços em instalações elétricas devem ser precedidos de ordens de serviço especificas, aprovadas por trabalhador autorizado, contendo, no mínimo, o tipo, a data, o local e as referências aos procedimentos de trabalho a serem adotados.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.3',
            'descricao'         =>'Os procedimentos de trabalho devem conter, no mínimo, objetivo, campo de aplicação, base técnica, competências e responsabilidades, disposições gerais, medidas de controle e orientações finais.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.4',
            'descricao'         =>'Os procedimentos de trabalho, o treinamento de segurança e saúde e a autorização de que trata o item 10.8 devem ter a participação em todo processo de desenvolvimento do Serviço Especializado de Engenharia de Segurança e Medicina do Trabalho - SESMT, quando houver.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.5',
            'descricao'         =>'A autorização referida no item 10.8 deve estar em conformidade com o treinamento ministrado, previsto no Anexo III desta NR. (Alterado pela Portaria MTPS n.º 508, de 29 de abril de 2016).',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.6',
            'descricao'         =>'Toda equipe deverá ter um de seus trabalhadores indicado e em condições de exercer a supervisão e condução dos trabalhos.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.7',
            'descricao'         =>'Antes de iniciar trabalhos em equipe os seus membros, em conjunto com o responsável pela execução do serviço, devem realizar uma avaliação prévia, estudar e planejar as atividades e ações a serem desenvolvidas no local, de forma a atender os princípios técnicos básicos e as melhores técnicas de segurança aplicáveis ao serviço.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'13',
            'numero_paragrafo'  =>'10.11.8',
            'descricao'         =>'A alternância de atividades deve considerar a análise de riscos das tarefas e a competência dos trabalhadores envolvidos, de forma a garantir a segurança e a saúde no trabalho.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'14',
            'numero_paragrafo'  =>'10.12.1',
            'descricao'         =>'As ações de emergência que envolvam as instalações ou serviços com eletricidade devem constar do plano de emergência da empresa.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'14',
            'numero_paragrafo'  =>'10.12.2',
            'descricao'         =>'Os trabalhadores autorizados devem estar aptos a executar o resgate e prestar primeiros socorros a acidentados, especialmente por meio de reanimação cardio-respiratória.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'14',
            'numero_paragrafo'  =>'10.12.3',
            'descricao'         =>'A empresa deve possuir métodos de resgate padronizados e adequados às suas atividades, disponibilizando os meios para a sua aplicação.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'14',
            'numero_paragrafo'  =>'10.12.4',
            'descricao'         =>'Os trabalhadores autorizados devem estar aptos a manusear e operar equipamentos de prevenção e combate a incêndio existentes nas instalações elétricas.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'15',
            'numero_paragrafo'  =>'10.13.1',
            'descricao'         =>'As responsabilidades quanto ao cumprimento desta NR são solidárias aos contratantes e contratados envolvidos.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'15',
            'numero_paragrafo'  =>'10.13.2',
            'descricao'         =>'É de responsabilidade dos contratantes manter os trabalhadores informados sobre os riscos a que estão expostos, instruindo-os quanto aos procedimentos e medidas de controle contra os riscos elétricos a serem adotados.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'15',
            'numero_paragrafo'  =>'10.13.3',
            'descricao'         =>'Cabe à empresa, na ocorrência de acidentes de trabalho envolvendo instalações e serviços em eletricidade, propor e adotar medidas preventivas e corretivas.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'15',
            'numero_paragrafo'  =>'10.13.4',
            'descricao'         =>'Cabe aos trabalhadores:
            a) zelar pela sua segurança e saúde e a de outras pessoas que possam ser afetadas por suas ações ou omissões no trabalho;
            b) responsabilizar-se junto com a empresa pelo cumprimento das disposições legais e regulamentares, inclusive quanto aos procedimentos internos de segurança e saúde; e
            c) comunicar, de imediato, ao responsável pela execução do serviço as situações que considerar de risco para sua segurança e saúde e a de outras pessoas.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.1',
            'descricao'         =>'Os trabalhadores devem interromper suas tarefas exercendo o direito de recusa, sempre que constatarem evidências de riscos graves e iminentes para sua segurança e saúde ou a de outras pessoas, comunicando imediatamente o fato a seu superior hierárquico, que diligenciará as medidas cabíveis.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.2',
            'descricao'         =>'As empresas devem promover ações de controle de riscos originados por outrem em suas instalações elétricas e oferecer, de imediato, quando cabível, denúncia aos órgãos competentes.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.3',
            'descricao'         =>'Na ocorrência do não cumprimento das normas constantes nesta NR, o MTE adotará as providências estabelecidas na NR-03.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.4',
            'descricao'         =>'A documentação prevista nesta NR deve estar permanentemente à disposição dos trabalhadores que atuam em serviços e instalações elétricas, respeitadas as abrangências, limitações e interferências nas tarefas.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.5',
            'descricao'         =>'A documentação prevista nesta NR deve estar, permanentemente, à disposição das autoridades competentes.',
            'usuario_alteracao' =>'']);

        SubParagrafo::create([
            'paragrafo_id'      =>'16',
            'numero_paragrafo'  =>'10.14.6',
            'descricao'         =>'Esta NR não é aplicável a instalações elétricas alimentadas por extra-baixa tensão.',
            'usuario_alteracao' =>'']);

    }
}
