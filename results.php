<?php
include('../db.php');
include('lib/functions.php');

$query_stirng = 'SELECT * FROM events LEFT JOIN locations ON (events.location_id = locations.id) WHERE date > NOW() ';
$query_array = [];

foreach ($_GET as $key => $value) {
	switch ($key) {
		case 'location':
			$query_stirng .= 'AND city = ? ';
			$query_array[] = $value;
			break;

		case 'date':
			$query_stirng .= 'AND date BETWEEN (? AND ?) ';
			$timestamp = strtotime($value);
			$query_array[] = date('Y-m-d 00:00:00',$timestamp);
			$query_array[] = date('Y-m-d 23:59:59',$timestamp);
			break;

		case 'issue':
			$query_stirng .= 'AND topic_ids LIKE ? ';
			$query_array[] = "%$value%";
			break;

		default:
			// TODO: make a random, interesting query
			break;
	}
}

$result_prep = $db->prepare($query_stirng);
$result_prep->execute($query_array);
$results = $result_prep->fetchAll(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html>
<head>
	<base target="_top">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/css/results.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/js/common.js"></script>
</head>

<body>
	<?php include('navbar.php'); ?>
	<div class="col-md-10 col-md-offset-1">

		<div>
			<?php include('search_bar.php'); ?>
		</div>

		<?php
			foreach ($results as $event) { 
				$event->date_formatted = date('M jS \a\t g:ia', strtotime($event->date));
			?>
				<div class="col-md-3 event">
					<div class="thumbnail">
						<img src="/img/<?=rand(1,4) ?>.jpg">
						<div class="caption">
							<h3><a href="/<?=$event->URL?>"><?=$event->name?></a></h3>
							<p><?=$event->date_formatted?></p>
							<?php if ($user)
								echo '<p><a href="#" class="btn btn-primary red" onclick="saveEvent()">Save Event</a></p>';
							?>
						</div>
					</div>
				</div>
			<?php }
		
	include('modals/login.html');
	include('modals/signup.html');
	include('modals/about-us.html');
	include('modals/contact-us.php');
	include('modals/create-event.php');
		?>
	</div>
</body>
</html>
