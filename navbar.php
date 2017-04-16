<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">
				<img class="logo" src="/img/logo.png">
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">FindMyProtest</a>
		</div>
		
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="loggedOutContent"><a href="#" data-toggle="modal" data-target="#loginmodal">Log In</a></li>
				<li class="loggedOutContent"><a href="#" data-toggle="modal" data-target="#signupmodal">Sign Up</a></li>
				
				<div id="navbar-username" class="navbar-text"><?=$user->username?></div>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" data-target="#aboutusmodal">About Us</a></li>
						<li><a href="#" data-toggle="modal" data-target="#contactusmodal">Contact Us</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>