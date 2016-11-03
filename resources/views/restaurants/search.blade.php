@extends('layouts.master')

@section('title','Landing')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/search.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	{{-- THIS LINK IF FOR THE 'OR' --}}
	<link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
@stop

@section('content')
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="text col-xs-12 col-md-6">
						<h1><strong>My Restaurant Preferences:</strong></h1>
						
						<form class="form-horizontal" method="GET" action="{{ action('RestaurantsController@index') }}">
							{!! csrf_field() !!}
							{{-- DISTANCE --}}
							<div class="form-group">
								<label for="distance" class="col-xs-2 col-md-4">Distance</label>
								<div class="col-xs-8">
	 								<select name="radius" class="form-control">
										<option value="5">5 miles</option>
										<option value="10">10 miles</option>
										<option value="15">15 miles</option>
										<option value="20">20 miles</option>
									</select>
    							</div>
    						</div>
 							{{-- TYPE --}}
 							<div class="form-group">
 								<label for="cuisine" class="col-xs-2 col-md-4">Cuisine</label>
 								<div class="col-xs-8">
 									<select name="food" class="form-control">
	 									<option value="american restaurant">American</option>
	    								<option value="breakfast restaurant">Breakfast Food</option>
	    								<option value="cajun restaurant">Cajun</option>
	    								<option value="chinese restaurant">Chinese</option>
	    								<option value="german restaurant">German</option>
	    								<option value="indian restaurant">Indian</option>
	    								<option value="italian restaurant">Italian</option>
	    								<option value="japanese restaurant">Japanese/ Sushi</option>
	    								<option value="mediterranean restaurant">Meditterranean</option>
	    								<option value="mexican restaurant">Mexican</option>
	    								<option value="soul restaurant">Soul</option>
	    								<option value="thai restaurant">Thai</option>
	    								<option value="vietnamese restaurant">Vietnamese</option>
	    								<option value="french restaurant">French</option>
 									</select>
 								</div>
 							</div>
    						{{-- LOW PRICE --}}
    						<div class="form-group">
    							<label for="price" class="col-xs-2 col-md-4">Min Price</label>
    							<div class="col-xs-8">
    								<select name="minprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
    						</div>
    						{{-- HIGH PRICE --}}
    						<div class="form-group">
    							<label for="price" class="col-xs-2 col-md-4">Max Price</label>
    							<div class="col-xs-8">
    								<select name="maxprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
 							</div>
 							{{-- SUBMIT BUTTON --}}
 							<div class="col-xs-8 col-md-6 col-xs-offset-2"><button type="submit" class="btn"><b>Submit</b></button></div>
						</form> {{-- CLOSES THE FORM --}}

					</div> {{-- CLOSES THE text col-sm-6 --}}
					<div class="or">
						OR
					</div>

					<div class="text col-xs-12 col-lg-6">
						<h1> <strong>Let Us Choose For You:</strong></h1>

						<br>
						<div>
						    <a class="random-btn btn" href="{{ action('RestaurantsController@showData') }}?random=true">Random</a>
						</div>
						<div class="right-line"></div>
						<div class="left-line"></div>
						<div class="top-line"></div>
						<div class="bottom-line"></div>
					</div>
				</div>{{-- /.row --}}
			</div>{{-- /.container --}}
		</div>{{-- /.inner-bg --}}
	</div>{{-- /.top-content --}}
@stop