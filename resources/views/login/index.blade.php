<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset("assets/$theme/dist/img/logo.jpg")}}">
  <title>Sistema de Análise de Riscos| Index</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">
   <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/iCheck/square/blue.css")}}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{asset("assets/$theme/dist/img/logo-sarweb.png")}}" width="320" height="205%" />
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Entre para iniciar sua sessão</p>

            <!-- EXIBINDO ERROS De VALIDAÇÃO DE DADOS -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- EXIBINDO AVISO DE CREDENCIAL INVÁLIDA -->
            @if(session('msg'))
            <div class="alert alert-danger">{{session('msg')}}</div>
            @endif

            <form action="{{ action('LoginController@login') }}" method="post">
                {{ csrf_field() }}
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
                        <button type="submit" class="btn btn-primary btn-block btn-flat custom">Login</button>
                    </div>
                </div>
            </form>
            <a class="nav-link" href="{{ route('password.request') }}">Esqueci Minha Senha</a>
            <style>
                .custom {
                    font-size: 14px !important;
                    background-color: #003334 !important;
                    border: none !important;
                    width: 100px !important;
                    height: 35px !important;
                    border-radius: 3px !important;
                }
            </style>
        </div>
    </div>
<script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
<script src=".{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/iCheck/icheck.min.js")}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
