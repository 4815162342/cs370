<?php
include('../db.php');
include('lib/functions.php');

$query_stirng = 'SELECT * FROM events LEFT JOIN locations ON (events.location_id = locations.id) WHERE 1 ';
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
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" type="text/css" href="/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/css/results.css" />
	<script src="/js/common.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include('navbar.php'); ?>
	<div class="container">

		<div class="row">
			<?php include('search_bar.php'); ?>
		</div>

		<?php
			foreach ($results as $event) { ?>
				<div id="products" class="row list-group">
					<div class="item col-xs-4 col-lg-4">
						<div class="thumbnail">
							<img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
							<div class="caption">
								<h2 class="group inner list-group-item-heading" id="protest-result"><a href="<?=$event->URL?>" id="protest-detail-link">
									<?=$event->name?></a></h2>
								<p class="group inner list-group-item-text">
									<?=$event->date?></p>
								<p class="group inner list-group-item-text"><?=$event->address?></p>
								<div class="row search-result-bottom">
									<div class="col-xs-12 col-md-6">
										<p class="lead"><?=$event->issue_string?></p>
									</div>
									<div class="col-xs-12 col-md-6">
										<!--<a class="btn btn-success red add-button" href="http://www.jquery2dotnet.com">Add to Library</a>-->
										<button class="btn btn-default red add-button" onclick="click_result()" type="button"><span class="add-button">Add to Library</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }

		include('modals/signup.html');
		include('modals/login.html');
		include('modals/about-us.html');
		include('modals/contact-us.html');
		?>
	</div>
</body>
</html>
