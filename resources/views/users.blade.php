@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>
	Gestión de Usuarios
	<small>Agrega, edita y elimina usuarios</small>
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de registros</h3>

			</div>
			<!-- /.box-header -->
			<div id="app" class="box-body">
				<users></users>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('css')

<link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop
@section('js')

<script src="{{ asset('js/app.js') }}"></script>

@stop