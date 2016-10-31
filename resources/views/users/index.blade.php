@extends('layouts.master')

@section('title','Users')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/user-index.css">
@stop

@section('content')
	<div class="container">
		<div class="row">
			@foreach($users as $user)
				<div class="col-sm-3">
				<div class="list">
					<img src="{{ $user->image }}" id="userImg">
					<h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
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
