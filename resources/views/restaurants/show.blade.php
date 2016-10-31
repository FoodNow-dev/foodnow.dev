@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/rest-show.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 text text-center show-box animated flipInX">
						<p class="animated zoomIn"><img src="data:image/gif;base64,{{ $photos[0] }}" width="200" height="200"></p>
						<h1><strong>{{ $place['name'] }}</strong></h1>
						<div class="description">
							<ul>
								
								<li>
									{{ $place['address_components'][0]['long_name'] }} {{ $place['address_components'][1]['long_name'] }}
								</li>
								<li>
									{{ $place['address_components'][3]['long_name'] }}, {{  $place['address_components'][5]['long_name'] }}
								</li>
								<li>
									{{ $place['formatted_phone_number'] }}
								</li>
							</ul>
						</div>
						<div class="top-big-link">
							<button class="btn" href="#">Create Event</button>
							
						</div>
					</div>
					
					<div class="col-sm-5 form-box animated fadeInRight">
						@foreach($place['reviews'] as $key => $review) 


							<div class="col-sm-12 form-bottom show-box">
								<div class="review-container">
									<img class="google-profile" src="{{ (isset($review['profile_photo_url'])) ? $review['profile_photo_url'] : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}" width="30%" height="150px">
									<div class="review-info text-right">
										<h3><b>{{$review['author_name']}}</b></h3>
										<p>
											<img class="stars" src="{{ $starRating[$key] }}">
										</p>
										<p>
											{{ $time[$key] }}
										</p>
									</div>
										
										
										
									<div class="review"> 
										
											{{ $review['text']}}
										
									</div>
								</div>
							</div>
							
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>







	{{-- ********************************************************************************* --}}
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text">
						<div class="col-lg-6">
							<h1> {{$place['name']}} </h1>
							<div id="rating"></div>
							<p>
								{{$place['formatted_address']}}
							</p>
						</div>
						<div id="map"></div>
					</div>
				</div>
				<div class="row">

					<div class="col-xs-12 col-xs-offset-1 col-sm-5 col-sm-offset-0 text">
						<h1>Update Your Friends Where Dinner Is</h1>
						<form class="form-horizontal col-xs-10 col-xs-offset-3" method="POST" action="/restaurants/restaurant">
						{!! csrf_field() !!}
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendName1" class="form-control" placeholder="Friend's name" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendPhone1" class="form-control" placeholder="Friend's phone #" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendName2" class="form-control" placeholder="Friend's name" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" id = "friendPhone2" name="friendPhone2" class="form-control" placeholder="Friend's phone #" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<textarea id="email_body" name="email_body" rows="3" cols="25" placeholder="We're meeting in Olive Garden at 7 pm"></textarea>
							</div>

							<div class="col-xs-6">
								<button type="submit" class="btn btn-primary">Send Message</button>
							</div>
							<div class="col-xs-7">
								@if(session()->has('SUCCESS_MESSAGE'))
								<div class="alert alert-success">
									<p>{{session('SUCCESS_MESSAGE') }}</p>
								</div>
								@endif
		
								@if(session()->has('ERROR_MESSAGE'))
								<div class="alert alert-danger">
									<p>{{session('ERROR_MESSAGE') }}</p>
								</div>
								@endif
							</div>
						</form>
					</div>
					<div class="col-xs-12 col-xs-offset-1 col-sm-5 col-sm-offset-1 text">
						<h1>Reviews</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		// Passes Scalar data held in PHP to JS
		var lat = {{ $place['geometry']['location']['lat'] }};
		var lng = {{ $place['geometry']['location']['lng'] }};
		var starrating = {{ $place['rating'] }};
		var price = {{ $place['price_level'] }};
	</script>
@stop


@section('js-script')
	{{-- Custom JS --}}
	<script type="text/javascript" src="{{ URL::asset('assets/js/rest-show.js') }}"></script>
	<script type="text/javascript" src="/assets/js/rest-show.js"></script>

	{{-- Google Maps API --}}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs	&libraries=places&callback=initMap" async defer></script>
@stop


