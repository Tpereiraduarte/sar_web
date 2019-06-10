@extends("theme.$theme.layout")
@section('titulo')
	Cadastro de Perguntas
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
              <h3 class="box-title">Cadastre as perguntas do checklist</h3>
            </div>
            <form role="form" action="{{ action('PerguntasController@store') }}" method="POST">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Pergunta">Pergunta</label>
                  <input type="text" class="form-control" id="pergunta" placeholder="Escreva a Pergunta" name="pergunta" maxlength="200" size="50" required>
                </div>
                <div class="form-group">
                  <label for="Norma">NR</label>
                    <select class="form-control dinamic" data-dependent="norma" id="norma_id" name="norma" aria-required="true">
                      <option selected disabled value="">Escolha o norma desejada</option>
                      @foreach($dados as $value)
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
                <a href="{{URL::route('pergunta.index')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
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
</div>
@endsection