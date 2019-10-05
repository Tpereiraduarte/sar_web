<?php $__env->startSection('titulo'); ?>
    Cadastro de Perfis
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
              <h3 class="box-title">Cadastro de Perfil</h3>
            </div>
            <form role="form" action="<?php echo e(action('PerfilsController@store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="Perfil">Nome do perfil</label>
                  <input type="text" class="form-control" id="perfil" placeholder="Ex: Administrador" name="nome" maxlength="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo e(URL::route('perfil.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sar_web/resources/views/perfil/store.blade.php ENDPATH**/ ?>