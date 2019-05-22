@extends("theme.$theme.layout")
@section('titulo')
    Usuários
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('usuario.create')}}" title="Cadastrar" class="btn btn-primary">Cadastro de usuários</a>
    </div>
</div>

@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Dados Pessoais</h3>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th>Categorias</th>
                    <th>Ações</th>

                </tr>
            </thead>
        @foreach($dados as $key => $user)
            <tbody>
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$user->matricula}}</td>
                    <td>{{$user->nome}}</td>                    
                    <td>{{$user->email}}</td>
                    <td>{{$user->categoria}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('usuario.edit',$user->id_usuario)}}" title="Editar" class="fa fa-edit"></a>
                            <form action="{{ action('UsersController@destroy', $user->id_usuario) }}"   method="POST">
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
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há usuários Cadastradas</span>
    </div>    
@endif
@endsection