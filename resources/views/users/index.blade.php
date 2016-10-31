@extends('layouts.master')

@section('title','Users')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/user-index.css">
@stop

@section('content')
	<div class="search">
	  	<form class="input-group" action="{{ action('UserController@index') }}">
		  	<input type="text" class="form-control" placeholder="&#128270;    Search Name or Email" name="search">
	   		<span class="input-group-btn">
				<button type="button" class="btn btn-primary buttons">Submit</button>
	   		</span>
	  	</form>
	</div>

	<div class="container">
		<div class="row">
			@foreach($users as $user)
				<div class="col-sm-3">
				<div class="list">
					<a href="{{ action('UserController@show', $user->id) }}">
						<img id="userImg" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png'}}">
						<h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
					</a>
				</div>
				</div>
			@endforeach
		</div>
	</div>
	
	{{-- this will build the pages for paginate --}}
	<div class="row text-center">
		{!! $users->render() !!}
	</div>
@stop
