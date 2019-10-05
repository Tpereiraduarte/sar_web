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
        
          'nome' =>'usuariopperfil-view',
          'descricao' =>'Listar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil2 = Permissao::Create([
        
          'nome' =>'usuariopperfil-create',
          'descricao' =>'criar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil3 = Permissao::Create([
        
          'nome' =>'usuariopperfil-edit',
          'descricao' =>'editar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      $usuariopperfil4 = Permissao::Create([
        
          'nome' =>'usuariopperfil-delete',
          'descricao' =>'deletar usuario Perfil',
          'usuario_alteracao' => ''
      ]);
      //Pergunta
       $pergunta1 = Permissao::Create([
        
          'nome' =>'pergunta-view',
          'descricao' =>'Listar Paragrafo',
          'usuario_alteracao' => ''
      ]);
        $pergunta2 = Permissao::Create([
          
          'nome' =>'pergunta-create',
          'descricao' =>'criar Paragrafo',
          'usuario_alteracao' => ''
      ]);
         $pergunta3 = Permissao::Create([
          
          'nome' =>'pergunta-edit',
          'descricao' =>'Editar Paragrafo',
          'usuario_alteracao' => ''
      ]);
          $pergunta4 = Permissao::Create([
            
          'nome' =>'pergunta-delete',
          'descricao' =>'Deletar Paragrafo',
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
           $norma1 = Permissao::Create([
            
          'nome' =>'norma-create',
          'descricao' =>'Criar Norma',
          'usuario_alteracao' => ''
      ]);
           $norma1 = Permissao::Create([
            
          'nome' =>'norma-edit',
          'descricao' =>'Editar Norma',
          'usuario_alteracao' => ''
      ]);
          $norma1 = Permissao::Create([
            
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
         $paragrafo1 = Permissao::Create([
          
          'nome' =>'paragrafo-create',
          'descricao' =>'Criar paragrafo',
          'usuario_alteracao' => ''
      ]);
         $paragrafo1 = Permissao::Create([
          
          'nome' =>'paragrafo-edit',
          'descricao' =>'Editar paragrafo',
          'usuario_alteracao' => ''
      ]);
         $paragrafo1 = Permissao::Create([
          
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
         $subparagrafo1 = Permissao::Create([
          
          'nome' =>'subparagrafo-create',
          'descricao' =>'Criar Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
         $subparagrafo1 = Permissao::Create([
          
          'nome' =>'subparagrafo-edit',
          'descricao' =>'Editar Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
         $subparagrafo1 = Permissao::Create([
          
          'nome' =>'subparagrafo-delete',
          'descricao' =>'Delete Sub paragrafo',
          'usuario_alteracao' => ''
      ]);
    }
}