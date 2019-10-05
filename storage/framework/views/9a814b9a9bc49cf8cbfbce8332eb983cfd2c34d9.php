
<?php $__env->startSection('titulo'); ?>
    Editar Permissão de Perfil
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="<?php echo e(action('PerfilPermissaoController@update', $dados->id_perfilpermissao)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuario">Permissão:</label>
                        <select class="form-control" id="permissao_id" name="permissao_id" aria-required="true">
                            <option value="<?php echo e($dados->permissao_id); ?>" selected><?php echo e($dados->permissao->nome); ?></option>
                            <?php $__currentLoopData = $permissao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($dados->permissao_id != $value->id_permissao): ?>
                                    <option value="<?php echo e($value->id_permissao); ?>"><?php echo e($value->nome); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="uperfil">Perfil:</label>
                        <select class="form-control" id="perfil_id" name="perfil_id" aria-required="true">
                            <option value="<?php echo e($dados->perfil_id); ?>" selected><?php echo e($dados->perfil->nome); ?></option>
                            <?php $__currentLoopData = $perfil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($dados->perfil_id != $value->id_perfil): ?>
                                    <option value="<?php echo e($value->id_perfil); ?>"><?php echo e($value->nome); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>   
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo e(URL::route('perfilpermissao.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>
                        <input type="submit" class="btn btn-primary" value="Editar" />
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>            
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sar_web/resources/views/perfilpermissao/edit.blade.php ENDPATH**/ ?>