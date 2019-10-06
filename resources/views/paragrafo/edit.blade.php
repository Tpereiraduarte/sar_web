@extends("theme.$theme.layout")
@section('titulo')
    Editar Paragrafos
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
            <form role="form" action="{{ action('ParagrafosController@update', $dados->id_paragrafo) }}" method="POST">
            @method('PUT')
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Numero da Norma">Número da Norma</label>
                  <select class="form-control" id="numero_norma" name="norma_id" aria-required="true">
                    <option value="{{$dados->normas->id_norma}}"selected>{{$dados->normas->numero_norma}}</option>
                    @foreach($dadosNorma as $value)
                      @if($dados->norma_id != $value->id_norma)
                        <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="Paragrafo">Parágrafo</label>
                  <input type="text" class="form-control" id="paragrafo" placeholder="Numero do Parágrafo" maxlength="15" name="numero_paragrafo" value="{{$dados->numero_paragrafo}}"size="50" required>
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" placeholder="Descrição do Parágrafo" maxlength="400" name="descricao" value="{{$dados->descricao}}"size="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{URL::route('paragrafo.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                <button type="submit" class="btn btn-primary custom">Atualizar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection