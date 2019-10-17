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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="{{ action('SubParagrafosController@update', $dados[0]->id_subparagrafo) }}" method="POST">
                @method('PUT') 
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="Norma">Norma</label>
                        <select class="form-control dinamic" data-dependent="norma" id="norma_id" name="norma" aria-required="true">
                            <option value="{{$dados[0]->id_norma}}" selected>{{$dados[0]->numero_norma}}</option>
                            @foreach($dadosNorma as $value) 
                              @if($dados[0]->id_norma != $value->id_norma)
                                <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
                              @endif 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Paragrafo">Parágrafo</label>
                        <select class="form-control dinamic-paragrafo" data-dependent="paragrafo" id="paragrafo" name="paragrafo_id" aria-required="true">
                            <option value="{{$dados[0]->id_paragrafo}}">{{$dados[0]->numero_paragrafo}} {{$dados[0]->descricao}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numeroparagrafo">SubParágrafo</label>
                        <input type="text" class="form-control" id="numeroparagrafo" placeholder="Número do sub-parágrafo" maxlength="999999" name="numero_paragrafo" value="{{$dados[0]->numero_subparagrafo}}" size="50" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" placeholder="Descrição da Norma" maxlength="6000" name="descricao" rows="5" cols="33" required>{{$dados[0]->descricao}}</textarea>
                    </div>
                <div class="box-footer">
                    <a href="{{URL::route('subparagrafo.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                    <button type="submit" class="btn btn-primary custom">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $(".dinamic").change(changeNorma);
        changeNorma();

        $(".dinamic-paragrafo").change(changeSubparagrafo);
        changeSubparagrafo();
    });

    function changeNorma() {
        let value = document.getElementById("norma_id").value;
        let dependent = "norma";
        let paragrafo = document.getElementById("paragrafo").value;
        if (value != '') {
            let _token = $('input[name="_token"]').val();
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
                    if (result != '<option value="">Escolha o paragrafo desejado</option>') {
                        busca(paragrafo, result);
                    }
                }
            });
        }
    }

    function busca(paragrafo, result) {
        if ($("#paragrafo option[value='" + paragrafo + "']").length == 0) {
            $('#paragrafo').empty();
            return $('#paragrafo').append(result);
        }
        $("#paragrafo option[value=paragrafo]").attr('selected', 'selected')
        return $("#paragrafo").val(paragrafo);
    }

    function changeSubparagrafo() {
        let value2 = document.getElementById("paragrafo").value;
        let norma = document.getElementById("norma_id").value;
        if (value2 != '' && norma != '') {
            let _token = $('input[name="_token"]').val();
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
            });
        }
    }
</script>
@endpush 
@endsection