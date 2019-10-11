@extends("theme.$theme.layout")
@section('titulo')
	Lista de Normas
@endsection
@section('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('norma.create')}}" title="Cadastrar" class="btn btn-primary custom"><i class="fa fa-file-text-o"></i> Nova Norma</a>
    </div>
    <div class="col-xs-0">
        <a id="list" href="#" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>
    </div> 
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Normas</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover dataTable">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th class="col-xs-2">N° Norma</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->numero_norma}}</td>
                    <td>{{$valor->descricao}}</td>
                    <td class="acoes-lista">
                        <a id="edit" href="{{URL::route('norma.edit',$valor->id_norma)}}" title="Editar" class="fa fa-edit"></a>
                        <form action="{{ action('NormasController@destroy', $valor->id_norma) }}" method="POST">
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
        <span class="sem-dados">Não há Normas Cadastradas</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection