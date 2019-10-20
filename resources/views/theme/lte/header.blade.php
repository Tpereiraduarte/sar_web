<header class="main-header">
@if ($detect->isMobile())


<a href="{{ url('inicio')}}" class="logo">
    <img src="{{asset("assets/$theme/dist/img/logo-branco.png")}}" width= "100" height="45" />    </a>
   
            

 @else

 <a href="{{ url('inicio')}}" class="logo">
    <img src="{{asset("assets/$theme/dist/img/logo-branco.png")}}" width= "100" height="45" />    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
         <span class="titulo-sistema">Sistema de Análise de Riscos</span>
  <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{Storage::url('/fotos_usuarios/'.Auth::user()->imagem)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->nome}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                              <img src="{{Storage::url('/fotos_usuarios/'.Auth::user()->imagem)}}" class="img-circle" alt="User Image">
                            <p>
                                {{Auth::user()->nome}}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('UsersController@edit', Auth::user()->id_usuario) }}"
                                    class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout')}}" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
@endif   
</header>