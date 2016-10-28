@extends('layouts.master')

@section('title','Landing')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements.css">

@stop

@section('content')
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 text">
						<h1><strong>My Restaurant Preferences:</strong></h1>
						
						<form class="form-horizontal" method="GET" action="{{ action('RestaurantsController@index') }}">
							{!! csrf_field() !!}
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
    						<div class="form-group">
    							<label for="price" class="col-xs-12 col-sm-6 control-label text-left">Min Price Level</label>
    							<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
    								<select name="minprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
    							<label for="price" class="col-xs-12 col-sm-6 control-label text-left">Max Price Level</label>
    							<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
    								<select name="maxprice" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
 							</div>
 							<div class="form-group">
 								<label for="cuisine" class="col-xs-12 col-sm-6 control-label text-left">What cuisine type are you craving</label>
 								<div class="col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
 									<select name="food" class="form-control">

	 									<option value="american restaurant">American</option>
	    								<option value="breakfast">Breakfast Food</option>
	    								<option value="cajun">Cajun</option>
	    								<option value="chinese">Chinese</option>
	    								<option value="german">German</option>
	    								<option value="indian">Indian</option>
	    								<option value="italian">Italian</option>
	    								<option value="japanese">Japanese/ Sushi</option>
	    								<option value="mediterranean">Meditterranean</option>
	    								<option value="mexican">Mexican</option>
	    								<option value="soul">Soul</option>
	    								<option value="thai">Thai</option>
	    								<option value="vietnamese">Vietnamese</option>
	    								<option value="french restaurant">French</option>

 									</select>
 								</div>
 							</div>
 							<div class="col-xs-offset-2 col-xs-6"><button type="submit" class="btn btn-default">Submit</button></div>
						</form>
					</div>
					<div class="col-sm-5 col-sm-offset-1 text">
						<h1>OR....</h1>
						<h1> Let Us Choose Your Dinner Tonight!</h1>
						<br>
						<div class="col-xs-6 col-xs-offset-3" >
						    <button type="submit" class="btn btn-default">Pick at Random
						    </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop