@extends("theme.$theme.layout")
@section('titulo')
	Respostas dos Serviços
@endsection
@section('conteudo')
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Reposta do serviço</h3>
        <hr>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <p><strong>Profissional:</strong> {{$dados[0]->usuario_alteracao}}</p>
                <p><strong>Nº ordem serviço:</strong> {{$ordemservico[0]->numero_ordem_servico}}</p>
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <address>
                <p><strong>Data: {{ \Carbon\Carbon::parse($ordemservico[0]->created_at)->format('d / m / Y') }}</strong></p>
                    @if($ordemservico[0]->status == "C")
                        <p><strong>Status:</strong> Cancelado</p>
                    @else
                        <p><strong>Status:</strong> Finalizado</p>
                        @endif
                    <p><strong>Localização:</strong> {{$dados[0]->localizacao }}</p>
              </address>
            </div>
          </div>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Pergunta</th>
                    <th>Resposta ( Sim / Não )</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                        {{$valor->pergunta}}
                        @if($valor->imagem)
                            <a class="image-link" href="{{ url("storage/fotos/{$valor->imagem}") }}"><i class="fa fa-camera"></i></a>
                        @endif
                    </td>
                    @if($valor->valor == "S")
                        <td>SIM</td>
                    @else
                        <td>NÃO</td>
                    @endif
                </tr>
        @endforeach
            </tbody>
        </table>
        @if(trim($valor->observacao))
        <div class="callout callout-warning">
            <h4><i class="icon fa fa-warning"></i> Observação!</h4>
            <p>{{$valor->observacao}}</p>
        </div>
        @endif
    </div>
    <div class="box-footer">
        <a href="{{URL::route('resposta.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
     </div>
@else
    <div class="sem-lista">
        <span class="sem-lista">Não há Respostas de Serviços</span>
    </div>    
@endif
<link href="{{URL::asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
@push('scripts')
<script src="{{ url('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/magnific-pop-up.js') }}"></script>
@endpush
@endsection