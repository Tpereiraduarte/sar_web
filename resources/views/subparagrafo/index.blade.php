@extends("theme.$theme.layout")
@section('titulo')
	Lista de SubParágrafos
@endsection
@section('conteudo')
<div class="row">
    <div class="col">
        @can('Administrador',$admin)
        <a id="list" href="{{URL::route('subparagrafo.create')}}" title="Cadastrar" class="btn btn-primary custom"><i class="fa fa-align-left"></i> Novo Sub Parágrafo</a>
        <a id="list" href="{{URL::route('relatorios.relatoriosubparagrafo')}}" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>             
        @endcan

        @can('subparagrafo-create',$permissoes)
        <a id="list" href="{{URL::route('subparagrafo.create')}}" title="Cadastrar" class="btn btn-primary custom"><i class="fa fa-align-left"></i> Novo Sub Parágrafo</a>          
        @endcan

        @can('relatorio-subparagrafo',$permissoes)
        <a id="list" href="{{URL::route('relatorios.relatoriosubparagrafo')}}" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>               
        @endcan
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
                        @can('Administrador',$admin)
                                <a id="edit" href="{{URL::route('subparagrafo.edit',$valor->id_subparagrafo)}}" title="Editar" class="fa fa-edit"></a>
                                <form action="{{ action('SubParagrafosController@destroy', $valor->id_subparagrafo) }}" method="POST">
                                         {{ method_field('DELETE') }}
                                         {{ csrf_field() }}
                                    <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                                </form>
                            @endcan
                            @can('subparagrafo-edit',$permissoes)
                                <a id="edit" href="{{URL::route('subparagrafo.edit',$valor->id_subparagrafo)}}" title="Editar" class="fa fa-edit"></a>
                            @endcan
                            @can('subparagrafo-delete',$permissoes)
                                 <form action="{{ action('SubParagrafosController@destroy', $valor->id_subparagrafo) }}" method="POST">
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
        <span class="sem-dados">Não há subparágrafos Cadastrados</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection