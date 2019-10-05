@extends("theme.$theme.layout")
@section('titulo')
    Editar Permissão de Perfil
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
            <form role="form" action="{{ action('PerfilPermissaoController@update', $dados->id_perfilpermissao)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuario">Permissão:</label>
                        <select class="form-control" id="permissao_id" name="permissao_id" aria-required="true">
                            <option value="{{$dados->permissao_id}}" selected>{{$dados->permissao->nome}}</option>
                            @foreach($permissao as $value)
                                @if($dados->permissao_id != $value->id_permissao)
                                    <option value="{{$value->id_permissao}}">{{$value->nome}}</option>
                                @endif
                            @endforeach 
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="uperfil">Perfil:</label>
                        <select class="form-control" id="perfil_id" name="perfil_id" aria-required="true">
                            <option value="{{$dados->perfil_id}}" selected>{{$dados->perfil->nome}}</option>
                            @foreach($perfil as $value)
                                @if($dados->perfil_id != $value->id_perfil)
                                    <option value="{{$value->id_perfil}}">{{$value->nome}}</option>
                                @endif
                            @endforeach
                        </select>   
                    </div>
                    <div class="box-footer">
                        <a href="{{URL::route('perfilpermissao.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                        <input type="submit" class="btn btn-primary" value="Editar" />
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>            
@endsection