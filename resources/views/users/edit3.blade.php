@extends('layouts.master')

@section('title','Edit Profile')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/user-edit.css">

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
						<form class="form-horizontal col-xs-offset-3" method="POST" action="{{ action('UserController@update', $user->id) }}">
							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="firstName" class="form-control col-xs-offset-3" placeholder="First name..." value="{{ $user->first_name }}" autofocus>
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="lastName" class="form-control" placeholder="Last Name..." value="{{ $user->last_name }}">
								</div>
							</div>

							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="phone" class="form-control" placeholder="Phone Number..." value="{{ $user->phone }}">
								</div>
							</div>
							<div class = "row">
								<div class="form-group col-xs-7 col-sm-10">
									<input type="text" name="email" class="form-control" placeholder="Email..." value="{{ $user->email }}">
								</div>
							</div>
		
							<div class = "row">
								<div class="form-group col-xs-offset-3 col-sm-offset-4 col-sm-6 col-lg-7">
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
							<div class="col-xs-10 col-sm-offset-1  col-md-5 text">
								<div class="row">
								    <div class="form-group">
                        				<label for="image">Profile Picture</label>
                        				
                        				<p class="animated zoomIn"><img class="img-circle" id="profile" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}"></p>
										
                    				</div>
	                       		</div>
								<div class="row">
									<div class="col-xs-8">
                        				<input type="file" name="file[]" id="file" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"/>
										<label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
									</div>
		                    		<div class="col-xs-2">
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

@section('js-script')
	<script type="text/javascript" src="/assets/js/image-uploader.js"></script>
@stop
