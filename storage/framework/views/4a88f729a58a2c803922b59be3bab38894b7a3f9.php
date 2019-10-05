<?php $__env->startSection('titulo'); ?>
    Cadastro de Normas
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
              <h3 class="box-title">Cadastro das Normas</h3>
            </div>
            <form role="form" action="<?php echo e(action('NormasController@store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="Numero da Normas">Número da Norma</label>
                  <input type="text" class="form-control" id="numero_norma" placeholder="Escreva Número da Norma" name="numero_norma" maxlength="2" size="50" required>
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" placeholder="Descrição da Norma" maxlength="400" name="descricao" size="50" required>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo e(URL::route('norma.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sar_web/resources/views/norma/store.blade.php ENDPATH**/ ?>