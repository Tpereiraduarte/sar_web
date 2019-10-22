@extends("theme.$theme.layout") 
@section('titulo') 
    Histórico dos Serviços 
@endsection 
@section('conteudo') 
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Histórico dos Serviços</h3>
    </div>
    <div class="box-body">
        @foreach($dados as $key => $valor)
        <p><strong>Nº da ordem de serviço:</strong> {{$valor->numero_ordem_servico}}</p>
        <p><strong>Título:</strong> {{$valor->titulo_formulario}}</p>
        <p><strong>Data: </strong>{{ \Carbon\Carbon::parse($valor->created_at)->format('d / m / Y') }}</p>
        @if($valor->status == "F")
            <p><strong>Status: </strong>Finalizado</p>
        @else
            <p><strong>Status: </strong>Cancelado</p>
        @endif
        <hr> 
        @endforeach
    </div>
    @else
    <div class="sem-dados">
        <span class="sem-dados">Não há Histórico de Serviços</span>
    </div>
    @endif
    <div class="box-footer">
        <a href="{{URL::route('inicio')}}" title="Voltar" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection