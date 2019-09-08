@extends("theme.$theme.layout")
@section('titulo')
    Perfil de Usuários
@endsection
@section('conteudo')

@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perfil de Usuário</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $usuarioperfil)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$usuarioperfil->usuario->nome}}</td>
                    <td>{{$usuarioperfil->perfil->nome}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('usuarioperfil.edit',$usuarioperfil->id_usuarioperfil)}}" title="Editar" class="fa fa-edit"></a>
                            <form action="{{ action('UsuarioPerfilController@destroy', $usuarioperfil->id_usuarioperfil) }}"   method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"> </button>
                            </form>
                        </div>
                    </td>                          
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('usuarioperfil.create')}}" title="Cadastrar" class="btn btn-primary custom">+ Perfil User</a>
    </div>
</div>     
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há perfis de usuários Cadastradas</span>
    </div>    
@endif
@endsection