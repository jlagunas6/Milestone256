@extends('masterlayout') @section('title', 'Sign In')

@section('content')
<div>
	<ul>
		<li><a href=register>Register</a></li>
		<li><a href="#login">Sign In</a></li>
	</ul>
	</form>
	<div id="login"></div>
	<h1>Sign in here!</h1>
	<form action="dologin" method="POST">
		<div>
			Email:<br> <input name="email" type="email" maxlength="25" required /><br>
		</div>
		<div>
			Password:<br> <input name="password" type="password" maxlength="16"
				required /><br>
		</div>
		<div>
			<input name="login" value="Sign In" type="submit" /><br>
		</div>
	</form>
</div>
@endsection
