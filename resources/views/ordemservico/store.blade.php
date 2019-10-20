@extends("theme.$theme.layout")
@section('titulo')
    Delegar de Ordem de Serviço
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
              <h3 class="box-title">Delegar de Ordem de Serviço</h3>
            </div>
            <form role="form" action="{{ action('OrdemServicosController@store') }}" method="POST">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Numero da Ordem de Serviço">Número da Ordem de Serviço</label>
                  <input type="text" onkeypress="return onlynumber();" class="form-control" id="numero_ordem_servico" placeholder="Digite Número da Ordem de Serviço" name="numero_ordem_servico" maxlength="30" size="50" required>
                </div>
                <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <select class="form-control" id="usuario_id" name="usuario_id" aria-required="true" required>
                            <option selected disabled value="">Escolha um usuário</option>
                            @foreach($usuario as $value)
                            <option value="{{$value->id_usuario}}">{{$value->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">     
                        <label for="uperfil">Checklist:</label>
                        <select class="form-control" id="checklist_id" name="checklist_id" aria-required="true" required>
                            <option selected disabled value="">Escolha um checklist</option>
                            @foreach($checklist as $value)
                            <option value="{{$value->id_checklist}}">{{$value->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
              <div class="box-footer">
                <a href="{{URL::route('ordemservico.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                <button type="submit" class="btn btn-primary custom">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <style>
        .custom {
            font-size: 14px !important;
            
            border:none !important;
            width: 100px !important; 
            height: 35px !important;
            border-radius: 3px !important;
    }
    </style>
</div>
@push('scripts')
<script src="{{ url('js/onlynumber.js') }}"></script>
@endpush
@endsection