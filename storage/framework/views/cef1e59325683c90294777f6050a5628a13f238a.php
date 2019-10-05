<?php $__env->startSection('titulo'); ?>
    Usuários
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="<?php echo e(URL::route('usuario.create')); ?>" title="Cadastrar" class="btn btn-primary">Cadastro de usuários</a>
    </div>
</div>

<?php if(!empty($dados) && count($dados) > 0): ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Dados Pessoais</h3>
    </div>
    <div class="box-body">
    <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($user->matricula); ?></td>
                    <td><?php echo e($user->nome); ?></td>                    
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="<?php echo e(URL::route('usuario.edit',$user->id_usuario)); ?>" title="Editar" class="fa fa-edit"></a>
                            <form action="<?php echo e(action('UsersController@destroy', $user->id_usuario)); ?>"   method="POST">
                                <?php echo e(method_field('DELETE')); ?>

                                <?php echo e(csrf_field()); ?>

                                <button id="delete" type='submit' title="Excluir" class="fa fa-fw fa-trash"> </button>
                            </form>
                        </div>
                    </td>
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>     
<?php else: ?>
    <div class="sem-dados">
        <span class="sem-dados">Não há usuários Cadastradas</span>
    </div>    
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('js/toast.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sar_web/resources/views/usuario/index.blade.php ENDPATH**/ ?>