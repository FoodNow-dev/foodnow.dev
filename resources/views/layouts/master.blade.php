<!DOCTYPE html>

<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Restaurant picker and reviews">
		<meta name="author" content="Ben Roberts, Mittsy Tidwell, Jessica Sattler">
		<meta name="keywords" content="Restaurants, Food, FoodNow">

		<title>@yield('title')</title>

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="FoodNow" />
		<meta property="og:image" content="http://foodnow.dev/assets/img/foodnow.png" />
		<meta property="og:url" content="https://foodnow.com" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="FoodNow" />
		<meta name="twitter:image" content="http://foodnow.dev/assets/img/foodnow.png" />
		<meta name="twitter:url" content="https://foodnow.com" />
		<meta name="twitter:card" content="summary" />
		<meta name="_token" content="{{ csrf_token() }}">

		<!-- Bootstrap Core CSS CDN-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		{{-- Font Awesome --}}
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

		{{-- Animate CSS --}}
		<link rel="stylesheet" type="text/css" href="/assets/css/animate.css">

		{{-- Custom View CSS --}}
		@yield('css')

		{{-- Custom Main CSS --}}
		<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

		<!-- http://fontawesome.io/cdn/success/ -->
        <script src="https://use.fontawesome.com/37f2d2a99c.js"></script>

	</head>
	<body>
		

			@include('partials.navbar')

			@yield('content')
		
		{{-- jQuery --}}
		<script src="/assets/js/jquery-1.11.1.min.js"></script>
		{{-- Bootstrap.js --}}
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		{{-- Custom JS --}}
		@yield('js-script')

	</body>
</html>