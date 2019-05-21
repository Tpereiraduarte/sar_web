<<<<<<< HEAD
@extends("theme.$theme.layout")
@section('titulo')
	Cadastro de Perguntas
@endsection
@section('conteudo')
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
>>>>>>> fd41c12a66cb12ac5792409554e96372e0ea7a8d
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<<<<<<< HEAD
<div class="row">
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastre as perguntas do checklist</h3>
            </div>
            <form role="form" action="{{ action('PerguntasController@store') }}" method="POST">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Pergunta">Pergunta</label>
                  <input type="text" class="form-control" id="pergunta" placeholder="Escreva a Pergunta" name="pergunta" maxlength="200" size="50" required>
                </div>
                <div class="form-group">
                  <label for="Norma">NR</label>
                  <input type="text" class="form-control" id="norma" placeholder="Norma" maxlength="2" name="norma" size="2" required>
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
=======
<form action="{{ action('PerguntasController@store') }}" method="POST">
      @csrf
    <div class="row">
        <label class="required" for="name">Pergunta:</label><br />
        <input id="pergunta" class="input" name="pergunta" type="text" value="" maxlength="200" size="50" />
        <label class="required" for="name">NR:</label>
        <input id="norma" class="input" name="norma" type="text" value="" maxlength="2" size="2" /> 
        <input type="submit" value="Cadastrar" />
    </div>
</form>
</body>
</html>
>>>>>>> fd41c12a66cb12ac5792409554e96372e0ea7a8d
