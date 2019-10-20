@extends("theme.$theme.layout") 
@section('titulo') 
    Editar delegação de ordem de serviço 
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
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="{{ action('OrdemServicosController@update', $dados->id_ordemservico) }}" method="POST">
                @method('PUT') @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="Numero da ordem de servico">Número da ordem de serviço</label>
                        <input type="text" onkeypress="return onlynumber();" class="form-control" id="numero_ordem_servico" placeholder="Número da ordem de serviço" name="numero_ordem_servico" value="{{$dados->numero_ordem_servico}}" maxlength="30" size="50" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <select class="form-control" id="usuario_id" name="usuario_id" aria-required="true">
                            @foreach($dados->usuario as $user)
                                <option value="{{$user->id_usuario}}" selected>{{$user->nome}}</option>
                                @foreach($usuario as $value) 
                                    @if($dados->usuario_id != $value->id_usuario)
                                        <option value="{{$value->id_usuario}}">{{$value->nome}}</option>
                                    @endif 
                                @endforeach 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checklist">Checklist:</label>
                        <select class="form-control" id="checklist_id" name="checklist_id" aria-required="true">
                            @foreach($dados->checklist as $valor)
                                <option value="{{$valor->id_checklist}}" selected>{{$valor->titulo}}</option>
                                @foreach($checklist as $value) 
                                    @if($dados->checklist_id != $value->id_checklist)
                                        <option value="{{$value->id_checklist}}">{{$value->titulo}}</option>
                                    @endif 
                                @endforeach 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{URL::route('ordemservico.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                    <button type="submit" class="btn btn-primary custom">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ url('js/onlynumber.js') }}"></script>
@endpush
@endsection