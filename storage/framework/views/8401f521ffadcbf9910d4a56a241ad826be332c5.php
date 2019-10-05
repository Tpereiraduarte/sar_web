<?php if($messages = Session::get('success')): ?>
<div id="toast">
    <div id="img"><i class="fa fa-fw fa-thumbs-up"></i></div>
    <div id="desc"><?php echo e($messages); ?></div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/sar_web/resources/views/theme/lte/mensagens.blade.php ENDPATH**/ ?>