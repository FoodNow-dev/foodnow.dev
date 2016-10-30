@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/restaurant.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements.css">

@stop

@section('content')
	
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text">
						<div class="col-lg-6">
							<h1>{{$place['name']}}</h1>
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

							<div class="container">  
						   		 @yield('content')
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
		var lat = {{$place['geometry']['location']['lat']}};
		var lng = {{ $place['geometry']['location']['lng'] }};
		var starrating = {{ $place['rating'] }};
		
		var price = {{ $place['price_level']}};


	</script>

@stop


@section('js-script')
	<script type="text/javascript" src="/assets/js/rest-show.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_7RtOoqaohsnAdLReUJ_ReW9m8co-Sx0&keyword=restaurant&libraries=places&callback=getLocation" async defer></script>
@stop


