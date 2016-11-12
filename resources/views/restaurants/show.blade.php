@extends('layouts.master')

@section('css')

{{-- Custom CSS --}}
	<link rel="stylesheet" type="text/css" href="/assets/css/rest-show.css">

	{{-- Chosen CSS --}}
	<link rel="stylesheet" href="{{ URL::asset('assets/js/chosen_v1.6.2/chosen.min.css') }}"/>

	{{-- Sweet Alerts CSS --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/sweetalert-master/dist/sweetalert.css') }}" />

	{{-- jQuery.js --}}
	<script type="text/javascript" src="{{ URL::asset('assets/js/jQuery.js') }}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    {{-- Bootstrap.js --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    
	{{-- jQuery Validation --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>

    {{-- Additional Methods --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/additional-methods.js') }}"></script>

    {{-- Chosen.js --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/chosen_v1.6.2/chosen.jquery.min.js') }}"></script>

    {{-- Sweet Alerts.js --}}
    <script type="text/javascript" src="{{ URL::asset('assets/sweetalert-master/dist/sweetalert.min.js') }}"></script>
@stop

@section('content')

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 	<div class="modal-dialog" role="document">
		<form id="rest-info" class="form-horizontal" method="POST" action="{{ action('UserController@sendText') }}">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="exampleModalLabel"><b>Create Event</b></h3>
				</div>
				<div class="modal-body">
					{!! csrf_field() !!}
					<div class="form-group row">
					{{-- dropdown --}}
						<div class="col-xs-12">
						 	<select class="my_select_box" data-placeholder="Select Friends" name="mytext[]" multiple>
						 	  	@foreach($friends as $friend)
						 	  		@if($user->id != $friend->id)
						 	  			<option value= {{$friend->phone}}>{{"$friend->first_name $friend->last_name"}}</option>
						 	  		@endif
						 	  	@endforeach 
							</select>
						</div>
						{{-- dynamic input field buttons --}}
						<div class="input_fields_wrap col-xs-12">
							<button class="btn-lg btn-primary add_field_button">Add other numbers</button>
							<div class="form-group row">
								{{-- fields to type phone numbers appears here --}}
							</div>
    					</div>
						<div class="form-group">
							<textarea id="email_body" name="email_body" rows="4" cols="50" placeholder="">{{ Auth::user()->first_name }} is inviting you to {{ $place['name'] }}</textarea>
						</div>
					</div>{{-- /.form-group --}}
			  	</div>{{-- /.modal-body --}}
			  	<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary send">Send Message
						<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</form>
		<script>
			// validation
	    	$.validator.addMethod("cRequired", $.validator.methods.required, "Please provide a phone number");
	    	$.validator.addMethod("cPhone", $.validator.methods.phoneUS, "Please provide a valid U.S. phone number");
	    	$.validator.addClassRules("phone", {cRequired:true, cPhone:true});
		    $( "#rest-info" ).validate({
			  	rules: {
				    email_body: {
				      	required: true,
				      	minlength: 2
				    }
				}
			});
		
			//dropdown
			$(".my_select_box").chosen({
				disable_search_threshold: 1,
				no_results_text: "Oops, nothing found!",
				width: "95%",
				display_selected_options:false
			});

			// sweet alert
		   $(".send").click(function() { 
				swal("Message Sent", "Have a good time!", "success");
			});
		</script>
 	</div>
</div> {{-- end of Modal --}}


<!-- Top content -->
<div class="top-content">
	<div class="inner-bg">
		<div class="row">
			<div class="fixed col-sm-7 col-sm-offset-1 text text-center show-box animated flipInX">
				<div class="row">
					<div class="description">
						<h2><strong>{{ $place['name'] }}</strong></h2>
						<img src="{{ $restRating }}">
						<h4>{{ $place['formatted_phone_number'] }}</h4>
						<h4>
							{{ $place['address_components'][0]['long_name'] }} {{ $place['address_components'][1]['long_name'] }}
						</h4>
					</div>{{-- /.description --}}
				</div>
				<!-- Slider -->
				<div class="row-fluid">
					<div class="span9" id="slider">
						<!-- Top part of the slider -->
						<div class="row-fluid">
							<div class="span2" id="carousel-bounding-box">
								<div id="myCarousel" class="carousel slide">
									<!-- Carousel items -->
									<div class="carousel-inner">
										@foreach($photos as $key => $photo)
											<div class="{{($key == 0)? "active item" : "item" }}"data-slide-number="{{($key + 1)}}">
												<img class="rest-img" src="data:image/gif;base64,{{ $photo }}">
											</div>
										@endforeach
									</div> {{-- CAROUSEL-INNER --}}
								</div> {{-- /.carouselslide --}} 
								<!-- Carousel nav -->
								<div class="carousel-controls-mini">
									<a href="#myCarousel" class="direction btn-link-1" data-slide="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
									<a href="#myCarousel" class="direction btn-link-1" data-slide="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<!--/Slider-->
				<div>
					<button type="button" class="btn-create" data-toggle="modal" data-target="#modal" href="#">Create Event</button>
				</div>
			</div>
			<div class="col-sm-5 col-sm-offset-6 form-box">
				<div id="map">
					{{-- Map Renders Here --}}
				</div>
				@foreach($place['reviews'] as $key => $review) 
					<div class="review-container">
						<div class="col-sm-12 form-bottom show-box">
							<img class="google-profile" src="{{ (isset($review['profile_photo_url'])) ? $review['profile_photo_url'] : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}">
							<div class="review-rest-info text-right">
								<h3><b>{{$review['author_name']}}</b></h3>
								<p>
									<img class="stars" src="{{ $starRating[$key] }}">
								</p>
								<p>
									{{ $time[$key] }}
								</p>
								<br>
								<br>
							</div> {{-- REVIEW-INFO --}}
							<div class="review"> 
								{{ $review['text']}}
								<br>
								<br>
							</div> {{-- REVIEW --}}
						</div> {{-- REVIEW CONTAINER --}}
					</div> {{-- col-sm-12 form-bottom show-box --}}
				@endforeach 
			</div>
		</div>
	</div>
</div>
				

@stop


@section('js-script')

	{{-- Passes Scalar data held in PHP to JS --}}
	<script type="text/javascript">
		var lat = {{ $place['geometry']['location']['lat'] }};
		var lng = {{ $place['geometry']['location']['lng'] }};
	</script>

	{{-- Google Maps API --}}

	{{-- MAIN API --}}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs&libraries=places&callback=initMap" async defer></script>

	<!-- JESSICA API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZU6dw9xUbnO_HXZ07ASIHhMkMHUeqpI4&libraries=places&callback=initMap" async defer></script> --}}
	
	
	{{-- BENS API --}}

	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA49FZPs3ZmqNEQXUfNrgKKoXWihUwnEWQ&libraries=places&callback=initMap" async defer></script> --}}
	
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsi7W3rEJX-pi9_62f6d6x0_Qxt7UhMqI&libraries=places&callback=initMap" async defer></script> --}}
	
	{{-- WHITNEY API --}}
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUdJDrAvhmdwwiSpHNdKdpFTKhyM08q30&libraries=places&callback=initMap" async defer></script> --}}
	
	{{-- Custom JS --}}
	<script type="text/javascript" src="{{ URL::asset('assets/js/rest-show.js') }}"></script>
	{{-- this needs to stay, don't delete (THIS GOES TO THE RANDOM BLADE) --}}
	{{-- <script type="text/javascript" src="{{ URL::asset('assets/js/random.js') }}"></script> --}}

@stop

