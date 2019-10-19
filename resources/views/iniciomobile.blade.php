@extends("theme.$theme.layout") @section('titulo') Home @endsection @section('conteudo')
<div class="row">
<div class="col-lg-4 col-xs-6">
<div class="post" style="padding-bottom:12px">
<div class="user-block" style="margin:0px 0px 15px 20px">
    <img class="img-circle img-bordered-sm" src="{{Storage::url('/fotos_usuarios/'.Auth::user()->imagem)}}" alt="user image">
       <span class="username ">
          {{Auth::user()->nome}}
       </span>
    <span class="description">Técnico</span>
 </div>
</div>
</div>

<div class="col-lg-4 col-xs-6">
    <div class="pull-right">
        <a href="{{ url('/logout')}}" class="btn btn-default btn-flat">Sair</a>
    </div>
</div>



</div>
<div class="row">
        <div class="col-lg-3 col-xs-6">
			<a href="#">
          <div class="small-box bg-green">
            <div class="inner">
              <i class="fa fa-check-square-o" style="font-size:69px"></i>
            </div>
			<p style="font-size:17px">Ordens Serviços</p>
		  </div>
		</a>
        </div>

		<div class="col-lg-3 col-xs-6">
		<a href="{{ action('UsersController@edit', Auth::user()->id_usuario) }}">
          <div class="small-box bg-green">
            <div class="inner">
              <i class="fa fa-user" style="font-size:69px"></i>
            </div>
			<p style="font-size:17px">Perfil</p>
		  </div>
		  </a>
        </div>

		<div class="col-lg-3 col-xs-6">
		<a href="#">
          <div class="small-box bg-green">
            <div class="inner">
              <i class="fa fa-th-list" style="font-size:69px"></i>
            </div>
			<p style="font-size:17px">Histórico</p>
		  </div>
		  </a>
        </div>

		<div class="col-lg-3 col-xs-6">
		<a href="{{ url('/norma/')}}">
          <div class="small-box bg-green">
            <div class="inner">
              <i class="fa fa-file" style="font-size:69px"></i>
            </div>
			<p style="font-size:17px">Normas</p>
		  </div>
		  </a>
        </div>
       
</div>

@endsection