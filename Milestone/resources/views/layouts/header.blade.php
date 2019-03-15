
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" id="index"
		href="/LARAVEL_PROJECTS/Milestone/public/">Home</a>
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
<?php
if (session()->has('admin_role')) {
    if (session()->get('admin_role') == 0) {} else {
        echo '
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Administration </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" id="all_users" href="allUsers">All Users</a> <a
						class="dropdown-item" id="blank" href="blank">TBD</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" id="blank" href="blank">TBD</a> <a
						class="dropdown-item" id="blank" href="blank">TBD</a>
                </li>
			';
    }
}
?>
				
			<li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a>
			</li>
		</ul>
	</div>
			
			<?php
if (session()->has('id') == NULL) {
    echo "
    			<ul class='nav-item active'><a class='nav-link' href='login'>Sign In
    					<span class='sr-only'>(current)</span>
    			</a></ul>
    			<ul class='nav-item active'><a class='nav-link' href='register'>Register
    					<span class='sr-only'>(current)</span>
    			</a></ul>
			";
} else {
    echo "
                <ul class='nav-item dropdown'><a class='nav-link dropdown-toggle'
				href='#' id='navbarDropdown' role='button' data-toggle='dropdown'
				aria-haspopup='true' aria-expanded='false'> " . session()->get('first_name') . " " . session()->get('last_name') . " </a>
				<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
					<a class='dropdown-item' id='profile' href='profile'>Profile</a>
                    <a class='dropdown-item' id='editContact' href='editContact'>Edit Contact</a>
				<div class='dropdown-divider'></div>
                     <a class='dropdown-item' id='blank' href='logout'>Logout</a>
				</div></ul>
                
            ";
}

?>
			<form class="form-inline my-2 my-lg-0" action="blank">
		<input class="form-control mr-sm-2" type="search" placeholder="Search"
			aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	</div>
</nav>