<?php $__env->startSection('titulo'); ?>
    Cadastro de Formulário
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="row">
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro de Formulário</h3>
            </div>
            <form role="form" action="<?php echo e(action('FormulariosController@store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(!empty($dados) && count($dados) > 0): ?>
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
                            <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input class="check" type="checkbox" name="status[]" value="<?php echo e($valor->id_pergunta); ?>"></td>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($valor->pergunta); ?></td>
                                    <td>NR: <?php echo e($valor->normas->numero_norma); ?> </td>
                                    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="sem-dados">
                    <span class="sem-dados">Não há perguntas Cadastradas</span>
                </div>    
            <?php endif; ?>
              </div>
              <div class="box-footer">
                <a href="<?php echo e(URL::route('formulario.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" id="frm-checklist" class="btn btn-primary">Cadastrar</button>
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
    $ ('.check'). iCheck ({
        checkboxClass: 'icheckbox_square-blue',
    });   
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sar_web/resources/views/formulario/store.blade.php ENDPATH**/ ?>