@extends("theme.$theme.layout")
@section('titulo')
	Lista de Formularios
@endsection
@section('conteudo')
<div class="row">
</div>@if(!empty($lista) && count($lista) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$dados->titulo}}</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Título</th>
                </tr>
            </thead>
            <tbody>
        @foreach($lista as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->pergunta->pergunta}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        <a href="{{URL::route('formulario.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
     </div>
@else
    <div class="sem-lista">
        <span class="sem-lista">Não há Checklists Cadastrados</span>
    </div>    
@endif
@endsection