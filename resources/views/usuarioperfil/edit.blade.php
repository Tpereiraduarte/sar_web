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
            <form role="form" action="{{ action('UsuarioPerfilController@update', $dados->id_usuarioperfil)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuariop">Usuário:</label>
                        <select class="form-control" id="usuario_id" name="usuario_id" aria-required="true">
                            @foreach($usuario as $value)
                            <option value="{{$value->id_usuario}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="uperfil">Perfil:</label>
                        <select class="form-control" selected="$dados->id_usuarioperfil" id="perfil_id" name="perfil_id" aria-required="true">
                            @foreach($perfil as $value)
                            <option value="{{$value->id_perfil}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="box-footer">
                        <a href="{{URL::route('usuarioperfil.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                        <input type="submit" class="btn btn-primary" value="Editar" />
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>            
@endsection