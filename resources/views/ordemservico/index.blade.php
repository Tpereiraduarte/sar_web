@extends("theme.$theme.layout")
@section('titulo')
	Lista de Delegação de Ordem de Serviço
@endsection
@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('ordemservico.create')}}" title="Cadastrar" class="btn btn-primary custom">Delegar</a>
    </div>
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Delegar Ordem de Serviço</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th class="col-xs-2">N° da Ordem de Serviço</th>
                  <th>Usuario</th>
                  <th>Checklist</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->numero_ordem_servico}}</td>
                    @foreach($valor->usuario as $usuario)
                        <td>{{$usuario->nome}}</td>
                    @endforeach
                    @foreach($valor->checklist as $checklist)
                        <td>{{$checklist->titulo}}</td>
                    @endforeach
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('ordemservico.edit',$valor->id_ordemservico)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('OrdemServicosController@destroy', $valor->id_ordemservico) }}" method="POST">
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
        <span class="sem-dados">Não há Ordem de Serviços Cadastradas</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection