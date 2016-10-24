@extends('layouts.master')

@section('title','Landing')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 text">
						<h1>My Restaurant Preferences:</h1>
						<div class="col-sm-7 text-left">
							<div class="btn-group">
								<button type="button" class="btn btn-danger">How far are you willing to go?</button>
								<button type="button" class="btn bth-danger dropdown-toggle dropdown-tog">
									<span class="sr-only">Toggle Drowpdown</span>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">5 miles</a>
									<a class="dropdown-item" href="#">Another action</a>
									{{-- 	<label><input type="checkbox" value="">5 miles</label>
									</div> --}}
								{{-- 	<div class="checkbox">
										<label><input type="checkbox" value="">10 miles</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" value="">15 miles</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" value"">20 miles</label>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-sm-7 text-left">
							<h4>What is your price range?</h4>
							<div class="checkbox">
								<label><input type="checkbox" value="">$</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">$$</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">$$$</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">$$$$</label>
							</div>
						</div>
						<div class="col-sm-7 text-left">
							<h4>What cuisine are you craving?</h4>
							<div class="checkbox">
								<label><input type="checkbox" value="">American</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Breakfast Food</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Cajun</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Chinese</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">German</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Indian</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Italian</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Japanese/Sushi</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Mediterranean</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Mexican</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Soul</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Thai</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">Vietnamese</label>
							</div>
					 	<button type="button" class="btn btn-primary center-block">Submit</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop