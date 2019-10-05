@extends("theme.$theme.layout")
@section('titulo')
    Cadastro de Permissão do Perfil
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
               <h3 class="box-title">Cadastre a Permissão do Perfil</h3>
            </div>
            <form role="form" action="{{action('PerfilPermissaoController@store') }}" method="POST">
                  @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuariop">Permissão:</label>
                        <select class="form-control" id="permisssao_id" name="permissao_id" aria-required="true">
                            <option selected disabled value="">Escolha a permissão desejada</option>
                            @foreach($permissao as $value)
                            <option value="{{$value->id_permissao}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">     
                        <label for="uperfil">Perfil:</label>
                        <select class="form-control" id="usuario_id" name="perfil_id" aria-required="true">
                            <option selected disabled value="">Escolha o perfil desejado</option>
                            @foreach($perfil as $value)
                            <option value="{{$value->id_perfil}}">{{$value->nome}}                                
                            </option>
                            @endforeach
                        </select>                        
                    </div>                       
                    <div class="form-group">
                        <a href="{{URL::route('perfilpermissao.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                        <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection