@extends('layouts.master')

@section('content')
	<h1>show</h1>

	<div class="col-sm-7">
		<div style="width:500px; height: 500px;" id="map"></div>
	</div>

@stop


@section('js-script')



 <script>
 	$.get('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJ_zRMoYb0XIYRN7ywIvI1JW4&key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs', function(data){
 		console.log(data);
 	});
 </script>

		
	<script type="text/javascript" src="/assets/js/rest-show.js"></script>

@stop


