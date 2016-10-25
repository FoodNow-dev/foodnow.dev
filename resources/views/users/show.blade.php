@extends('layouts.master')

@section('title', 'Profile')

@section('css', '')

@section('content')

<div class="row">
		<div class="col-md-3">
			<p class="lead"><b> {{ $user->name }} </b></p>
			<ul>
				<li>User since {{ $user->created_at->diffForHumans() }} </li>
				<li><a href="mailto:{{  $user->email }}">{{ $user->email }}</a></li>
			
			</ul>
		</div>

		<div class="col-md-9">

			<div class="well show-box">
				@if ($user->id == Auth::id())
					<div class="text-right">
					</div>
				@endif
				<hr>
				
				
					


			</div> <!-- /.well box -->
		</div> <!-- /.col-md-9 -->
	</div> <!-- /.row -->


@stop