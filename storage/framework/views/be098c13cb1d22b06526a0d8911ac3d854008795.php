<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Análise de Riscos| Index</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset("assets/$theme/dist/css/AdminLTE.min.css")); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset("assets/$theme/plugins/iCheck/square/blue.css")); ?>">
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      Sistema de Análise de Riscos - logo
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Entre para iniciar sua sessão</p>
      <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>
      <?php if(session('msg')): ?>
      <div class="alert alert-danger"><?php echo e(session('msg')); ?></div>
      <?php endif; ?>
      <form action="<?php echo e(action('LoginController@login')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group has-feedback">
          <input type="text" name="matricula" class="form-control" placeholder="Matrícula">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Senha">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </div>
      </form>
      <a class="nav-link" href="<?php echo e(route('password.request')); ?>">Esqueci Minha Senha</a>
    </div>
  </div>
  <script src="<?php echo e(asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")); ?>"></script>
  <script src=".<?php echo e(asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")); ?>"></script>
  <script src="<?php echo e(asset("assets/$theme/plugins/iCheck/icheck.min.js")); ?>"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });
  </script>
</body>

</html><?php /**PATH /var/www/html/sar_web/resources/views/login/index.blade.php ENDPATH**/ ?>