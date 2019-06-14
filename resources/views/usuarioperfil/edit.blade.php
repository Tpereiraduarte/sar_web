@extends("theme.$theme.layout")
@section('titulo')
    Editar Perfil de Usuário
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
            <form role="form" action="{{ action('UsuarioPerfilController@update', $dados->id_perfilUsuario) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuariop">Usuário:</label>
                        <input id="usuariop" class="form-control" name="usuariop" type="text" value="{{$dados->usuario_id}}" size="50"/>
                    </div>
                    <div class="form-group">
                        <label for="uperfil">Perfil:</label>
                        <input id="uperfil" class="form-control" name="uperfil" type="text" placeholder="Insira o perfil" value="{{$dados->perfil_id}}" maxlength="100"  required />
                    </div>  
                    <input type="submit" class="btn btn-primary" value="Editar" />
                </div>
            </form>
        </div>
    </div>
</div>            
@endsection