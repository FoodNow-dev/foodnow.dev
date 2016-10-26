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
					<div class=" col-xs-10 col-sm-5 text">
						<h1 class="col-xs-offset-3 col-lg-offset-2"><strong>Edit Profile:</strong></h1>
						<form class="form-horizontal" method="POST" action="#">
							{{-- <label for="firstName" class="col-xs-6 col-lg-5 control-label">First Name:</label> --}}
							<div class="form-group col-xs-6 col-sm-10 col-xs-offset-4">
								<input type="text" name="firstName" class="form-control" placeholder="First name" value="">
							</div>

							{{-- <label for="lastName" class="col-xs-6 col-lg-5 control-label">Last Name:</label> --}}
							<div class="form-group col-xs-10 col-sm-10">
								<input type="text" name="lastName" class="form-control" placeholder="Last name" value="">
							</div>

							{{-- <label for="phone" class="col-xs-6 col-lg-5 control-label">Phone #:</label> --}}
							<div class="form-group col-xs-10 col-sm-10">
								<input type="text" name="phone" class="form-control" placeholder="Phone #"
								value="">
							</div>

							{{-- <label for="state" class="col-xs-6 col-lg-5 control-label">State:</label> --}}
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

							{{-- <label for="city" class="col-xs-6 col-lg-5 control-label">City:</label> --}}
							<div class="form-group col-xs-10 col-sm-10">
								<input type="text" name="city" class="form-control" placeholder="City"
								value="">
							</div>

							{{-- <label for="zipcode" class="col-xs-6 col-lg-5 control-label">ZIP code:</label> --}}
							<div class="form-group col-xs-10 col-sm-10">
								<input type="text" name="zipcode" class="form-control" placeholder="Zipcode"
								value="">
							</div>

							{{-- <label for="password" class="col-xs-6 col-lg-5 control-label">Password:</label> --}}
							<div class="form-group col-xs-offset-3 col-sm-2 col-lg-7">
								<button type="submit" class="btn btn-success">Change Password</button>
							</div>
{{-- 
							<div class="form-group col-xs-offset-3 col-sm-2 col-lg-7">
								<button type="submit" class="btn btn-success">Submit</button>

							</div> --}}

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop