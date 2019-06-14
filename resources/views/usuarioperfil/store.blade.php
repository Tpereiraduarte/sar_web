@extends("theme.$theme.layout")
@section('titulo')
    Cadastro de Perfis de Usuário
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
               <h3 class="box-title">Cadastre o perfil do Usuário</h3>
            </div>
            <form role="form" action="{{action('UsuarioPerfilController@store') }}" method="POST">
                  @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuariop">Usuário:</label>
                        <input id="usuariop" class="form-control" name="usuariop" type="text" value="" size="50" />
                    </div>
                    <div class="form-group">     
                        <label for="uperfil">Perfil:</label>
                        <input id="uperfil" class="form-control" name="uperfil" type="text" value="" size="50" />
                    </div>                       
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" />
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection