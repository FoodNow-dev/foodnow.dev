@extends('layouts.master')

@section('title', 'Profile')

@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/profile.css">
@stop

@section('content')

<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 text text-center show-box animated flipInX">
						<p class="animated zoomIn"><img class="img-circle" src="{{ (isset($user->image)) ? $user->image : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png' }}"></p>
						<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></h1>
						<ul class="profile-list">
							<li>{{ $user->email }}</li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop



