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
					<div class="col-xm-7 col-sm-offset-5 text">
						<h1><strong>Reset Your Password:</strong></h1>
						<form class="form-horizontal" method="POST" action="#">
							<label for="password" class="col-sm-6 control-label">Type New Password</label>
							<div class="form-group col-sm-6">
								<input type="password" name="password" class="form-control" placeholder="confirm password" value="">
							</div>
							<label for="confirm" class="col-sm-6 control-label">Confirm Password</label>
							<div class="form-group col-sm-6">
								<input type="password" name="confirm" class="form-control" placeholder="confirm password" value="">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop 