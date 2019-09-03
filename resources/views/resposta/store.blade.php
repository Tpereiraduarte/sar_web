@extends("theme.$theme.layout") 
@section('titulo') 
    {{$dados->titulo}} 
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
<div id="teste" class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{$dados->titulo}}</h3>
            </div>
            <form id="myform" role="form" action="{{ action('RespostaFormulariosController@store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
                @if(!empty($dados) && !empty($lista))
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Titulo">Ordem de Serviço</label>
                            <input type="text" class="form-control" id="ordem" placeholder="Número da ordem de serviço" name="ordem" maxlength="15" size="50" required>
                        </div>
                        <div class="box-body">
                            <table id="respostas" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="titulo-respostas">Perguntas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lista as $key => $valor)
                                        <tr>
                                            <td>
                                                <label>{{$valor->pergunta->pergunta}}</label>
                                                <input type="hidden" class="form-control" name="pergunta[]" value="{{$valor->pergunta->pergunta}}" required readonly>
                                                <div class="form-group">
                                                    <label>Sim <input class="reposta-sim" type="radio" name="valor[{{$key}}]" value="S" required></label>
                                                    <label>Não <input class="start-video" type="radio" name="valor[{{$key}}]" value="N" required></label>
                                                    <input style="display:none;" class="foto" type="file" name="foto[]" accept="image/*" capture="camera" id="camera">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="sem-dados">
                                <span class="sem-dados">Não há perguntas Cadastradas</span>
                            </div>
                        @endif
                </div>
                <td><input type="hidden" id="geocalizacao" name="geocalizacao" value=""></td>
                <td><input type="hidden" class="form-control" id="titulo" name="titulo" value="{{$dados->titulo}}" required></td>
                <div class="box-footer">
                    <a href="{{URL::route('resposta.tiposervico')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                    <button type="submit" id="frm-checklist" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <p id="mensagem"></p>
</div>
@push('scripts')
<script src="{{ url('js/geocalizacao.js') }}"></script>
<script src="{{ url('js/camera2.js') }}"></script>
@endpush
@endsection