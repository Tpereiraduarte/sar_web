@extends("theme.$theme.layout")
@section('titulo')
	Respostas dos Serviços
@endsection
@section('conteudo')
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Respostas dos Serviços</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Nº Ordem de Serviço</th>
                  <th>Título</th>
                  <th>Status</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$valor->ordem_servico}}</td>
                    <td><a href="{{URL::route('resposta.show',$valor->ordem_servico)}}">{{$valor->titulo_formulario}}</a></td>
                    <td>{{$valor->status}}</td>
                    <td></td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há Respostas de Serviços</span>
    </div>    
@endif
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection