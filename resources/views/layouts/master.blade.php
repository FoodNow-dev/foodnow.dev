<!DOCTYPE html>

<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="Ben Roberts, Mittsy Tidwell, Jessica Sattler">

		<title>@section('title')</title>

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="" />
		<meta property="og:type" content="" />
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="summary" />

		<!-- Bootstrap Core CSS CDN-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		{{-- Font Awesome --}}
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		{{-- Custom CSS --}}
		<link rel="stylesheet" type="text/css" href="/css/foodnow.css">

	</head>
	<body>

		@include ('partials.navbar')

		@section('content')

		<!-- Jquery.js CDN -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<!-- Angular.js CDN -->
		<script type="text/javascript" src="https://opensource.keycdn.com/angularjs/1.5.8/angular.min.js "></script>
		<!-- Bootstrap.js CDN -->
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</body>
</html>