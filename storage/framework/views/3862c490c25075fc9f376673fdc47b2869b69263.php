<?php $__env->startSection('titulo'); ?>
	Lista de Formularios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="<?php echo e(URL::route('formulario.create')); ?>" title="Cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div><?php if(!empty($dados) && count($dados) > 0): ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Checklists</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Título</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><a href="<?php echo e(URL::route('formulario.show',$valor->id_checklist)); ?>"><?php echo e($valor->titulo); ?></a></td>
                    <td class="acoes-lista">
                        <a id="edit" href="<?php echo e(URL::route('formulario.edit',$valor->id_checklist)); ?>" title="Editar" class="fa fa-edit"></a>
                        <form action="<?php echo e(action('FormulariosController@destroy', $valor->id_checklist)); ?>" method="POST">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"></button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="sem-dados">
        <span class="sem-dados">Não há Checklists Cadastrados</span>
    </div>    
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('js/toast.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sar_web/resources/views/formulario/index.blade.php ENDPATH**/ ?>