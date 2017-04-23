<?php
include('../db.php');
include('lib/functions.php');

// Handle URI
$page_name = false;
$request_uri = str_replace('/', '', $_SERVER['REQUEST_URI']);

// Check if URL is landing_page
if ($request_uri == '')
	$page_name = 'landing_page';

// Check if URL is a username
if (!$page_name) {
	$user_prep = $db->prepare("SELECT * FROM users WHERE username = ?");
	$user_prep->execute(array($request_uri));
	$userpage_user = $user_prep->fetchObject();
	
	if ($userpage_user)
		$page_name = 'user';
}

// Check for event URL
if (!$page_name) {
	$event_prep = $db->prepare("SELECT * FROM events WHERE URL = ?");
	$event_prep->execute(array($request_uri));
	$event = $event_prep->fetchObject();
	
	if ($event)
		$page_name = 'event';
}
?>
<!DOCTYPE html>
<html>
<head>
	<base target="_top">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="/img/favicon.ico" rel=icon>
	
	<title>FindMyProtest</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<?php
	if (file_exists("css/$page_name.css"))
		echo "<link rel='stylesheet' type='text/css' href='/css/$page_name.css'>";
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/js/common.js"></script>
</head>

<body>
	<?php include('navbar.php'); ?>
	
	<div id="content" class="col-md-8 col-md-offset-2">
		<?php include("$page_name.php"); ?>
	</div>
	
	<?php
	include('modals/login.html');
	include('modals/signup.html');
	include('modals/about-us.html');
	include('modals/contact-us.php');
	include('modals/create-event.php');
	?>
</body>
</html>