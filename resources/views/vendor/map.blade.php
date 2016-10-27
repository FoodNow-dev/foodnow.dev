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
				</div>
			</div>
			<div class="col-sm-7">
				<div id="map"></div>
			</div>
		</div>
	</div>
@stop

@section('js-script')

	<!-- GOOGLE MAPS API -->
    {{-- // <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFAFmUfcWBHdFGHFsmXWXWAI2Bz7Wxp-0&callback=initMap"></script> --}}
	<script src="/assets/js/benScripts.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuRZZUoFbL7tJD2i7QbbDdNsZ0eyRmq5w&libraries=places&callback=initMap" async defer></script>

	{{-- // <script src="https://maps.googleapis.com/maps/api/place/textsearch/json?query=Mexican+Restaurant&sensor=true&location=40.846,-73.938&radius=20&key=AIzaSyA4PSgGcaNsGm6_cRV9qOC_HzBgeP769do&callback=initMap" async defer></script> --}}
@stop