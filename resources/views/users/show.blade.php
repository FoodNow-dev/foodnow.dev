@extends('layouts.master')

@section('title', 'Profile')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/profile.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')

<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 text text-center show-box animated flipInX">
						<p class="animated zoomIn">
							<img class="img-circle" id="profile" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}">
						</p>
						<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></h1>

						{{-- Checks to see if they are allowed to see the users email --}}
						@if ($user->id == Auth::id())
							<h4 class="text-center">{{ $user->email }}</h4>
							<h4 class="text-center">{{ $user->phone }}</h4>

							<div class="row">
								<div class="col-sm-1 col-sm-offset-2">
							        {{-- Edit profile --}}
									<button class="btn btn-primary btn-md" href="{{ action('UserController@edit', $user->id) }}">Edit Profile</button><br>
								</div>
								<div class="col-sm-1 col-sm-offset-3">
									{{-- Delete profile --}}
									<form method="POST" action="{{ action('UserController@destroy', $user->id) }}" class="delete-form">
						        		{!! csrf_field() !!}
						        		{!! method_field('DELETE') !!}
							        	<button class="btn btn-danger btn-md" id="edit_buttons">Delete</button>
							        </form>
							    </div>
						    </div>
						@else
							<form method="POST" action="{{ action('UserController@setFriend', 0) }}">
								{!! csrf_field() !!}
								<input type="hidden" value="{{ $user->id }}">
								<button href="{{ action('UserController@setFriend', $user->id) }}" class="btn">Add Friend</button>
							</form>
						@endif

					</div>
					<div class="col-sm-5 col-sm-offset-2 text text-center show-box animated flipInX">
						<h1><strong>My Restaurant Reviews</strong></h1>

						<h3> Chilli's Review</h3>
						<ul style="list-style-type:none">
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
						</ul>

						<h3> Hop Doddy's Restaurant Review</h3>
						<ul style="list-style-type:none">
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
						</ul>
						<h3> Olive Garden Review</h3>
						<ul style="list-style-type:none">
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
								<li>lorem ipsum</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
@stop



