@extends("theme.$theme.layout") @section('titulo') Home @endsection @section('conteudo')
<div class="row">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">{{Auth::user()->nome}}</h3>
		</div>
		<div class="box-body">
			Técnico
		</div>
	</div>
</div>

<div class="row">
	<div class="callout  bg-yellow">
		<h4>Checklists Pendentes</h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="callout  callout-info">
		<h4>Checklists Realizados</h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>0S01</h3>
			</div>
		</div>
	</div>
</div>
@endsection