@extends('layouts.master')

@section('content')
	<h1>show</h1>

	<div class="col-sm-7">
		<div style="width:500px; height: 500px;" id="map"></div>
		{{$place['name']}}
	</div>

@stop


@section('js-script')



 

		
	<script type="text/javascript" src="/assets/js/rest-show.js"></script>

@stop


