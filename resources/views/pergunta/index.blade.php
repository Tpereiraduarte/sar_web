@extends("theme.$theme.layout")
@section('titulo')
	Lista de Perguntas
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('pergunta.create')}}" title="Cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perguntas</h3>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Descrição</th>
                  <th>Norma</th>
                  <th>Ações</th>
                </tr>
            </thead>
        @foreach($dados as $key => $valor)
            <tbody>
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->pergunta}}</td>
                    <td>NR: {{$valor->norma}}</td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('pergunta.edit',$valor->id_pergunta)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('PerguntasController@destroy', $valor->id_pergunta) }}" method="POST">
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
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há perguntas Cadastradas</span>
    </div>    
@endif
@endsection
