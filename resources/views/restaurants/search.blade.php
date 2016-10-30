@extends('layouts.master')

@section('title','Landing')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements.css">

	<link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>

@stop

@section('content')
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="text col-sm-6">
						<h1><strong>My Restaurant Preferences:</strong></h1>
						
						<form class="form-horizontal" method="GET" action="{{ action('RestaurantsController@index') }}">
							{!! csrf_field() !!}
							{{-- DISTANCE --}}
							<div class="form-group">
								<label for="distance" class="control-label col-xs-12 col-sm-6 text-left">How far are you willing to go?</label>
								<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
	 								<select name="radius" class="form-control">
										<option value="5">5 miles</option>
										<option value="10">10 miles</option>
										<option value="15">15 miles</option>
										<option value="20">20 miles</option>
									</select>
    							</div>
    						</div>
    						{{-- LOW PRICE --}}
    						<div class="form-group">
    							<label for="price" class="control-label col-xs-12 col-sm-6  text-left">Min Price Level</label>
    							<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
    								<select name="minprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
    						{{-- HIGH PRICE --}}
    						<div class="form-group">
    							<label for="price" class="control-label col-xs-12 col-sm-6 text-left">Max Price Level</label>
    							<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
    								<select name="maxprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
 							</div>
 							{{-- TYPE --}}
 							<div class="form-group">
 								<label for="cuisine" class="control-label col-xs-12 col-sm-6 text-left">What cuisine type are you craving</label>
 									<select name="food" class="form-control">
	 									<option value="american restaurant">American</option>
	    								<option value="breakfast">Breakfast Food</option>
	    								<option value="cajun">Cajun</option>
	    								<option value="chinese">Chinese</option>
	    								<option value="german">German</option>
	    								<option value="indian">Indian</option>
	    								<option value="italian">Italian</option>
	    								<option value="japanese">Japanese/ Sushi</option>
	    								<option value="mediterranean">Mediterranean</option>
	    								<option value="mexican">Mexican</option>
	    								<option value="soul">Soul</option>
	    								<option value="thai">Thai</option>
	    								<option value="vietnamese">Vietnamese</option>
	    								<option value="french restaurant">French</option>
 									</select>
	 							{{-- SUBMIT BUTTON --}}
	 							<div class="col-xs-offset-2 col-xs-6"><button type="submit" class="btn btn-default">Submit</button></div>
 							</div> {{-- ENDS THE TYPE DIV --}}
	 						</div> {{-- ENDS THE PRICE DIV --}}
						</form> {{-- CLOSES THE FORM --}}

						<div class="top-line"></div>
						<div class="bottom-line"></div>
					</div> {{-- CLOSES THE text col-sm-6 --}}

					<div class="text col-xs-6">
						<h1> Let Us Choose Your Dinner Tonight!</h1>
						<br>
						<div>
						    <a href="{{ action('RestaurantsController@showData') }}?random=true">Pick at Random</a>
						</div>
					</div>

					<div class="or">
						OR
					</div>
				</div>
			</div>
		</div>
	</div>
@stop