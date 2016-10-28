@extends('layouts.master')

@section('title','Restaurant')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements.css">

@stop

@section('content')
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-5 text">
						<img src="http://placehold.it/250x150">
						<h1>Restaurant Name</h1>
					</div>
					<div class="col-xs-10 col-sm-5 col-sm-offset-2 text ">
						<img src="http://placehold.it/250x150">
						<h1>Map</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-10 col-sm-5 text">
						<h1>Update Your Friends Where Dinner Is</h1>
						<form class="form-horizontal col-xs-10 col-xs-offset-3" method="POST" action="/restaurants/restaurant">
						{!! csrf_field() !!}
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendName1" class="form-control" placeholder="Friend's name" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendPhone1" class="form-control" placeholder="Friend's phone #" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" name="friendName2" class="form-control" placeholder="Friend's name" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<input type="text" id = "friendPhone2" name="friendPhone2" class="form-control" placeholder="Friend's phone #" value="">
							</div>
							<div class="form-group col-xs-8 col-xs-offset-7">
								<textarea id="email_body" name="email_body" rows="3" cols="25" placeholder="We're meeting in Olive Garden at 7 pm"></textarea>
							</div>

							<div class="col-xs-6">
								<button type="submit" class="btn btn-primary">Send Message</button>
							</div>

						</form>
					</div>
					<div class="col-xs-10 col-sm-5 col-sm-offset-2 text ">
						<h1>Reviews</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop