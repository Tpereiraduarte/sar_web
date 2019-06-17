@extends("theme.$theme.layout")
@section('titulo')
    Editar Sub-Parágrafo
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
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="{{ action('SubParagrafosController@update', $dados->id_subparagrafo) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="box-body">
                <div class="form-group">
                <label for="Numero do Paragrafo">Número do Parágrafo</label>
                    <select class="form-control" id="numero_paragrafo" name="paragrafo_id" aria-required="true">
                      <option selected disabled value="">Escolha o paragrafo desejado</option>
                      @foreach($dadosParagrafo as $value)
                        <option value="{{$value->id_paragrafo}}">{{$value->descricao}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="Paragrafo">Parágrafo</label>
                  <input type="text" class="form-control" id="paragrafo" placeholder="Parágrafo da Norma" maxlength="15" name="numero_paragrafo" value="{{$dados->numero_paragrafo}}"size="50" required>
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" placeholder="Descrição da Norma" maxlength="400" name="descricao" value="{{$dados->descricao}}"size="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('subparagrafo.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection