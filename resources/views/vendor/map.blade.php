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
					<!-- Contacts output here -->
					<h1>Will this work?!?!?!?!</h1>
				</div>
			</div>
			<div class="col-sm-7">
				<div id="map"></div>
			</div>
		</div>
	</div>
@stop

@section('js-script')
	<script src="/assets/js/scripts.js"></script>

	<!-- GOOGLE MAPS API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs&libraries=places&callback=getLocation" async defer></script>
@stop