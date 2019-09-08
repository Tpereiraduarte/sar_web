@extends("theme.$theme.layout")
@section('titulo')
	Lista de SubParágrafos
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('subparagrafo.create')}}" title="Cadastrar" class="btn btn-primary ">+ Sub Parágrafo</a>
    </div>
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Sub-Parágrafos</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Parágrafo</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->numero_paragrafo}}</td>
                    <td>{{$valor->descricao}}</td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('subparagrafo.edit',$valor->id_subparagrafo)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('SubParagrafosController@destroy', $valor->id_subparagrafo) }}" method="POST">
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
        <span class="sem-dados">Não há subparágrafos Cadastrados</span>
    </div>    
@endif
@endsection