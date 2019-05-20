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
@if(!empty($dados) && count($dados) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
    @foreach($dados as $user)
        <tbody>
                <tr>
                    <td>{{$user->nome}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('usuario.edit',$user->id_usuario)}}" title="Editar" class="fas fa-edit">Editar</a>
                            <form action="{{ action('UserController@destroy', $user->id_usuario) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fas fa-trash-alt">deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>{{$user->senha}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('usuario.edit',$user->id_usuario)}}" title="Editar" class="fas fa-edit">Editar</a>
                            <form action="{{ action('UserController@destroy', $user->id_usuario) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fas fa-trash-alt">deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
    @endforeach
        </tbody>
    </table>
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há usuarios Cadastrado</span>
    </div>    
@endif
    <a id="list" href="{{URL::route('usuario.create')}}" title="Cadastrar" class="far fa-file">Cadastrar</a>
</body>
</html>