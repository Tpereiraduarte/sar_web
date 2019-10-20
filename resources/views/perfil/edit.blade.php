@extends("theme.$theme.layout")
@section('titulo')
    Editar Perfil
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
            <form role="form" action="{{ action('PerfilsController@update', $dados->id_perfil) }}" method="POST">
            @method('PUT')
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Perfil">Nome do perfil:</label>
                  <input type="text" onkeypress="return lettersOnly(event);" class="form-control" id="perfil" placeholder="Ex:Administrador" name="nome" value="{{$dados->nome}}" maxlength="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('perfil.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                <button type="submit" class="btn btn-primary custom">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
<script src="{{ url('js/onlytext.js') }}"></script>
@endsection