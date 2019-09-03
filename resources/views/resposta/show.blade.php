@extends("theme.$theme.layout")
@section('titulo')
	Respostas dos Serviços
@endsection
@section('conteudo')
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Reposta do serviço</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Pergunta</th>
                    <th>Resposta ( S-Sim / N-Não )</th>
                    <th>Imagem</th>
                    <th>Localização</th>
                    <th>Profissional</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->pergunta}}</td>
                    <td>{{$valor->valor}}</td>
                @if($valor->imagem)
                    <td><img style="width:30px;" src="{{ url("storage/fotos/{$valor->imagem}") }}"></td>
                @else
                    <td></td>
                @endif
                    <td>{{$valor->localizacao}}</td>
                    <td>{{$valor->usuario_alteracao}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        <a href="{{URL::route('resposta.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
     </div>
@else
    <div class="sem-lista">
        <span class="sem-lista">Não há Respostas de Serviços</span>
    </div>    
@endif
@endsection