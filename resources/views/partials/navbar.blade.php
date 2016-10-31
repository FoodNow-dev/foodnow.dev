<nav class="navbar navbar-default navbar-inverse" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ (Auth::check()) ? '/home': '/' }}"><img id="logo" src="/assets/img/foodnow.png"></a>
		</div>

		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a class="hvr-background" href="#">About Us</a></li>
				<li><a class="hvr-background" href="#">Contact Us</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">

			@if(Auth::check())
				<li><p class="navbar-text">Welcome</p></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle hvr-icon-dropdown" data-toggle="dropdown">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} &nbsp;&nbsp;&nbsp;</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ action('UserController@show', Auth::id()) }}">Profile</a></li>
						<li><a href="{{ action('UserController@edit', Auth::id()) }}">Edit Account</a></li>
						<li><a href="#">Settings</a></li>
						<li class="divider"></li>
						<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
					</ul>
				</li>

			@else

		  		{{-- Login Dropdown --}}
				<li><p class="navbar-text">Already have an account?</p></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle hvr-icon-dropdown" data-toggle="dropdown"><b>Login Here &nbsp;&nbsp;&nbsp;</b></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							<div class="row">
								<div class="col-md-12 text-center">
									Login via
									<div class="social-buttons">
										<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
										
									</div>
									or
									<form class="form" role="form" method="post" action="{{ action('Auth\AuthController@postLogin') }}" accept-charset="UTF-8" id="login-nav">
										{{ csrf_field() }}
										<div class="form-group">
											<label class="sr-only" for="email-login">Email address</label>
											<input type="email" class="form-control" id="email-login" name="email" placeholder="Email address" autofocus required>
										</div>
										<div class="form-group">
											<label class="sr-only" for="password-login">Password</label>
											<input type="password" class="form-control" id="password-login" name="password" placeholder="Password" required>
											<div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											<label>
											<input type="checkbox">keep me logged-in
											</label>
										</div>
									</form>
								</div>
								<div class="bottom text-center">
									New here ? <a href="{{-- {{ action('Auth\AuthController@getRegister')}} --}} "><b>Join Us</b></a>
								</div>
							</div>{{-- /.row --}}
						</li>
					</ul>{{-- /.dropdown-menu, /#login-dp --}}
				</li>{{-- /.dropdown --}}
				@endif
			</ul>{{-- /.nav navbar-nav navbar-right --}}
		</div>{{-- /.navbar-collapse --}}
	</div>{{-- /.container-fluid --}}
</nav>