@extends('layouts.masterlayout') 

@section('title', 'Sign In')

@section('content')
<div>
	<div id="login" align="center">
	<h1>Sign in here!</h1>
	<form action="dologin" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>
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
</div>
@endsection
