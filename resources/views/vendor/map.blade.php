@extends('layouts.master')

@section('title','Map')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/map.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				List of places
			</div>
			<div class="col-sm-8">
				<div id="map"></div>
			</div>
		</div>
	</div>
	
@stop