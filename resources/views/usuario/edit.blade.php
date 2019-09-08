@extends("theme.$theme.layout")
@section('titulo')
    Editar Usuário
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
            <form role="form" action="{{ action('UsersController@update', $dados->id_usuario) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Usuário:</label>
                        <input id="name" class="form-control" name="nome" type="text" value="{{$dados->nome}}" size="50"/>
                    </div>
                    <div class="form-group">
                        <label for="email">e-mail:</label>
                        <input id="email" class="form-control" name="email" type="text" placeholder="Insira o e-mail" value="{{$dados->email}}" maxlength="200"  required />
                    </div>
                    <div class="form-group">    
                        <label  for="matricula">Matricula:</label>
                        <input id="matricula" class="form-control" name="matricula" type="text" value="{{$dados->matricula}}" size="20"/>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input id="password" class="form-control" name="password" type="password" value="{{$dados->password}}"size="10"/>
                    </div> 
                    <div class="form-group">
                        <div class="box-footer">
                            <a href="{{URL::route('usuario.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>                    
                            <input type="submit" class="btn btn-primary custom" value="Editar" />
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>            
@endsection