@extends("theme.$theme.layout")
@section('titulo')
	Lista de Perfis
@endsection
@section('conteudo')

@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perfis</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->nome}}</td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('perfil.edit',$valor->id_perfil)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('PerfilsController@destroy', $valor->id_perfil) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
    <div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('perfil.create')}}" title="Cadastrar" class="btn btn-primary custom">Novo Perfil</a>
    </div>

@else
    <div class="sem-dados">
        <span class="sem-dados">Não há perfis Cadastrados</span>
    </div>    
@endif
@endsection