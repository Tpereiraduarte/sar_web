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
              <option value="{{$dados->normas->id_norma}}" selected >{{$dados->normas->numero_norma}}</option>
                @foreach($dadosNorma as $value)
                  @if($dados->norma_id != $value->id_norma)
                    <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                  @endif
                @endforeach 
            </select>
          </div>
          <div class="form-group">
            <label for="Paragrafo">Paragrafo</label>
            <select class="form-control dinamic-paragrafo" data-dependent="paragrafo" id="paragrafo" name="paragrafo" aria-required="true">
              <option value="{{$dados->paragrafos->id_paragrafo}}">{{$dados->paragrafos->numero_paragrafo}} {{$dados->normas->descricao}}</option>
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
    <div class="box box-primary direct-chat direct-chat-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Informações</h3>
      </div>
      <div class="box-body">
        <div class="direct-chat-messages" id="subparagrafo"></div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  $(document).ready(function () {
      $(".dinamic").change(changeNorma);
      changeNorma();

      $(".dinamic-paragrafo").change(changeSubparagrafo);
      changeSubparagrafo();
  });
    function changeNorma(){
      debugger
      let value = document.getElementById("norma_id").value;
      let dependent = "norma";  
      let paragrafo = document.getElementById("paragrafo").value;
      if(value !=''){
        let _token =$('input[name="_token"]').val();
          $.ajax({
            url:"{{URL::route('dinamico')}}",
            method:"POST",
            data:{value:value,_token:_token,dependent:dependent},
            success:function(result)
            {
              $('#'+dependent).html(result);
              $('#paragrafo').empty();
              $('#subparagrafo').empty();
              $('#paragrafo').append(result);
              if(result != '<option value="">Escolha o paragrafo desejado</option>') {
                busca(paragrafo,result);
              }
            }
          });
        }
      }
      function busca(paragrafo,result){
        if($("#paragrafo option[value='"+paragrafo+"']").length == 0) {
          $('#paragrafo').empty();
          return $('#paragrafo').append(result);
        }
          $("#paragrafo option[value=paragrafo]").attr('selected', 'selected')
          return $("#paragrafo").val(paragrafo);
      }
    function changeSubparagrafo() {
        let value2 = document.getElementById("paragrafo").value;  
        let norma = document.getElementById("norma_id").value;
        if(value2 !='' && norma !=''){
          let _token =$('input[name="_token"]').val();
          $.ajax({
            url:"{{URL::route('paragrafodinamico')}}",
            method:"POST",
            data:{value2:value2,_token:_token},
            success:function(result)
            {
              $('#subparagrafo').empty();
              $('#subparagrafo').append(result);
            }
          });
        }
    }
</script>
@endpush
@endsection
