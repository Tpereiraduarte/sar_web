@extends("theme.$theme.layout")
@section('titulo')
	Lista de Formularios
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('formulario.create')}}" title="Cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div>@if(!empty($dados) && count($dados) > 0)
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
                    <td><a href="{{URL::route('formulario.show',$valor->id_checklist)}}">{{$valor->titulo}}</a></td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('formulario.edit',$valor->id_checklist)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('FormulariosController@destroy', $valor->id_checklist) }}" method="POST">
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
        <span class="sem-dados">Não há Checklists Cadastrados</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection