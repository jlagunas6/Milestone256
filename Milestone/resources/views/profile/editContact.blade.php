@extends('layouts.masterlayout') 

@section('title', 'Contact Information')

@if(session()->has('id') == NULL)
	@section ('content')
    		<div>
    	<div id="login" align="center">
    	<h3>Unfortunately, in order to update your contact information, you need to sign in!</h3>
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
@else
<?php
			$user_id = session()->get('id');
			?>

@section('content')
<div>
	<div id="editContact" align="center">
	<h1>Update Contact Information!</h1>
	<form action="updateContact" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>
		<div>
			Phone Numer:<br> <input name="phone" type="tel" maxlength="13" placeholder ="(012)345-6789" required/><br>
		</div>
		<div>
			Address Line 1:<br> <input name="ad_lin_1" type="text" maxlength="50" placeholder ="Street Address"  required/><br>
		</div>
		<div>
			Address Line 2:<br> <input name="ad_lin_2" type="text" maxlength="25" placeholder ="Apt/Unit/PO Box"  /><br>
		</div>
		<div>
			City:<br> <input name="city" type="text" placeholder ="Anaheim" maxlength="20" required/><br>
		</div>
		<div>
			State:<br> <input name="state" type="text" placeholder="CA" pattern="[A-Za-z]{2}" required/><br>
		</div>
		<div>
			Postal Code:<br> <input name="zip" type="text" placeholder="92805" maxlength="10" required/><br>
		</div>
		<div>
			<input name="update" value="Update" type="submit" /><br>
		</div>
	</form>
	</div>
</div>
@endsection
@endif