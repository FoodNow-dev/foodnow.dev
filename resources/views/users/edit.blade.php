@extends('layouts.master')

@section('title','Edit Profile')

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
					<div class=" col-xs-12 col-sm-6 text">
						<div class = "row">
						<h1 class="col-xs-offset-1 col-md-offset-0"><strong>Edit Profile:</strong></h1>
						</div>
						<form class="form-horizontal" method="POST" action="#">
							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="firstName" class="form-control " placeholder="First name" value="">
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="lastName" class="form-control" placeholder="Last name" value="">
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="phone" class="form-control" placeholder="Phone #"
									value="">
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-10 col-sm-10">
									<select name="form-state" class="form-state form-control" id="form-state">
											<option>State ...</option>
											<option value="AK">Alaska</option>
											<option value="AL">Alabama</option>
											<option value="AR">Arkansas</option>
											<option value="AZ">Arizona</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DC">District of Columbia</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="IA">Iowa</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="MA">Massachusetts</option>
											<option value="MD">Maryland</option>
											<option value="ME">Maine</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MO">Missouri</option>
											<option value="MS">Mississippi</option>
											<option value="MT">Montana</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="NE">Nebraska</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NV">Nevada</option>
											<option value="NY">New York</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="PR">Puerto Rico</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VA">Virginia</option>
											<option value="VT">Vermont</option>
											<option value="WA">Washington</option>
											<option value="WI">Wisconsin</option>
											<option value="WV">West Virginia</option>
											<option value="WY">Wyoming</option>
									</select>
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="city" class="form-control" placeholder="City"
									value="">
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10 col-sm-offset-4">
									<input type="text" name="zipcode" class="form-control" placeholder="Zipcode"
									value="">
								</div>
							</div>

		
							<div class = "row">
								<div class="form-group col-xs-offset-3 col-sm-offset-4 col-sm-6 col-lg-11">
									<button type="submit" class="btn btn-success">Change Password</button>
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-offset-5 col-sm-3 col-lg-11">
									<button type="submit" class="btn btn-success">Submit</button>

								</div>
							</div>
						</form>
					</div>
					<div col-xs-2 col-xs-offset-2 text>
						<form>
							<div class="col-xs-10 col-sm-offset-1 col-lg-5 text">
								<div class="row">
								    <div class="form-group">
                        				<label for="image">Profile Picture</label>
                        				{{-- <img src="http://placehold.it/350x150"> --}}
                        				<p class="animated zoomIn"><img class="img-circle" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}"></p>

                        				<input type="file" class="form-control-file" id="image_url" name="image_url" enctype="multipart/form-data"  aria-describedby="fileHelp">
                       					 <small id="fileHelp" class="form-text text-muted">Add a Profile Picture. Allowed file types are .jpeg, .jpg, .gif, and .png</small>
                    				</div>
								
	                    			<div class="col-xs-7 col-sm-offset-2">
	                           			 <button type="submit" class="btn btn-primary">Submit</button>
	                       		    </div>
	                       		</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop