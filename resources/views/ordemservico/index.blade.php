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
    <div class="col">
        @can('Administrador',$admin)
        <a id="list" href="{{URL::route('ordemservico.create')}}" title="Cadastrar" class="btn btn-primary custom">Delegar Ordem de serviço</a>   
        <a id="list" href="{{URL::route('relatorios.relatorioordemservico')}}" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>               
        @endcan

        @can('ordemservico-create',$permissoes)
        <a id="list" href="{{URL::route('ordemservico.create')}}" title="Cadastrar" class="btn btn-primary custom">Delegar Ordem de serviço</a>                
        @endcan

        @can('relatorio-ordemservico',$permissoes)
        <a id="list" href="{{URL::route('relatorios.relatorioordemservico')}}" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>               
        @endcan
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
                  <th>Status</th>
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
                    @if($valor->status == "F")
                        <td>Finalizado</td>
                    @elseif($valor->status == "P")
                        <td>Pendente</td>
                    @else
                        <td>Cancelado</td>
                    @endif
                    <td class="acoes-lista">
                        @can('Administrador',$admin)
                            <a id="edit" href="{{URL::route('ordemservico.edit',$valor->id_ordemservico)}}" title="Editar" class="fa fa-edit"></a>
                            <form action="{{ action('OrdemServicosController@destroy', $valor->id_ordemservico) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                            </form>
                        @endcan
                        @can('ordemservico-edit',$permissoes)
                                <a id="edit" href="{{URL::route('ordemservico.edit',$valor->id_ordemservico)}}" title="Editar" class="fa fa-edit"></a>
                        @endcan
                        @can('ordemservico-delete',$permissoes)
                               <form action="{{ action('OrdemServicosController@destroy', $valor->id_ordemservico) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                            </form>
                        @endcan
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