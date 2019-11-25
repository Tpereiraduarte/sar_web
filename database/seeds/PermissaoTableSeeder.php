<?php
use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermissao();
    }
    public function createPermissao(){
       $usuarios1 = Permissao::Create([
        
          'nome' =>'usuario-view',
          'descricao' =>'Acesso a lista de Usuários',
          'usuario_alteracao' => ''
      ]);
      $usuarios2 = Permissao::Create([
        
          'nome' =>'usuario-create',
          'descricao' =>'Adicionar Usuários',
          'usuario_alteracao' => ''
      ]);
      $usuarios2 = Permissao::Create([
        
          'nome' =>'usuario-edit',
          'descricao' =>'Editar Usuários',
          'usuario_alteracao' => ''
      ]);
      $usuarios3 = Permissao::Create([
        
          'nome' =>'usuario-delete',
          'descricao' =>'Deletar Usuários',
          'usuario_alteracao' => ''
      ]);
      $usuarios4 = Permissao::Create([
        
          'nome' =>'usuario-edit-perfil',
          'descricao' =>'Editar o seu perfil Usuários',
          'usuario_alteracao' => ''
      ]);
      //perfil
      $perfil1 = Permissao::Create([
        
          'nome' =>'perfil-view',
          'descricao' =>'Listar Perfil',
          'usuario_alteracao' => ''
      ]);
      $perfil2 = Permissao::Create([
        
          'nome' =>'perfil-create',
          'descricao' =>'Adicionar Perfil',
          'usuario_alteracao' => ''
      ]);
      $perfil3 = Permissao::Create([
        
          'nome' =>'perfil-edit',
          'descricao' =>'Editar Perfil',
          'usuario_alteracao' => ''
      ]);
      $perfil4 = Permissao::Create([
        
          'nome' =>'perfil-delete',
          'descricao' =>'Deletar Perfil',
          'usuario_alteracao' => ''
      ]);
      //usuarioperfil
      $usuariopperfil1 = Permissao::Create([
        
          'nome' =>'usuarioperfil-view',
          'descricao' =>'Listar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil2 = Permissao::Create([
        
          'nome' =>'usuarioperfil-create',
          'descricao' =>'criar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil3 = Permissao::Create([
        
          'nome' =>'usuarioperfil-edit',
          'descricao' =>'editar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil4 = Permissao::Create([
        
          'nome' =>'usuarioperfil-delete',
          'descricao' =>'deletar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      //Pergunta
       $pergunta1 = Permissao::Create([
        
          'nome' =>'pergunta-view',
          'descricao' =>'Listar pergunta',
          'usuario_alteracao' => ''
      ]);
        $pergunta2 = Permissao::Create([
          
          'nome' =>'pergunta-create',
          'descricao' =>'criar pergunta',
          'usuario_alteracao' => ''
      ]);
         $pergunta3 = Permissao::Create([
          
          'nome' =>'pergunta-edit',
          'descricao' =>'Editar pergunta',
          'usuario_alteracao' => ''
      ]);
          $pergunta4 = Permissao::Create([
            
          'nome' =>'pergunta-delete',
          'descricao' =>'Deletar pergunta',
          'usuario_alteracao' => ''
      ]);
        //permissao
         $permissao1 = Permissao::Create([
          
          'nome' =>'permissao-view',
          'descricao' =>'Listar Permissão',
          'usuario_alteracao' => ''
      ]);
          $permissao2 = Permissao::Create([
            
          'nome' =>'permissao-create',
          'descricao' =>'Criar Permissão',
          'usuario_alteracao' => ''
      ]);
          $permissao3 = Permissao::Create([
            
          'nome' =>'permissao-edit',
          'descricao' =>'Editar Permissão',
          'usuario_alteracao' => ''
      ]);
           $permissao4 = Permissao::Create([
            
          'nome' =>'permissao-delete',
          'descricao' =>'Delete Permissão',
          'usuario_alteracao' => ''
      ]);
          //perfil permissaão
         $perfilpermissao1 = Permissao::Create([
          
          'nome' =>'perfilpermissao-view',
          'descricao' =>'Listar Perfil Permissão',
          'usuario_alteracao' => ''
      ]);
          $perfilpermissao2 = Permissao::Create([
            
          'nome' =>'perfilpermissao-create',
          'descricao' =>'Criar Perfil Permissão',
          'usuario_alteracao' => ''
      ]);
          $perfilpermissao3 = Permissao::Create([
            
          'nome' =>'perfilpermissao-edit',
          'descricao' =>'Editar Perfil Permissão',
          'usuario_alteracao' => ''
      ]);
          $perfilpermissao4 = Permissao::Create([
            
          'nome' =>'perfilpermissao-delete',
          'descricao' =>'Delete Perfil Permissão',
          'usuario_alteracao' => ''
      ]);
         //norma
          $norma1 = Permissao::Create([
            
          'nome' =>'norma-view',
          'descricao' =>'Listar Norma',
          'usuario_alteracao' => ''
      ]);
           $norma2 = Permissao::Create([
            
          'nome' =>'norma-create',
          'descricao' =>'Criar Norma',
          'usuario_alteracao' => ''
      ]);
           $norma3 = Permissao::Create([
            
          'nome' =>'norma-edit',
          'descricao' =>'Editar Norma',
          'usuario_alteracao' => ''
      ]);
          $norma4 = Permissao::Create([
            
          'nome' =>'norma-delete',
          'descricao' =>'Deletar Norma',
          'usuario_alteracao' => ''
      ]);
          //Paragrafo
         $paragrafo1 = Permissao::Create([
          
          'nome' =>'paragrafo-view',
          'descricao' =>'Listar paragrafo',
          'usuario_alteracao' => ''
      ]);
         $paragrafo2 = Permissao::Create([
          
          'nome' =>'paragrafo-create',
          'descricao' =>'Criar paragrafo',
          'usuario_alteracao' => ''
      ]);
         $paragrafo3 = Permissao::Create([
          
          'nome' =>'paragrafo-edit',
          'descricao' =>'Editar paragrafo',
          'usuario_alteracao' => ''
      ]);
         $paragrafo4 = Permissao::Create([
          
          'nome' =>'paragrafo-delete',
          'descricao' =>'Delete paragrafo',
          'usuario_alteracao' => ''
      ]);
             //subParagrafo
         $subparagrafo1 = Permissao::Create([
          
          'nome' =>'subparagrafo-view',
          'descricao' =>'Listar Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
         $subparagrafo2 = Permissao::Create([
          
          'nome' =>'subparagrafo-create',
          'descricao' =>'Criar Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
         $subparagrafo3 = Permissao::Create([
          
          'nome' =>'subparagrafo-edit',
          'descricao' =>'Editar Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
         $subparagrafo4 = Permissao::Create([
          
          'nome' =>'subparagrafo-delete',
          'descricao' =>'Delete Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
      //checklist
          $checklist1 = Permissao::Create([
          
          'nome' =>'checklist-view',
          'descricao' =>'Listar  checklist',
          'usuario_alteracao' => ''
      ]);
         $checklist2 = Permissao::Create([
          
          'nome' =>'checklist-create',
          'descricao' =>'Criar  checklist',
          'usuario_alteracao' => ''
      ]);
         $checklist3 = Permissao::Create([
          
          'nome' =>'checklist-edit',
          'descricao' =>'Editar  checklist',
          'usuario_alteracao' => ''
      ]);
         $checklist4 = Permissao::Create([
          
          'nome' =>'checklist-delete',
          'descricao' =>'Delete  checklist',
          'usuario_alteracao' => ''
      ]);

         //formulario
          $formulario1 = Permissao::Create([
          
          'nome' =>'formulario-view',
          'descricao' =>'Listar  formulario',
          'usuario_alteracao' => ''
      ]);
         $formulario2 = Permissao::Create([
          
          'nome' =>'formulario-create',
          'descricao' =>'Criar  formulario',
          'usuario_alteracao' => ''
      ]);
         $formulario3 = Permissao::Create([
          
          'nome' =>'formulario-edit',
          'descricao' =>'Editar  formulario',
          'usuario_alteracao' => ''
      ]);
         $formulario4 = Permissao::Create([
          
          'nome' =>'formulario-delete',
          'descricao' =>'Delete  formulario',
          'usuario_alteracao' => ''
      ]);
         $formulario5 = Permissao::Create([
          
          'nome' =>'formulario-show',
          'descricao' =>'Editar  formulario',
          'usuario_alteracao' => ''
      ]);

      //ordemservico
          $ordemservico = Permissao::Create([
          
          'nome' =>'ordemservico-view',
          'descricao' =>'Listar  ordemservico',
          'usuario_alteracao' => ''
      ]);
         $ordemservico2 = Permissao::Create([
          
          'nome' =>'ordemservico-create',
          'descricao' =>'Criar  ordemservico',
          'usuario_alteracao' => ''
      ]);
         $ordemservico3 = Permissao::Create([
          
          'nome' =>'ordemservico-edit',
          'descricao' =>'Editar ordemservico',
          'usuario_alteracao' => ''
      ]);
         $ordemservico4 = Permissao::Create([
          
          'nome' =>'ordemservico-delete',
          'descricao' =>'Delete  ordemservico',
          'usuario_alteracao' => ''
      ]);

        //respostaformulario
          $respostaformulario = Permissao::Create([
          
          'nome' =>'respostaformulario-view',
          'descricao' =>'Listar respostaformulario',
          'usuario_alteracao' => ''
      ]);
         $respostaformulario2 = Permissao::Create([
          
          'nome' =>'respostaformulario-create',
          'descricao' =>'Criar  respostaformulario',
          'usuario_alteracao' => ''
      ]);
         $respostaformulario3 = Permissao::Create([
          
          'nome' =>'respostaformulario-edit',
          'descricao' =>'Editar  respostaformulario',
          'usuario_alteracao' => ''
      ]);
         $respostaformulario4 = Permissao::Create([
          
          'nome' =>'respostaformulario-delete',
          'descricao' =>'Delete  respostaformulario',
          'usuario_alteracao' => ''
      ]);
         $respostaformulario5 = Permissao::Create([
          
          'nome' =>'respostaformulario-tiposervico',
          'descricao' =>'Listar tipo serviço',
          'usuario_alteracao' => ''
      ]);
        $respostaformulario6 = Permissao::Create([
          
          'nome' =>'respostaformulario-show',
          'descricao' =>'Listar resposta',
          'usuario_alteracao' => ''
      ]);
        $respostaformulario6 = Permissao::Create([
          
          'nome' =>'respostaformulario-historico',
          'descricao' =>'Histórico das resposta',
          'usuario_alteracao' => ''
      ]);
        $respostaformulario6 = Permissao::Create([
          
          'nome' =>'respostaformulario-normasmobile',
          'descricao' =>'normas mobile',
          'usuario_alteracao' => ''
      ]);
        $relatorio1 = Permissao::Create([
          
          'nome' =>'relatorio-usuario',
          'descricao' =>'Relatorio pdf de usuario',
          'usuario_alteracao' => ''
      ]);
         $relatorio2 = Permissao::Create([
          
          'nome' =>'relatorio-usuarioperfil',
          'descricao' =>'Relatorio pdf de UsuarioPerfil',
          'usuario_alteracao' => ''
      ]);
        $relatorio3 = Permissao::Create([
          
          'nome' =>'relatorio-perfil',
          'descricao' =>'Relatorio pdf de Perfil',
          'usuario_alteracao' => ''
      ]);
         $relatorio4 = Permissao::Create([
          
          'nome' =>'relatorio-permissao',
          'descricao' =>'Relatorio pdf de permissao',
          'usuario_alteracao' => ''
      ]);
         $relatorio5 = Permissao::Create([
          
          'nome' =>'relatorio-perfilpermissao',
          'descricao' =>'Relatorio pdf de perfilpermissao',
          'usuario_alteracao' => ''
      ]);
       
        $relatorio6 = Permissao::Create([
          
          'nome' =>'relatorio-normas',
          'descricao' =>'Relatorio pdf de Normas',
          'usuario_alteracao' => ''
      ]);
        $relatorio7 = Permissao::Create([
          
          'nome' =>'relatorio-paragrafo',
          'descricao' =>'Relatorio pdf de paragrafo',
          'usuario_alteracao' => ''
      ]);
        $relatorio8 = Permissao::Create([
          
          'nome' =>'relatorio-subparagrafo',
          'descricao' =>'Relatorio pdf de subparagrafo',
          'usuario_alteracao' => ''
      ]);
       
        $relatorio9 = Permissao::Create([
          
          'nome' =>'relatorio-perguntas',
          'descricao' =>'Relatorio pdf de perguntas',
          'usuario_alteracao' => ''
      ]);
       
        $relatorio10 = Permissao::Create([
          
          'nome' =>'relatorio-ordemservico',
          'descricao' =>'Relatorio de ordem serviço',
          'usuario_alteracao' => ''
      ]);
         $relatorio11 = Permissao::Create([
          
          'nome' =>'relatorio-formulario',
          'descricao' =>'Relatorio dos formulários criados',
          'usuario_alteracao' => ''
      ]);
    }
}