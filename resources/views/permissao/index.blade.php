@extends("theme.$theme.layout")
@section('titulo')
    Lista de Permissão
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('permissao.create')}}" title="Cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Permissão</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover dataTable">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th class="col-xs-2">Nome</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->nome}}</td>
                    <td>{{$valor->descricao}}</td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('permissao.edit',$valor->id_permissao)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('PermissaoController@destroy', $valor->id_permissao) }}" method="POST">
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
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há Permissão Cadastradas</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection