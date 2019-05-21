@extends("theme.$theme.layout")
@section('titulo')
    Editar Pergunta
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
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="{{ action('PerguntasController@update', $dados->id_pergunta) }}" method="POST">
            @method('PUT')
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Pergunta">Pergunta</label>
                  <input type="text" class="form-control" id="pergunta" placeholder="Escreva a Pergunta" name="pergunta" value="{{$dados->pergunta}}" maxlength="200" size="50" required>
                </div>
                <div class="form-group">
                  <label for="Norma">NR</label>
                  <input type="text" class="form-control" id="norma" placeholder="Norma" maxlength="2" name="norma" value="{{$dados->norma}}"size="2" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('pergunta.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
