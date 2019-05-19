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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
