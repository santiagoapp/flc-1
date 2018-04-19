@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="text-center">
	<!-- {{ setlocale(LC_TIME, 'Spanish') }} -->
	<!-- {{ Carbon\Carbon::setUtf8(true) }} -->
	ORDENES DE TRABAJO: {{ Carbon\Carbon::now()->formatLocalized('%A %d %B %Y') }}
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<!-- /.box-header -->
			<div id="app" class="box-body">
				<div class="alertas alert alert-info alert-dismissible">
					<h4 ><i class="icon fa fa-info"></i> OT</h4>
					Numero del item - descripcción del item - cantidad
				</div>
				<div class="alertas alert alert-warning alert-dismissible">
					<h4><i class="icon fa fa-warning"></i> OT</h4>
					Numero del item - descripcción del item - cantidad
					Numero del item - descripcción del item - cantidad
				</div>
				<div class="alertas alert alert-success alert-dismissible">
					<h4><i class="icon fa fa-check"></i> OT</h4>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('css')

<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
.alertas{
	font-size: 3rem;
}
</style>
@stop
@section('js')

<script src="{{ asset('js/app.js') }}"></script>

@stop