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
               <h3 class="box-title">Cadastro de Perfil do Usuário</h3>
            </div>
            <form role="form" action="{{action('UsuarioPerfilController@store') }}" method="POST">
                  @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuariop">Usuário:</label>
                        <select class="form-control" id="usuario_id" name="usuario_id" aria-required="true">
                            <option selected disabled value="">Escolha um usuário</option>
                            @foreach($usuario as $value)
                            <option value="{{$value->id_usuario}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">     
                        <label for="uperfil">Perfil:</label>
                        <select class="form-control" id="usuario_id" name="perfil_id" aria-required="true">
                            <option selected disabled value="">Escolha um perfil</option>
                            @foreach($perfil as $value)
                            <option value="{{$value->id_perfil}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>                        
                    </div>                       
                    <div class="form-group">
                        <a href="{{URL::route('usuarioperfil.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                        <input type="submit" class="btn btn-primary custom" value="Cadastrar"/>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection