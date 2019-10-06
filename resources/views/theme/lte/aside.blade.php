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
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
         <li class="treeview active">
          <a href="{{ url('inicio')}}"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-align-justify"></i> <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
         
          <li><a href="{{ url('/usuario/')}}"><i class="fa fa-angle-right"></i> Usuários</a></li>
          <li><a href="{{ url('/perfil/')}}"><i class="fa fa-angle-right"></i> Perfil</a></li>
          <li><a href="{{ url('/usuarioperfil/')}}"><i class="fa fa-angle-right"></i> Perfil de Usuários</a></li>
          <li><a href="{{ url('/pergunta/')}}"><i class="fa fa-angle-right"></i> Perguntas</a></li>
          <li><a href="{{ url('/permissao/')}}"><i class="fa fa-angle-right"></i> Permissão</a></li>
          <li><a href="{{ url('/perfilpermissao/')}}"><i class="fa fa-angle-right"></i>Permissão do Perfil</a></li>
          <li><a href="{{ url('/norma/')}}"><i class="fa fa-angle-right"></i> Normas</a></li>
          <li><a href="{{ url('/paragrafo/')}}"><i class="fa fa-angle-right"></i> Paragrafos</a></li>
          <li><a href="{{ url('/subparagrafo/')}}"><i class="fa fa-angle-right"></i> Sub-Paragrafos</a></li>
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
            <li><a href="{{ url('/formulario/')}}"><i class="fa fa-angle-right"></i> Novo Checklist</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
