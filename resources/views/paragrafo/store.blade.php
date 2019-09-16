@extends("theme.$theme.layout")
@section('titulo')
    Cadastro de Paragrafos
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
              <h3 class="box-title">Cadastro de Parágrafos</h3>
            </div>
            <form role="form" action="{{ action('ParagrafosController@store') }}" method="POST">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Numero da Normas">Número da Norma</label>
                  <select class="form-control" id="numero_norma" name="norma_id" aria-required="true">
                    <option selected disabled value="">Escolha uma norma</option>
                    @foreach($dados as $value)
                      <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                    @endforeach
                  </select>                
                </div>
                <div class="form-group">
                  <label for="Paragrafo">Parágrafo</label>
                  <input type="text" class="form-control" id="paragrafo" placeholder="Parágrafo" maxlength="15" name="numero_paragrafo" size="50" required>
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" placeholder="Descrição" maxlength="400" name="descricao" size="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('paragrafo.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
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
@endsection