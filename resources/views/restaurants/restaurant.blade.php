@extends('layouts.master')

@section('title','Restaurant')

@section('css')
	{{-- <link rel="stylesheet" type="text/css" href="/assets/css/restaurant.css"> --}}
	<link rel="stylesheet" href="{{ URL::asset('assets/css/restaurant.css') }}" />
	{{-- <link rel="stylesheet" type="text/css" href="/assets/css/form-elements2.css"> --}}
	<link rel="stylesheet" href="{{ URL::asset('assets/css/form-elements2.css') }}" />
	{{-- <link rel="stylesheet" type="text/css" href="/assets/css/elements2.css"> --}}
	<link rel="stylesheet" href="{{ URL::asset('assets/css/elements2.css') }}" />

	 <script type="text/javascript" src="{{ URL::asset('assets/js/jQuery.js') }}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/additional-methods.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/jessicaScripts.js') }}"></script>
     additional-methods.js') }}"></script>
     {{-- <script type="text/javascript" src="{{ URL::asset('assets/js/messageForm.js') }}"></script> --}}

@stop

@section('content')
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-xs-offset-1 col-sm-5 col-sm-offset-0 text">
						<img src="http://placehold.it/150x150">
						<h1>Restaurant Name</h1>
					</div>
					<div class="col-xs-12 col-xs-offset-1 col-sm-5  text ">
						<img src="http://placehold.it/150x150">
						<h1>Map</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-xs-offset-1 col-sm-5 col-sm-offset-0 text">
						<h1>Update Your Friends Where Dinner Is</h1>
							<form id= "info" class="form-horizontal col-xs-10 col-xs-offset-3" method="POST" action="/restaurants/restaurant">
							{!! csrf_field() !!}
								<div class="form-group">
									{{-- dynamic buttons --}}
									<div class="input_fields_wrap col-xs-7">
		   								 <button class="btn btn-default add_field_button">Invite More Friends 
		   								</button>
			    						<div>
			    							<input type="text" name="mytext[]" id = "mytext[]" class="phone col-xs-12 space" placeholder="Friend's Phone #">
			    						</div>
			    					</div>

									
									<div class="form-group col-xs-8 col-xs-offset-7">
										<textarea id="email_body" name="email_body" rows="3" cols="25" placeholder="">We're meeting in Olive Garden at 7 pm</textarea>
									</div>
									</div>
									<div class="col-xs-6">
										<button type="submit" class="btn btn-primary">Send Message
											<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
										</button>
									</div>
									<div class="col-xs-7">
										@if(session()->has('SUCCESS_MESSAGE'))
										<div class="alert alert-success">
											<p>{{session('SUCCESS_MESSAGE') }}</p>
										</div>
										@endif
				
										@if(session()->has('ERROR_MESSAGE'))
										<div class="alert alert-danger">
											<p>{{session('ERROR_MESSAGE') }}</p>
										</div>
										@endif
									</div>

									<div class="container">  
								   		 @yield('content')
								   </div>
							</form>
					{{-- 			<script>
								$( "#myform" ).validate({
								  rules: {
								    field: {
								      required: true,
								      phoneUS: true
								    }
								  }
								});
								</script> --}}
							    <script>
							    	$.validator.addMethod("cRequired", $.validator.methods.required, "Please provide a phone number");
							    	$.validator.addMethod("cPhone", $.validator.methods.phoneUS, "Please provide a valid U.S. phone number");
							    	$.validator.addClassRules("phone", {cRequired:true, cPhone:true});
							    	// $("#info").validate();
								    $( "#info" ).validate({
								  rules: {
								    email_body: {
								      required: true,
								      minlength: 2
								    }
								    // "mytext[]":{
								    // 	require: true,
								    // 	phoneUS: true
								    // }
  								  }
  								});
  								</script>
						</div>
					
					<div class="col-xs-12 col-xs-offset-1 col-sm-5 col-sm-offset-1 text">
						<h1>Reviews</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
{{--      <script type="text/javascript" src="{{ URL::asset('assets/js/jQuery.js') }}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/additional-methods.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/jessicaScripts.js') }}"></script> --}}

@stop