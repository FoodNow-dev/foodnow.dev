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



