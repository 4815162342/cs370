<?php
include('../db.php');
include('lib/functions.php');

$query = [];

foreach ($_GET as $key => $value) {
	switch ($key) {
		case 'location':
		case 'date':
		case 'issue':
			$query[$key] = $value;
			break;
		default:
			// TODO: make a random, interesting query
			break;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" type="text/css" href="css/results.css" />
	<script src="javascript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-static-top">
		<div class="logoimg">
			<a href="/"><img class="logo" src="img/logo.png"></a>
			<a href="/" class="sitename"><span class = "sitename">FindMyProtest</span></a>
			<div class="menubutton">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle red" type="button" data-toggle="dropdown">
							<span class="glyphicon glyphicon-menu-down red"></span>
						</button>
					<ul class="dropdown-menu pull-right ">
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
	</nav>
	<?php
	include('modals/signup.html');
	include('modals/login.html');
	?>

	<div class="container-fluid">
		<div class="row">
			<?php
			include('search_bar.php');
			?>
		</div>

		<div class="container">
			<div id="products" class="row list-group">
				<div class="item	col-xs-4 col-lg-4">
					<div class="thumbnail">
						<img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
						<div class="caption">
							<h2 class="group inner list-group-item-heading" id="protest-result"><a href id="protest-detail-link">
								[PROTEST TITLE]</a></h2>
							<p class="group inner list-group-item-text">
								MM/DD/YYYY</p>
							<p class="group inner list-group-item-text">ADDRESS</p>
							<div class="row search-result-bottom">
								<div class="col-xs-12 col-md-6">
									<p class="lead">
										[ISSUE]</p>
								</div>
								<div class="col-xs-12 col-md-6">
									<a class="btn btn-success red add-button" href="http://www.jquery2dotnet.com">Add to Library</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script>
		var popularNames = <?=json_encode($db->query("SELECT name FROM events LIMIT 10")->fetchAll(PDO::FETCH_ASSOC)) ?>;
		var dog;
		console.log("testing");
	</script>
</body>
</html>
