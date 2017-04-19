<?php
	$loggedOutStyle = $user? 'display: none;': '';
	$loggedInStyle = $user? '': 'display: none;';
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">
				<img class="logo" src="/img/logo.png">
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">FindMyProtest</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar_collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="loggedOutContent" style="<?=$loggedOutStyle?>">
					<a href="#" data-toggle="modal" data-target="#loginmodal">Log In</a>
				</li>
				<li class="loggedOutContent" style="<?=$loggedOutStyle?>">
					<a href="#" data-toggle="modal" data-target="#signupmodal">Sign Up</a>
				</li>

				<li id="navbar-username" style="<?=$loggedInStyle?>" class="navbar-text loggedInContent">
					<a href="www.findmyprotest.org/<?=$user->username?>"></a>
				</li>
				<li class="loggedInContent" style="<?=$loggedInStyle?>">
					<a href="#" data-toggle="modal" data-target="#createeventmodal">Create Event</a>
				</li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" data-target="#aboutusmodal">About Us</a></li>
						<li><a href="#" data-toggle="modal" data-target="#contactusmodal">Contact Us</a></li>
						<li class="loggedInContent" style="<?=$loggedInStyle?>" role="separator" class="divider"></li>
						<li class="loggedInContent" style="<?=$loggedInStyle?>" onclick="logout()">
							<a href="#">Log Out</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
