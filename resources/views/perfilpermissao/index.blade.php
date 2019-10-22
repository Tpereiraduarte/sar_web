@extends("theme.$theme.layout")
@section('titulo')
    Permissão de Perfil
@endsection
@section('conteudo')
<div class="row">
    <div class="col">
        <a id="list" href="{{URL::route('perfilpermissao.create')}}" title="Cadastrar" class="btn btn-primary"><i class="fa fa-key"></i> Nova Permissão de Perfil</a>
        <a id="list" href="{{URL::route('relatorios.relatorioperfilpermissao')}}" title="Gerar Pdf" class="btn btn-primary custom-pdf"><i class="fa fa-file-pdf-o"></i></a>
    </div> 
</div>
@if(!empty($dados) && count($dados) > 0)
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Permissão de Perfil</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Permissão</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $perfilpermissao)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$perfilpermissao->permissao->nome}}</td>
                    <td>{{$perfilpermissao->perfil->nome}}</td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="{{URL::route('perfilpermissao.edit',$perfilpermissao->id_perfilpermissao)}}" title="Editar" class="fa fa-edit"></a>
                                        
                            <form action="{{ action('PerfilPermissaoController@destroy', $perfilpermissao->id_perfilpermissao) }}"   method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"> </button>
                            </form>
                           
                        </div>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
    <div class="sem-dados">
        <span class="sem-dados">Não há permissões de perfil Cadastradas</span>
    </div>
@endif
@endsection