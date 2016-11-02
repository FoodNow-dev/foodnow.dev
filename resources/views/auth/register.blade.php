@extends('layouts.master')

@section('title', 'Welcome')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
<!-- Top content -->
	<div class="top-content">
		<div class="container">
			<div class="row">
				<div class="text text-center show-box animated flipInX">
					<p class="animated zoomIn"><img src="/assets/img/foodnow.png"></p>
					<div class="description">
						<p>
							<h1>Welcome to FoodNow!</h1> 
							<p>Can't decide where to eat? No worries, FoodNow can help you by answering 4 simple questions or letting us choose at random for you. Once you have decided, we will send a text to your friends with the restaurant and a link for directions.</p>
						</p>
					</div>
					<hr><br>
					
					<h3>Sign up now for FREE</h3>
					<p>Fill in the form below to get instant access:</p>
					
					<form id="signupForm" role="form" action="{{ action('Auth\AuthController@postRegister') }}" method="POST" class="registration-form" novalidate="">
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
						<button type="submit" class="submit btn btn-register" value="Submit">Sign me up!</button>
					</form>
					<script>
						$("#signupForm").validate();
					</script>
				</div>
			</div> {{-- CLOSES OUT THE ROW --}}
		</div> {{-- CLOSES OUT THE CONTIANER --}}
	</div> {{-- CLOSES OUT TOP-CONTENT --}}
@stop

@section('js-script')
	<script src="assets/js/scripts.js"></script>
  
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/additional-methods.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/signup-form.js') }}"></script>
@stop









