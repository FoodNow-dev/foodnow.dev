@extends('layouts.master')

@section('title','Password Reset')

@section('css')

	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements.css">

@stop

@section('content')
<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 text">
						<h1 class="col-xs-offset-3 col-lg-offset-2"><strong>Reset Your Password</strong></h1>
						<form class="form-horizontal" method="POST" action="#">
							<label for="password" class="col-xs-6 col-lg-5 control-label">New Password:</label>
							<div class="form-group col-xs-6 col-sm-6">
								<input type="password" name="password" class="form-control" placeholder="password" value="">
							</div>
							<label for="confirm" class="col-xs-6 col-lg-5 control-label">Confirm Password:</label>
							<div class="form-group col-xs-6 col-sm-6">
								<input type="password" name="confirm" class="form-control" placeholder="password" value="">
							</div>
							<div class="col-xs-offset-4 col-lg-8"><button type="submit" class="btn btn-success">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop 