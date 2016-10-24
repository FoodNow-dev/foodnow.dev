@extends('layouts.master')

@section('title','Landing')

{{-- the following section may change if I user custom css --}}
@section('css')
	<link rel="stylesheet" type="text/css" href="/assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/form-elements.css">
@stop

@section('content')
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 text text-center">
						<h1>My Restaurant Preferences:</h1>
						<div class="col-sm-7 text-left">
							<h4>How far are you willing to go?</h4>
							<div class="checkbox">
								<label><input type="checkbox" value="">5 miles</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">10 miles</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">15 miles</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value"">20 miles</label>
							</div>
						</div>
						<div class="col-sm-7 text-left">
							<h4>What is your price range?</h4>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop