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
<form action="{{ action('UsersController@update', $dados->id_usuario) }}" method="POST">
@method('PUT')
    @csrf
    <div class="row">
        <label class="required" for="name">Usuário:</label><br />
        <input id="name" class="input" name="nome" type="text" value="{{$dados->nome}}" size="50"/><br /><br />

        <label class="required" for="email">e-mail:</label><br />
        <input id="email" class="input" name="email" type="text" value="{{$dados->email}}" size="50"/><br /><br />

        <label class="required" for="matricula">Matricula:</label><br />
        <input id="matricula" class="input" name="matricula" type="text" value="{{$dados->matricula}}" size="20"/><br /><br />

        <label class="required" for="senha">Senha:</label><br />
        <input id="password" class="input" name="password" type="password" value="{{$dados->password}}"size="10"/><br /><br />

        <label class="required" for="categoria">Categoria:</label><br />
        <input id="categoria" class="input" name="categoria" type="text" value="{{$dados->categoria}}" size="10"/><br /><br />

        <input type="submit" value="Editar" />
    </div>
</form>
</body>
</html>