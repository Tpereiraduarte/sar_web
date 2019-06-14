@extends("theme.$theme.layout")
@section('titulo')
    Perfil de Usuários
@endsection
@sectio('conteudo')
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="{{URL::route('usuarioperfil.create')}}" title="Cadastrar" class="btn btn-primary">Cadastro de Perfil de usuários</a>
    </div>
</div>

@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perfil de Usuário</h3>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                </tr>
            </thead>
        @foreach($dados as $key => $usuarioperfil)
            <tbody>
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$usuarioperfil->usuario_id}}</td>
                    <td>{{$usuarioperfil->perfil_id}}</td>                          
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>     
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há perfis de usuários Cadastradas</span>
    </div>    
@endif
@endsection