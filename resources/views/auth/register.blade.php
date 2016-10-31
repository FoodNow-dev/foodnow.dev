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
						<p class="animated zoomIn"><img src="/assets/img/foodnow.png"></p>
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
					<div class="col-sm-5 form-box animated bounceInRight">
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
							<form id="signupForm" role="form" action="{{ action('Auth\AuthController@postRegister') }}" method="POST" class="registration-form">
								{!! csrf_field() !!}
								<div class="form-group">
									<label class="sr-only" for="first_name">First name</label>
									<input type="text" name="first_name" placeholder="First name..." class="first_name form-control" id="first_name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="last_name">Last name</label>
									<input type="text" name="last_name" placeholder="Last name..." class="last_name form-control" id="last_name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="email">Email</label>
									<input type="email" name="email" placeholder="Email..." class="email form-control" id="email">
								</div>
								<div class="form-group">
									<label class="sr-only" for="phone">Phone</label>
									<input type="text" name="phone" placeholder="Phone..." class="phone form-control" id="phone">
								</div>
								
								<div class="form-group">
									<label class="sr-only" for="password">Password</label>
									<input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
								</div>
								<div class="form-group">
									<label class="sr-only" for="password_confirmation">Confirm Password</label>
									<input type="password" name="password_confirmation" placeholder="Confirm Password..." class="password_confirmation form-control" id="password_confirmation">
								</div>
								<button type="submit" class="submit btn btn-register">Sign me up!</button>
							</form>
							<script>
								$("#signupForm").validate();
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js-script')
	<script src="assets/js/scripts.js"></script>
	{{-- jQuery validation files --}}
	<script type="text/javascript" src="{{ URL::asset('assets/js/jQuery.js') }}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/signup-form.js') }}"></script>
@stop









