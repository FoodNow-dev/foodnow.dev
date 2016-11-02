@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/rest-show.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create Event</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Recipient:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Message:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn" data-dismiss="modal">Close</button>
				<button type="button" class="btn">Send message</button>
			</div>
		</div>
 	</div>
</div>


<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
				<div class="row">
					<div class="fixed col-sm-7 col-sm-offset-1 text text-center show-box animated flipInX">
					<div class="row">
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
										</div>
							  
									</div>
								  
									<!-- Carousel nav -->
									<div class="carousel-controls-mini">
										<a href="#myCarousel" class="direction" data-slide="prev">‹</a>
										<a href="#myCarousel" class="direction" data-slide="next">›</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<br>
					<!--/Slider-->
				<div class="top-big-link">
					<button type="button" class="btn" data-toggle="modal" data-target="#modal" href="#">Create Event</button>
				</div>
					
				</div>
					
					<div class="col-sm-4 col-sm-offset-7 form-box animated fadeInRight">
						<div id="map"></div>
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
										<br>
									</div>
									<div class="review"> 
										{{ $review['text']}}
										<br>
										<br>
									</div>
								</div>
							</div>
							
						@endforeach

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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUdJDrAvhmdwwiSpHNdKdpFTKhyM08q30	&libraries=places&callback=initMap" async defer></script>
@stop


