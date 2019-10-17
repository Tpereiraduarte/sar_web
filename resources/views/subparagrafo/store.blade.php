@extends("theme.$theme.layout") 
@section('titulo') 
  Cadastro dos SubParágrafos 
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
                <h3 class="box-title">Cadastro de SubParágrafos</h3>
            </div>
            <form role="form" action="{{ action('SubParagrafosController@store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="Norma">Norma</label>
                        <select class="form-control dinamic" data-dependent="norma" id="norma_id" name="norma" aria-required="true">
                            <option selected disabled value="">Escolha o norma desejada</option>
                            @foreach($dados as $value)
                              <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Paragrafo">Paragrafo</label>
                        <select class="form-control dinamic-paragrafo" data-dependent="paragrafo" id="paragrafo" name="paragrafo_id" aria-required="true">
                            <option selected disabled value="">Escolha o paragrafo desejado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="SubParagrafo">SubParágrafo</label>
                        <input type="text" class="form-control" id="paragrafo" placeholder="Numero do subparágrafo" maxlength="15" name="numero_paragrafo" size="50" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" placeholder="Descrição da Norma" maxlength="400" name="descricao" size="50" required>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{URL::route('subparagrafo.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                    <button type="submit" class="btn btn-primary custom">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .custom {
        font-size: 14px !important;
        border: none !important;
        width: 100px !important;
        height: 35px !important;
        border-radius: 3px !important;
    }
</style>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('.dinamic').change(function() {
            if ($(this).val() != '') {
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{URL::route('dinamico')}}",
                    method: "POST",
                    data: {
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);
                        $('#paragrafo').empty();
                        $('#subparagrafo').empty();
                        $('#paragrafo').append(result);
                    }
                })
            }
        });
        $('.dinamic-paragrafo').change(function() {
            if ($(this).val() != '') {
                var value2 = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{URL::route('paragrafodinamico')}}",
                    method: "POST",
                    data: {
                        value2: value2,
                        _token: _token
                    },
                    success: function(result) {
                        $('#subparagrafo').empty();
                        $('#subparagrafo').append(result);
                    }
                })
            }
        });
    });
</script>
@endpush 
@endsection