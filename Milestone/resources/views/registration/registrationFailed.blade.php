@extends('layouts.masterlayout') 

@section('title', 'Register')

@section('content')
<div>
	<div id="register" align="center">
	<h1>Unfortunately, there was an issue registering you! Please, try again!</h1>
	<form action="doregister" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>
	<div>
			First Name:<br> <input name="first_name" type="text" maxlength="25" placeholder ="REQUIRED" required /><br>
		</div>
		<div>
			Middle Name:<br> <input name="middle_name" type="text" maxlength="25" placeholder ="OPTIONAL" /><br>
		</div>
		<div>
			Last Name:<br> <input name="last_name" type="text" maxlength="25" placeholder ="REQUIRED" required /><br>
		</div>
		<div>
			Email:<br> <input name="email" type="email" maxlength="25" placeholder ="REQUIRED" required /><br>
		</div>
		<div>
			Password:<br> <input name="password" type="password" placeholder ="REQUIRED" maxlength="16"
				required /><br>
		</div>
		<div>
			<input name="login" value="Sign In" type="submit" /><br>
		</div>
	</form>
	</div>
</div>
@endsection