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
@if(!empty($dados) && count($dados) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Norma</th>
                <th>Ações</th>
            </tr>
        </thead>
    @foreach($dados as $valor)
        <tbody>
                <tr>
                    <td>{{$valor->pergunta}}</td>
                    <td>{{$valor->norma}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('pergunta.edit',$valor->id_pergunta)}}" title="Editar" class="fas fa-edit">Editar</a>
                            <form action="{{ action('PerguntasController@destroy', $valor->id_pergunta) }}" method="POST">
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
        <span class="sem-dados">Não há perguntas Cadastradas</span>
    </div>    
@endif
    <a id="list" href="{{URL::route('pergunta.create')}}" title="Cadastrar" class="far fa-file">Cadastrar</a>
</body>
</html>
