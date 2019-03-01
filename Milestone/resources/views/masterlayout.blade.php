<!DOCTYPE html>
<html>
<head>
<title>Milestone-256: @yield('title', 'TBD')</title>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous" type="text/javascript"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	crossorigin="anonymous" type="text/javascript"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	crossorigin="anonymous" type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" id="index" href="">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="blank">TBD <span
						class="sr-only">(current)</span></a></li>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"> Administration </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" id="blank" href="blank">TBD</a> <a
							class="dropdown-item" id="blank" href="blank">TBD</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" id="blank" href="blank">TBD</a> <a
							class="dropdown-item" id="blank" href="blank">TBD</a>

					</div></li>
				<li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<li class="nav-item active"><a class="nav-link" href="signin">Sign In
					<span class="sr-only">(current)</span>
			</a></li>
			<li class="nav-item active"><a class="nav-link" href="register">Register
					<span class="sr-only">(current)</span>
			</a></li>
			<form class="form-inline my-2 my-lg-0" action="blank">
				<input class="form-control mr-sm-2" type="search"
					placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>






	@yield('content')


</body>
</html>