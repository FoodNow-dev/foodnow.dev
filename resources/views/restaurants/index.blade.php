@extends('layouts.master')

@section('title','Map')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/map.css">
	{{-- <link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css"> --}}
@stop

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<div id="results">
				</div>
			</div>
			<div class="col-sm-7">
				<div id="map"></div>
			</div>
		</div>
	</div>
	<div class="token">{{ csrf_field() }}</div>
	<div class="action">{{action('RestaurantsController@showData')}} </div>
	<script type="text/javascript">
		var radius = {{ $radius }};
		var minPrice = {{ $minprice }};
		var maxPrice = {{ $maxprice }};
		var food = '{{ $food }}';
	</script>
@stop

@section('js-script')

	<!-- GOOGLE MAPS API -->
	<script src="/assets/js/benScripts.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs&libraries=places&callback=initMap" async defer></script>
@stop

