@extends('layouts.master')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/rest-index.css">
@stop

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-sm-7">
				<div id="map">
					{{-- Map renders here --}}
				</div>
			</div>
			<div class="col-xs-10 col-sm-5">
				<div id="results">
					{{-- List of restaurants --}}
				</div>
			</div>
		</div>
	</div>

	{{-- Passing data to JS --}}
	<script type="text/javascript">
		var radius = {{ $radius }};
		var minPrice = {{ $minprice }};
		var maxPrice = {{ $maxprice }};
		var food = '{{ $food }}';
	</script>
@stop

@section('js-script')

	<script src="/assets/js/benScripts.js"></script>


	
	{{-- Google Maps API --}}
	{{-- WILL NEED TO USE THE PRODUCTION API HERE WHEN LIVE --}}

	{{-- Production API --}}
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs&libraries=places&callback=initMap" async defer></script> --}}

	<!-- Backend API -->
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr7QFq8EX1937OqC6Ge9n7fuE0vJ8dTIo&libraries=places&callback=initMap" async defer></script> --}}
	
	{{-- DEV API --}}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiz0mHf0rFhZRI-dIr7Phh-cUVuHq9dOs&libraries=places&callback=initMap" async defer></script>
	
@stop

