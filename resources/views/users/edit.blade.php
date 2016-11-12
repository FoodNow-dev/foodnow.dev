@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/user-edit.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')

<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text text-center show-box animated flipInX">
						<form method="POST" action="{{ action('UserController@update', $user->id) }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<p class="animated zoomIn"><img class="img-circle" id="profile" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}"></p>
							<h1><strong>Profile Image</strong></h1>
							
							<div class="top-big-link">
								<input type="file" name="image" id="file" data-multiple-caption="{count} files selected" class="inputfile inputfile-1" accept="image/*">
									<label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Choose a file&hellip;</span></label>
								<button class="btn btn-link-2" type="submit">Submit</button>
							</div>
						</form>
					</div>
					<div class="col-sm-6 form-box animated bounceInRight">
						<div class="form-top show-box">
							<div class="form-top-left">
								<h3>Edit Profile</h3>
								<p>Change the information below:</p>
							</div>
							<div class="form-top-right">
								<i class="fa fa-pencil"></i>
							</div>
						</div>
						<div class="form-bottom show-box">
							<form id="editForm" role="form" action="{{ action('UserController@update', $user->id) }}" method="POST" class="registration-form">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
								<div class="form-group">
									<label class="sr-only" for="first_name">First name</label>
									<input type="text" name="first_name" placeholder="First name..." class="first_name form-control" id="first_name" value="{{ $user->first_name }}">
								</div>
								<div class="form-group">
									<label class="sr-only" for="last_name">Last name</label>
									<input type="text" name="last_name" placeholder="Last name..." class="last_name form-control" id="last_name" value="{{ $user->last_name }}">
								</div>
								<div class="form-group">
									<label class="sr-only" for="email">Email</label>
									<input type="text" name="email" placeholder="Email..." class="email form-control" id="email" value="{{ $user->email }}">
								</div>
								<div class="form-group">
									<label class="sr-only" for="phone">Phone</label>
									<input type="text" name="phone" placeholder="Phone..." class="phone form-control" id="phone" value="{{ $user->phone }}">
								</div>
								
								<div class = "row">
									<div class="form-group">
										<button type="submit" class="btn btn-success">Change Password</button>
			
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							</form>
							<script>
								$("#editForm").validate();
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js-script')
	<script type="text/javascript" src="/assets/js/image-uploader.js"></script>
	  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/jquery.validate.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation-1.15.1/dist/additional-methods.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/js/editScripts.js') }}"></script>
@stop









