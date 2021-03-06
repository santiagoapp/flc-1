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

				<div class="row">
					<div class="col-md-4" id="asd">
						Lista
					</div>
					<div class="col-md-8">
						<!-- <img src="{{asset('img/mapa.svg')}}" alt=""> -->
						@include('svg/mapa')
					</div>
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
.mapa{
	fill:none;
	stroke:#000;
	stroke-miterlimit:10;
}

</style>
@stop
@section('js')

<script src="{{ asset('js/app.js') }}"></script>
<script>
	$('#asd').hover(function() {
		$('rect').css("fill","rgba(0, 191, 255,0.2)")
	}, function() {
		$('rect').css("fill","none")
	});
</script>
@stop