<?php
$db->prepare("INSERT INTO events_views (user_agent, IP) VALUES (?,?)")->execute(array($_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']));
$unique_views = uniqueViews($event->id);
?>
<!DOCTYPE html>
<html>
<head>
	<base target="_top">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>
<body>
	<?php include('/event.php'); ?>
	<nav class="navbar navbar-static-top">
		<div class="logoimg">
			<a href="#"><img class="logo" src="https://raw.githubusercontent.com/4815162342/cs370/adam-branch/img/logo.png"></a>
			<a href="#" class="sitename"><span class = "sitename">FindMyProtest</span></a>
			<div class="menubutton">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle red" type="button" data-toggle="dropdown">
							<span class="glyphicon glyphicon-menu-down red"></span>
						</button>
					<ul class="dropdown-menu pull-right">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Settings</a></li>
					</ul>
				</div>
			</div>
			<p class="acctparagraph">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginmodal"><span class = "accountbuttons">Log In</span></button>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#signupmodal"><span class = "accountbuttons">Sign Up</span></button>
			</p>
		</div>
		<!-- Sign up Modal -->
	<div id="signupmodal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Sign up Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sign Up</h4>
				</div>
				<div class="modal-body" id="signupmodal">
					<p>First Name:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="John">
					<p>Last Name:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="Doe">
					<p>Username:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="user_name">
					<p>Email:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="example@email.com">
					<p>Password:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="password">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Log In Modal -->
	<div id="loginmodal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Log In Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Log In</h4>
				</div>
				<div class="modal-body" id="modal2">
					<p>Username:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="user_name">
					<p>Password:</p>
					<input type="text" class="form-control" id="modalinputs" placeholder="password">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Log In</button>
				</div>
			</div>
		</div>
	</div>

	</nav>
	<div class="maincont1">
		<div class="maincontimg">
			<img id="protimg" src="https://s-media-cache-ak0.pinimg.com/originals/1d/9e/93/1d9e932c48754a06759e0af3d22a3b6b.jpg">
			<div class="eventorgusername">
				<span class="lefttext2">Event Organizer:</span>
				<a href="#" id="usernametext"><span class="righttext2">exampleusername3000</span></a>
			</div>
			<div class="eventfbevent">
				<span class="lefttext2">Facebook Event Link:</span>
				<a href="#" id="usernametext"><span class="righttext2">www.examplefblink.com</span></a>
			</div>
			<div class="eventinfo">
				<div class="eventviews">
					<span class="lefttext3">All time event views:</span>
					<span class="righttext3">480</span>
				</div>
				<div class="eventsaved">
					<span class="righttext3">80</span>
					<span class="lefttext3">users saved this event</span>
				</div>
			</div>
		</div>
		<div class="mainconttext">
			<div class="protnamediv">
				<span class="protname">Save the pups!</span>
				<button type="button" class="btn btn-default btn-lg btposition">
	<!--glyphicon	should be filled	(so delete the "-empty" part of the class) when someone clicks on the button-->
					<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
</button>
			</div>
			<div class="issue">
				<span class="lefttext">Issue:</span> <span class="righttext">Animal	Rights</span>
			</div>
			<div class="loc">
				<span class="lefttext">Location:</span> <span class="righttext">Eagle's Landing</span>
			</div>
			<div class="datetime">
				<span class="lefttext">Date & Time:</span> <span class="righttext">March 13, 2017 at 2pm</span>
			</div>
			<div class="eventDescription">
				<span class="lefttext">Event Description: </span>
				<br>
				<span class="righttext">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</span>
			</div>
		</div>
	</div>
</body>
</html>
<!--<div id="user_wrapper">
		<div class="col-md-12">
			<h1 class="page-header text-center"><?=$event->name ?></h1>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Host: Alex Lara</h2>
					<h3>Date: <?=$event->date?></h3>
					<h3>Unique views: <?=$unique_views?></h3>
					<table class="table"><tbody>
						<tr><td>
							Planned Parenthood
						</td></tr>
						<tr><td>
							Immigration Restrictions
						</td></tr>
					</tbody></table>
				</div>
			</div>
		</div>
	</div>-->
<script>
</script>
