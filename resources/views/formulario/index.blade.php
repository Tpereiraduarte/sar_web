@extends("theme.$theme.layout")
@section('titulo')
	Lista de Formularios
@endsection
@section('conteudo')
<div class="row">
    <div class="col">
        @can('Administrador',$admin)
        <a id="list" href="{{URL::route('formulario.create')}}" title="Cadastrar" class="btn btn-primary custom"><i class="fa fa-check-square-o"></i> Novo Checklist</a>  
        <a id="list" href="#" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>               
        @endcan

        @can('formulario-create',$permissoes)
        <a id="list" href="{{URL::route('formulario.create')}}" title="Cadastrar" class="btn btn-primary custom"><i class="fa fa-check-square-o"></i> Novo Checklist</a>               
        @endcan

        @can('relatorio-formulario',$permissoes)
        <a id="list" href="#" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>              
        @endcan
    </div> 
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Checklists</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Título</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                        @can('Administrador',$admin)
                            <a href="{{URL::route('formulario.show',$valor->id_checklist)}}">{{$valor->titulo}}</a> 
                        @endcan
                        @can('formulario-show',$permissoes)
                             <a href="{{URL::route('formulario.show',$valor->id_checklist)}}">{{$valor->titulo}}</a>              
                        @endcan
                    </td>
                    <td class="acoes-lista">
                        @can('Administrador',$admin)
                            <a id="edit" href="{{URL::route('formulario.edit',$valor->id_checklist)}}" title="Editar" class="fa fa-edit"></a>
                            <form action="{{ action('FormulariosController@destroy', $valor->id_checklist) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                     {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                            </form>
                            @endcan
                        @can('formulario-edit',$permissoes)
                            <a id="edit" href="{{URL::route('formulario.edit',$valor->id_checklist)}}" title="Editar" class="fa fa-edit"></a>
                        @endcan
                         @can('formulario-delete',$permissoes)
                             <form action="{{ action('FormulariosController@destroy', $valor->id_checklist) }}" method="POST">
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
        <span class="sem-dados">Não há Checklists Cadastrados</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection