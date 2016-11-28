@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/profile.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 offset-sm-4 text text-center show-box animated flipInX" id="topBox">
						<p class="animated zoomIn">
							<img class="img-circle" id="profile" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}">
						</p>
						<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></h1>

						{{-- Checks to see if they are allowed to see the users email --}}
						@if ($user->id == Auth::id())
							<h4 class="text-center">{{ $user->email }}</h4>
							<h4 class="text-center">{{ $user->phone }}</h4>

							<div class="row">
								<div class="col-sm-2 col-sm-offset-2">
							        {{-- Edit profile --}}
									<a class="btn-link-2" href="{{ action('UserController@edit', $user->id) }}">Edit Profile</a>
								</div>
								<div class="col-sm-1 col-sm-offset-2">
									{{-- Delete profile --}}
									<form method="POST" action="{{ action('UserController@destroy', $user->id) }}" class="delete-form">
						        		{!! csrf_field() !!}
						        		{!! method_field('DELETE') !!}
							        	<button class="btn btn-danger btn-md" id="edit_buttons">Delete</button>
							        </form>
							    </div>
						    </div>
						@else
							{{-- if they are not friends it will show a button where they can be added --}}
							<form method="POST" action="{{ action('UserController@setFriend', 0) }}">
								{!! csrf_field() !!}
								<input type="hidden" name="friend_id" value="{{ $user->id }}">
								<button href="{{ action('UserController@setFriend', $user->id) }}" class="btn">Add Friend</button>
							</form>
						@endif
					</div>

					{{-- Friends list --}}
					<div class="col-sm-5 col-sm-offset-6 text text-center show-box animated flipInX pull-right">
						<h1><strong>Friends List</strong></h1>
						<hr>
						@foreach($friends as $friend) 
							@if($user->id != $friend->id)
								<div class="list">
									<a href="{{ action('UserController@show', $friend->id) }}">
										<img id="userImg" src="{{ (isset($friend->image)) ? $friend->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png'}}">
										<h4>{{ $friend->first_name }} {{ $friend->last_name }}</h4>
									</a>
								</div>
							@endif
						@endforeach
					</div>	

				</div>
			</div>
		</div>
	</div>
@stop



