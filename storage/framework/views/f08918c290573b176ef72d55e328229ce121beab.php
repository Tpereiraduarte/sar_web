<?php $__env->startSection('titulo'); ?>
	Lista de Perguntas
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="<?php echo e(URL::route('pergunta.create')); ?>" title="Cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div>
<?php if(!empty($dados) && count($dados) > 0): ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perguntas</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Descrição</th>
                  <th>Norma</th>
                  <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td title="<?php echo e($valor->paragrafos->numero_paragrafo); ?> - <?php echo e($valor->paragrafos->descricao); ?>"><?php echo e($valor->pergunta); ?></td>
                    <td>NR: <?php echo e($valor->normas->numero_norma); ?></td>
                    <td class="acoes-lista">
                        <a id="edit" href="<?php echo e(URL::route('pergunta.edit',$valor->id_pergunta)); ?>" title="Editar" class="fa fa-edit"></a>
                        <form action="<?php echo e(action('PerguntasController@destroy', $valor->id_pergunta)); ?>" method="POST">
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
        <span class="sem-dados">Não há perguntas Cadastradas</span>
    </div>    
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('js/toast.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sar_web/resources/views/pergunta/index.blade.php ENDPATH**/ ?>