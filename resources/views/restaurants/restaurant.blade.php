@extends('layouts.master')

@section('title','Restaurant')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/restaurant.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements2.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements2.css">

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
							<form class="form-horizontal col-xs-10 col-xs-offset-3" method="POST" action="/restaurants/restaurant">
							{!! csrf_field() !!}
								<div class="form-group">
									{{-- dynamic buttons --}}
									<div class="input_fields_wrap col-xs-7">
		   								 <button class="btn btn-default add_field_button">Invite More Friends 
		   								</button>
			    						<div>
			    							<input type="text" name="mytext[]" class="col-xs-12 space" placeholder="Friend's Phone #">
			    						</div>
			    					</div>

									
									<div class="form-group col-xs-8 col-xs-offset-7">
										<textarea id="email_body" name="email_body" rows="3" cols="25" placeholder="We're meeting in Olive Garden at 7 pm"></textarea>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    {{-- <script src="../../../public../assets/js/jQuery.js"></script> --}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    {{-- <script src="../../../public/assets/js/bootstrap.min.js"></script> --}}
    
    <script> $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]" class="col-xs-12 space" placeholder="Friend\'s Phone #"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});</script>
@stop