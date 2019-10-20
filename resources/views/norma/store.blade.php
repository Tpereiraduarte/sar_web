@extends("theme.$theme.layout")
@section('titulo')
    Cadastro de Normas
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
              <h3 class="box-title">Cadastro das Normas</h3>
            </div>
            <form role="form" action="{{ action('NormasController@store') }}" method="POST">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Numero da Normas">Número da Norma</label>
                  <input type="text" onkeypress="return onlynumber();" class="form-control" id="numero_norma" placeholder="Digite Número da Norma" name="numero_norma" maxlength="2" size="50" required>
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" placeholder="Descrição" maxlength="400" name="descricao" size="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('norma.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
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