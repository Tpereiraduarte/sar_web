@extends("theme.$theme.layout")
@section('titulo')
    Cadastro de Formulário
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
              <h3 class="box-title">Cadastro de Formulário</h3>
            </div>
            <form role="form" action="{{ action('FormulariosController@store') }}" method="POST">
            @csrf
            @if(!empty($dados) && count($dados) > 0)
              <div class="box-body">
                <div class="form-group">
                  <label for="Titulo">Título</label>
                  <input type="text" class="form-control" id="titulo" placeholder="Título do Formulário" name="titulo" maxlength="300" size="50" required>
                </div>
                <div class="box-body">
                    <table id="checklist" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Ordem</th>
                                <th>Descrição</th>
                                <th>Norma</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $key => $valor)
                                <tr>
                                    <td><input type="checkbox" name="status[]" value="{{$valor->id_pergunta}}"></td>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$valor->pergunta}}</td>
                                    <td>NR: {{$valor->normas->numero_norma}} </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="sem-dados">
                    <span class="sem-dados">Não há perguntas Cadastradas</span>
                </div>    
            @endif
              </div>
              <div class="box-footer">
                <a href="{{URL::route('formulario.index')}}" title="Voltar" class="btn btn-primary custom">Voltar</a>
                <button type="submit" id="frm-checklist" class="btn btn-primary custom">Cadastrar</button>
              </div>
            </form>
        </div>
    </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

$(document).ready( function () {
  var table = $('#checklist').DataTable({
    columnDefs: [{
      'targets': 0,
      'searchable': false,
      'orderable': false,
    }],
    order: [[1,'asc']],    
    "language": {
            "lengthMenu": "Exibe _MENU_ Registros por página",
            "search": "Pesquisar :",
            //"paginate": { "previous": "Anterior", "next" : "Próximo"},
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            },
            "zeroRecords": "Nenhum resultado encontrado",
            "info": "Exibindo página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum resultado encontrado",
            "infoFiltered": "(filtrado de _MAX_ regitros totais)"
        },
        "pagingType": "full_numbers",
        "processing": true,    // mostrar a progress bar
        "filter": true,            // habilita o filtro(search box)
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]], //define as opções de paginação
        "pageLength": 5,      // define o tamanho da página 
    } );
} );
</script>
<style>
        .custom {
            font-size: 14px !important;
            
            border:none !important;
            width: 100px !important; 
            height: 35px !important;
            border-radius: 3px !important;
    }
    </style>
@endsection