<?php $__env->startSection('titulo'); ?>
	Cadastro de Perguntas
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
        <h3 class="box-title">Cadastre as perguntas do checklist</h3>
      </div>
      <form role="form" action="<?php echo e(action('PerguntasController@store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="Pergunta">Pergunta</label>
            <input type="text" class="form-control" id="pergunta" placeholder="Escreva a Pergunta" name="pergunta" maxlength="200" size="50" required>
          </div>
          <div class="form-group">
            <label for="Norma">NR</label>
            <select class="form-control dinamic" data-dependent="norma" id="norma_id" name="norma" aria-required="true">
              <option selected disabled value="">Escolha o norma desejada</option>
              <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->id_norma); ?>"><?php echo e($value->numero_norma); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Paragrafo">Paragrafo</label>
            <select class="form-control dinamic-paragrafo" data-dependent="paragrafo" id="paragrafo" name="paragrafo" aria-required="true">
              <option selected disabled value="">Escolha o paragrafo desejado</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <a href="<?php echo e(URL::route('pergunta.index')); ?>" title="Voltar" class="btn btn-primary">Voltar</a>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary direct-chat direct-chat-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Informações</h3>
      </div>
      <div class="box-body">
        <div class="direct-chat-messages" id="subparagrafo"></div>
      </div>
    </div>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){
      $('.dinamic').change(function(){
        if($(this).val() !='')
        {
          var value = $(this).val();
          var dependent = $(this).data('dependent');
          var _token =$('input[name="_token"]').val();
          $.ajax({
            url:"<?php echo e(URL::route('dinamico')); ?>",
            method:"POST",
            data:{value:value,_token:_token,dependent:dependent},
            success:function(result)
            {
              $('#'+dependent).html(result);
              $('#paragrafo').empty();
              $('#subparagrafo').empty();
              $('#paragrafo').append(result);
            }
          })
        }
      });
      $('.dinamic-paragrafo').change(function(){
        if($(this).val() !='')
        {
          var value2 = $(this).val();
          var _token =$('input[name="_token"]').val();
          $.ajax({
            url:"<?php echo e(URL::route('paragrafodinamico')); ?>",
            method:"POST",
            data:{value2:value2,_token:_token},
            success:function(result)
            {
              $('#subparagrafo').empty();
              $('#subparagrafo').append(result);
            }
          })
        }
      });

    });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("theme.$theme.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sar_web/resources/views/pergunta/store.blade.php ENDPATH**/ ?>