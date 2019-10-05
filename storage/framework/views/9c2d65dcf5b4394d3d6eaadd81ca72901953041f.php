<?php $__env->startSection('titulo'); ?>
    Perfil de Usuários
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
<div class="row">
    <div class="col-xs-2">
        <a id="list" href="<?php echo e(URL::route('usuarioperfil.create')); ?>" title="Cadastrar" class="btn btn-primary">Cadastro de Perfil de usuários</a>
    </div>
</div>
<?php if(!empty($dados) && count($dados) > 0): ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Perfil de Usuário</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $usuarioperfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($usuarioperfil->usuario->nome); ?></td>
                    <td><?php echo e($usuarioperfil->perfil->nome); ?></td>
                    <td>
                        <div class="acoes-lista">
                            <a id="edit" href="<?php echo e(URL::route('usuarioperfil.edit',$usuarioperfil->id_usuarioperfil)); ?>" title="Editar" class="fa fa-edit"></a>
                            <form action="<?php echo e(action('UsuarioPerfilController@destroy', $usuarioperfil->id_usuarioperfil)); ?>"   method="POST">
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
        <span class="sem-dados">Não há perfis de usuários Cadastradas</span>
    </div>    
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('js/toast.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sar_web/resources/views/usuarioperfil/index.blade.php ENDPATH**/ ?>