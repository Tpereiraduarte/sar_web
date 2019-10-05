<?php $__env->startSection('titulo'); ?>
    Editar Usuário
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
            <form role="form" action="<?php echo e(action('UsersController@update', $dados->id_usuario)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Usuário:</label>
                        <input id="name" class="form-control" name="nome" type="text" value="<?php echo e($dados->nome); ?>" size="50"/>
                    </div>
                    <div class="form-group">
                        <label for="email">e-mail:</label>
                        <input id="email" class="form-control" name="email" type="text" placeholder="Insira o e-mail" value="<?php echo e($dados->email); ?>" maxlength="200"  required readonly/>
                    </div>
                    <div class="form-group">    
                        <label  for="matricula">Matricula:</label>
                        <input id="matricula" class="form-control" name="matricula" type="text" value="<?php echo e($dados->matricula); ?>" size="20"/>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input id="password" class="form-control" name="password" type="password" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem:</label><br />
                        <input type="file" name="foto" id="camera" value="<?php echo e($dados->imagem); ?>">
                    </div> 
                    <div class="form-group">
                        <div class="box-footer">
                            <a href="<?php echo e(URL::route('usuario.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>                    <input type="submit" class="btn btn-primary" value="Editar" />
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>            
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sar_web/resources/views/usuario/edit.blade.php ENDPATH**/ ?>