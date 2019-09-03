<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo','Sistema Análise de Riscos')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
   <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">

  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/iCheck/flat/blue.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/iCheck/all.css")}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
   @yield("style")

   <!-- Google Font
   <link rel="stylesheet" href="https://fonts.googleapis.com/   css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
  </head>
   
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- inicio header -->
        @include("theme/$theme/header")
        <!-- fim header -->
        <!-- inicio aside -->
         @include("theme/$theme/aside")
        <!-- fim aside -->

         <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
       <section class="content">
          @include("theme/$theme/mensagens")
          @yield('conteudo')
        </section>
      </div>
      <!-- Inicio Footer -->
       @include("theme/$theme/footer")
      <!-- fim Footer -->
    </div>
       <!-- jQuery 3 -->
      <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
      <!-- DataTable -->
      <script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.js")}}"></script> 
      <script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
      <!-- SlimScroll -->
      <script src="{{asset("assets/$theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
      <!-- FastClick -->
      <script src="{{asset("assets/$theme/bower_components/fastclick/lib/fastclick.js")}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
      <script src="{{asset("assets/$theme/bower_components/datatables.net/js/table.js")}}"></script>
      <script src="{{asset("assets/$theme/plugins/iCheck/icheck.min.js")}}"></script>

      @yield("scripts")
      @stack('scripts')
  </body>
</html>