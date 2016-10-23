@extends('layouts.master')

@section('title', 'Welcome')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop


@section('content')

<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 text text-center show-box animated flipInX">
						<p><img src="/img/foodnow.png"></p>
						<h1><strong>FoodNow</strong> Registration Form</h1>
						<div class="description">
							<p>
								This is a free restaurant locator! We can put a slogan or a message or something else here
							</p>
						</div>
						<div class="top-big-link">
							<a class="btn btn-link-1" href="#">Here's a useless Button</a>
							<a class="btn btn-link-2" href="#">Here's another useless Button</a>
						</div>
					</div>
					<div class="col-sm-5 form-box animated flipInY">
						<div class="form-top show-box">
							<div class="form-top-left">
								<h3>Sign up now for FREE</h3>
								<p>Fill in the form below to get instant access:</p>
							</div>
							<div class="form-top-right">
								<i class="fa fa-pencil"></i>
							</div>
						</div>
						<div class="form-bottom show-box">
							<form role="form" action="{{-- {{ action('Auth\AuthController@postRegister') }} --}}" method="post" class="registration-form">
								<div class="form-group">
									<label class="sr-only" for="form-first-name">First name</label>
									<input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name" autofocus>
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-last-name">Last name</label>
									<input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-email">Email</label>
									<input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-address">Street Address</label>
									<input type="text" name="form-address" placeholder="Street Address..." class="form-address form-control" id="form-address">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-city">City</label>
									<input type="text" name="form-city" placeholder="City..." class="form-city form-control" id="form-city">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-state">State</label>
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
								
									<label class="sr-only" for="form-zipcode">Zipcode</label>
									<input type="number" name="form-zipcode" placeholder="Zipcode..." class="form-zipcode form-control" id="form-zipcode">
								</div>
								<div class="form-group">
									<label class="sr-only" for="password">Password</label>
									<input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-confirm-password">Confirm Password</label>
									<input type="password" name="form-confirm-password" placeholder="Confirm Password..." class="form-confirm-password form-control" id="form-confirm-password">
								</div>
								<button type="submit" class="btn btn-register">Sign me up!</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js-script')
	<script src="assets/js/scripts.js"></script>
@stop









