$(document).ready(function() {
   $('#table').DataTable( {
    columnDefs: [{
      'targets': -1,
      'searchable': false,
      'orderable': false,
    }],
    order: [[0,'asc']],    
    "language": {
            "lengthMenu": "Exibe _MENU_ Registros por página",
            "search": "Pesquisar :",
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
