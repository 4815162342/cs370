<?php
include('../db.php');
include('lib/functions.php');

// Handle URI
$page_name = false;
$request_uri = str_replace('/', '', $_SERVER['REQUEST_URI']);

// Check if URL is landing_page
if ($request_uri == '')
	$page_name = 'landing_page.php';

// Check if URL is a username
if (!$page_name) {
	$user_prep = $db->prepare("SELECT * FROM users WHERE username = ?");
	$user_prep->execute(array($request_uri));
	$user = $user_prep->fetchObject();
	
	if ($user)
		$page_name = 'user.php';
}

// Check for event URL
if (!$page_name) {
	$event_prep = $db->prepare("SELECT * FROM events WHERE URL = ?");
	$event_prep->execute(array($request_uri));
	$event = $event_prep->fetchObject();
	
	if ($event)
		$page_name = 'event.php';

}

// If none of the others triggered, go to landing_page
if (!$page_name)
	header("LOCATION: /");
?>
<!DOCTYPE html>
<html>
<head>
	<base target="_top">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/js/common.js"></script>
</head>

<body>
	<?php
	include('navbar.php');
	include($page_name);
	include('modals/signup.html');
	include('modals/login.html');
	include('modals/about-us.html');
	include('modals/contact-us.html');
	?>
</body>
</html>
