<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuários</title>
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
<form action="{{ action('UsersController@store') }}" method="POST">
      @csrf
    <div class="row">
        <label class="required" for="name">Nome do perfil:</label><br />
        <input id="name" class="input" name="nome" type="text" value="" size="100" />
        <label class="required" for="senha">Senha:</label><br />
        <input id="password" class="input" name="password" type="text" value="" size="10" />
        <input type="submit" value="Cadastrar" />
    </div>
</form>
</body>
</html>