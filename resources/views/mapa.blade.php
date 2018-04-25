@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="text-center">
	MAPA DEL SISTEMA PRODUCTIVO
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<!-- /.box-header -->
			<div id="app" class="box-body">
				<zonas></zonas>
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


</style>
@stop
@section('js')

<script src="{{ asset('js/app.js') }}"></script>

@stop