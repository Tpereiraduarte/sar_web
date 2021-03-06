@extends("theme.$theme.layout")
@section('titulo')
Cadastro de Usuários
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
                <h3 class="box-title">Cadastre o usuário</h3>
            </div>
            <form role="form" action="{{action('UsersController@store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Usuário:</label>
                        <input id="name" class="form-control" name="nome" type="text" onkeypress="return lettersOnly(event);" value="" size="50" />
                    </div>
                    <div class="form-group">
                        <label for="email">e-mail:</label>
                        <input id="email" class="form-control" name="email" type="email" value="" size="50" />
                    </div>
                    <div class="form-group">
                        <label for="matricula">Matricula:</label>
                        <input id="matricula" class="form-control" name="matricula" type="text" onkeypress="return onlynumber();"  value="" size="20" />
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label><br />
                        <input id="password" class="form-control" name="password" type="password" value="" size="10" />
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem:</label><br />
                        <input type="file" name="foto" id="camera">
                    </div>
                    <div class="form-group">
                        <div class="box-footer">
                            <a href="{{URL::route('usuario.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                            <input type="submit" class="btn btn-primary custom" title="Cadastrar" value="Cadastrar" />
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ url('js/onlytext.js') }}"></script>
<script src="{{ url('js/onlynumber.js') }}"></script>
@endpush
@endsection