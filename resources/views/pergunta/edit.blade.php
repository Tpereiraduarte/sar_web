@extends("theme.$theme.layout")
@section('titulo')
    Editar Pergunta
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
        <h3 class="box-title">Cadastre as perguntas do checklist</h3>
      </div>
      <form role="form" action="{{ action('PerguntasController@update', $dados->id_pergunta) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="Pergunta">Pergunta</label>
            <input type="text" class="form-control" id="pergunta" placeholder="Escreva a Pergunta" name="pergunta" value="{{$dados->pergunta}}"maxlength="200" size="50" required>
          </div>
          <div class="form-group">
            <label for="Norma">NR</label>
            <select class="form-control dinamic" data-dependent="norma" id="norma_id" name="norma" aria-required="true">
              <option value="{{$dados->id_norma}}">{{$dados->numero_norma}}</option>
                @foreach($dadosNorma as $value)
                  <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Paragrafo">Paragrafo</label>
            <select class="form-control" id="paragrafo" name="paragrafo" aria-required="true">
              <option selected disabled value="">Escolha o paragrafo desejado</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <a href="{{URL::route('pergunta.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
          <button type="submit" class="btn btn-primary custom">Atualizar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Informações</h3>
      </div>
      <div class="box-body" id="subparagrafo"></div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $('.dinamic').change(function(){
        if($(this).val() !='')
        {
          var value = $(this).val();
          var dependent = $(this).data('dependent');
          var _token =$('input[name="_token"]').val();
          $.ajax({
            url:"{{URL::route('dinamico')}}",
            method:"POST",
            data:{value:value,_token:_token,dependent:dependent},
            success:function(result)
            {
              $('#'+dependent).html(result);
              $('#paragrafo').empty();
              $('#paragrafo').append(result);
            }
          })
        }
      });
    });
</script>
@endsection
