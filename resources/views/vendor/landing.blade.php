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
					<div class="col-sm-6 text">
						<h1>My Restaurant Preferences:</h1>
						<form class="form-horizontal" method="POST" action="#">
							<div class="form-group">
								<label for="distance" class="col-sm-6 control-label">How far are you willing to go?</label>
								<div class="col-sm-6">
     								<select name="distance" class="form-control">
										 <option value="5">5 miles</option>
										 <option value="10">10 miles</option>
										 <option value="15">15 miles</option>
										 <option value="20">20 miles</option>
									</select>
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="price" class="col-sm-6 control-label">What is your price range?</label>
    							<div class="col-sm-6">
    								<select name="price" class="form-control">
    									<option value="1">$</option>
    									<option value="2">$$</option>
    									<option value="3">$$$</option>
    									<option value="4">$$$$</option>
    								</select>
    							</div>
 							</div>
 							<div class="form-group">
 								<label for="cuisine" class="col-sm-6 control-label">What cuisine type are you craving</label>
 								<div class="col-sm-6">
 									<select name="price" class="form-control">

	 									<option value="american">American</option>
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
	    								
 									</select>
 								</div>
 							</div>
						</form>
							{{-- <div class="btn-group" role="group">
								 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							How far are you willing to go?
    							<span class="caret"></span>
    							</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">5 miles</a></li>
									<li><a class="dropdown-item" href="#">10 miles</a></li>
									<li><a class="dropdown-item" href="#">15 miles</a></li>
									<li><a class="dropdown-item" href="#">20 miles</a></li>
								</ul>
							</div>
							<select name="">
								<option value="1">$</option>
								<option value="2">$$</option>

							</select>
						
						<div class="btn-group" role="group">
								 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							What is your price range?
    							<span class="caret"></span>
    							</button>
    							<ul class="dropdown-menu">
    								<li><a class="dropdown-item" href="#">$</a></li>
    								<li><a class="dropdown-item" href="#">$$</a></li>
    								<li><a class="dropdown-item" href="#">$$$</a></li>
    								<li><a class="dropdown-item" href="#">$$$$</a></li>
    							</ul>
						</div>
						<div class="btn-group" role="group">
								 <button class="btn  btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							What cuisine are you craving?
    							<span class="caret"></span>
    							</button>
    							<ul class="dropdown-menu">
    								<li><a class="dropdown-item" href="#">American</a></li>
    								<li><a class="dropdown-item" href="#">Breakfast Food</a></li>
    								<li><a class="dropdown-item" href="#">Cajun</a></li>
    								<li><a class="dropdown-item" href="#">Chinese</a></li>
    								<li><a class="dropdown-item" href="#">German</a></li>
    								<li><a class="dropdown-item" href="#">Indian</a></li>
    								<li><a class="dropdown-item" href="#">Italian</a></li>
    								<li><a class="dropdown-item" href="#">Japanese/ Sushi</a></li>
    								<li><a class="dropdown-item" href="#">Meditterranean</a></li>
    								<li><a class="dropdown-item" href="#">Mexican</a></li>
    								<li><a class="dropdown-item" href="#">Soul</a></li>
    								<li><a class="dropdown-item" href="#">Thai</a></li>
    								<li><a class="dropdown-item" href="#">Vietnamese</a></li>
    							</ul>
						<button type="button" class="btn btn-default">Submit</button>							
						</div> --}}
						{{-- <div class=" col-sm-6"> --}}
						{{-- 	<p>Hello</p>
						</div> --}} 
					</div>
				</div>
			</div>
		</div>
	</div>
@stop