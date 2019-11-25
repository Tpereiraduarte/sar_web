<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Storage::url('/fotos_usuarios/'.Auth::user()->imagem)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    {{Auth::user()->nome}}
                </p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                    <span class="pull-right-container">
               <i class="fa fa-angle-down"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('inicio')}}"><i class="fa fa-angle-right"></i>Dashboard</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-align-justify"></i> <span>Cadastro</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-down"></i>
            </span>
                </a>
                @if($detect->isMobile())
                <ul class="treeview-menu">
                    <li><a href="{{ url('/usuario/')}}"><i class="fa fa-angle-right"></i> Usuários</a></li>
    
                </ul>

                @else
                <ul class="treeview-menu">

                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/usuario/')}}"><i class="fa fa-angle-right"></i> Usuários</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "usuario-view") == 0) 
                                <li><a href="{{ url('/usuario/')}}"><i class="fa fa-angle-right"></i> Usuários</a></li>
                            @endif
                        @endforeach

            
                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/perfil/')}}"><i class="fa fa-angle-right"></i> Perfil</a></li>
                    @endif
                    @endforeach
                         @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "perfil-view") == 0)
                                <li><a href="{{ url('/perfil/')}}"><i class="fa fa-angle-right"></i> Perfil</a></li>
                            @endif
                        @endforeach



                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/norma/')}}"><i class="fa fa-angle-right"></i> Normas</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "norma-view") == 0)
                                <li><a href="{{ url('/norma/')}}"><i class="fa fa-angle-right"></i> Normas</a></li>
                            @endif
                        @endforeach


                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                         <li><a href="{{ url('/usuarioperfil/')}}"><i class="fa fa-angle-right"></i> Perfil de Usuários</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "usuarioperfil-view") == 0)
                                 <li><a href="{{ url('/usuarioperfil/')}}"><i class="fa fa-angle-right"></i> Perfil de Usuários</a></li>
                            @endif
                        @endforeach


                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/paragrafo/')}}"><i class="fa fa-angle-right"></i> Paragrafos</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "paragrafo-view") == 0)
                                <li><a href="{{ url('/paragrafo/')}}"><i class="fa fa-angle-right"></i> Paragrafos</a></li>
                            @endif
                        @endforeach

                    
                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/pergunta/')}}"><i class="fa fa-angle-right"></i> Perguntas</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "pergunta-view") == 0) 
                                <li><a href="{{ url('/pergunta/')}}"><i class="fa fa-angle-right"></i> Perguntas</a></li>
                            @endif
                        @endforeach
                   

                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/subparagrafo/')}}"><i class="fa fa-angle-right"></i> Sub-Paragrafos</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "subparagrafo-view") == 0) 
                                 <li><a href="{{ url('/subparagrafo/')}}"><i class="fa fa-angle-right"></i> Sub-Paragrafos</a></li>
                            @endif
                        @endforeach
                    

                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/permissao/')}}"><i class="fa fa-angle-right"></i> Permissão</a></li>
                    @endif
                    @endforeach
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "permissao-view") == 0)
                                <li><a href="{{ url('/permissao/')}}"><i class="fa fa-angle-right"></i> Permissão</a></li>
                            @endif
                        @endforeach

                    
                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                        <li><a href="{{ url('/perfilpermissao/')}}"><i class="fa fa-angle-right"></i>Permissão do Perfil</a></li>
                    @endif
                    @endforeach
                   
                        @foreach($permissoes as $permissao)
                            @if(strcmp($permissao, "perfilpermissao-view") == 0)
                                <li><a href="{{ url('/perfilpermissao/')}}"><i class="fa fa-angle-right"></i>Permissão do Perfil</a></li>
                            @endif
                        @endforeach
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square"></i>
                    <span>Checklist</span>
                    <span class="pull-right-container">
               <i class="fa fa-angle-down"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                         <li><a href="{{ url('/formulario/')}}"><i class="fa fa-angle-right"></i> Novo Checklist</a></li>
                    @endif
                    @endforeach
                         @foreach($permissoes as $permissao)
                             @if(strcmp($permissao, "checklist-view") == 0)
                                <li><a href="{{ url('/formulario/')}}"><i class="fa fa-angle-right"></i> Novo Checklist</a></li>
                            @endif
                        @endforeach
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hand-o-right"></i>
                    <span>Gerenciar Serviços</span>
                    <span class="pull-right-container">
               <i class="fa fa-angle-down"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                   @foreach($admin as $adm)
                    @if(strcmp($adm, "Administrador") == 0)
                    <li><a href="{{ url('/ordemservico/')}}"><i class="fa fa-angle-right"></i>Delegar Ordem de Serviço</a></li>
                    <li><a href="{{ url('/resposta/')}}"><i class="fa fa-angle-right"></i>Resposta dos Serviços</a></li>
                    @endif
                    @endforeach
                    @foreach($permissoes as $permissao)
                             @if(strcmp($permissao, "ordemservico-view") == 0)
                                <li><a href="{{ url('/ordemservico/')}}"><i class="fa fa-angle-right"></i>Delegar Ordem de Serviço</a></li>
                            @endif
                    @endforeach
                    @foreach($permissoes as $permissao)
                             @if(strcmp($permissao, "respostaformulario-view") == 0)
                                <li><a href="{{ url('/resposta/')}}"><i class="fa fa-angle-right"></i>Resposta dos Serviços</a></li>
                            @endif
                    @endforeach
                </ul>
            </li>
        </ul>
       
        @endif
    </section>
</aside>