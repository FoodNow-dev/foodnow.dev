<!DOCTYPE html>

<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="description" content="Restaurant picker and reviews">
		<meta name="author" content="Ben Roberts, Mittsy Tidwell, Jessica Sattler">
		<meta name="keywords" content="Restaurants, Food, FoodNow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>@section('title')</title>

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="FoodNow" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="https://foodnow.com" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="FoodNow" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="https://foodnow.com" />
		<meta name="twitter:card" content="summary" />

		<!-- Bootstrap Core CSS CDN-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		{{-- Font Awesome --}}
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

		{{-- Custom Main CSS --}}
		<link rel="stylesheet" type="text/css" href="/css/foodnow.css">

		{{-- Custom View CSS --}}
		@section('css')

	</head>
	<body>

		@include('partials.navbar')

		@section('content')

		@include('partials.footer')

		<!-- jQuery.js CDN -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

		<!-- Bootstrap.js CDN -->
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		@section('js-script')

	</body>
</html>