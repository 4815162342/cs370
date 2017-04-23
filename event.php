<?php
include('/../db.php');
include('/lib/functions.php');

$user_id = $user ? $user->id : 0;
$db->prepare("INSERT INTO events_views (user_agent, IP, event_id, user_id) VALUES (?,?,?,?)")->execute(array(
	$_SERVER['HTTP_USER_AGENT'],
	$_SERVER['REMOTE_ADDR'],
	$event->id,
	$user_id
));

$unique_views = uniqueViews($event->id);

$num_saves = $db->query("SELECT COUNT(*) FROM events_saved WHERE eid = $event->id")->fetchColumn();;
$event->date_formatted = date('M jS \a\t g:ia', strtotime($event->date));

$event->topics_array = explode(',', $event->topic_ids);
$event->issues_string = '';
foreach($event->topics_array as $index => $topic_id) {
	$topic_id = intval($topic_id);
	$name = $db->query("SELECT name FROM topics WHERE id = $topic_id")->fetchColumn();
	
	if (count($event->topics_array) == 1)
		$event->issues_string .= $name;
	
	else if (count($event->topics_array) == 2)
		$event->issues_string .= ($index == 0) ? "$name and " : $name;
	
	else {
		if ($index == count($event->topics_array) - 1)
			$event->issues_string .= $name;
		
		else if ($index == count($event->topics_array) - 2)
			$event->issues_string .= "$name, and ";
		
		else
			$event->issues_string .= "$name, ";
	}
}

$loggedOutStyle = $user? 'display: none;': '';
$loggedInStyle = $user? '': 'display: none;';

$event->author = $db->query("SELECT * FROM users WHERE id = $event->user_id")->fetchObject();
?>
<div class="page-header">
	<h1>
		<?=$event->name?> 
		<button class="btn btn-default pull-right loggedInContent">
			<!--glyphicon	should be filled	(so delete the "-empty" part of the class) when someone clicks on the button-->
			<span style="<?=$loggedInStyle?>" class="glyphicon glyphicon-heart-empty" onclick="saveEvent(<?=$event->id?>)"></span>
		</button>
	</h1>
	<h4><?=$event->date_formatted?></h4>
</div>

<div class="col-md-7">
	<table class="table">
		<tbody>
			<tr>
				<th class="lefttext2">Issues</td>
				<td><?=$event->issues_string?></td>
			</tr>
			<tr>
				<th class="lefttext2">Address</td>
				<td><?=$event->address?></td>
			</tr>
			<tr>
				<th class="lefttext2">Description</th>
				<td><?=$event->description?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-5">
	<img id="event-image" class="img-responsive" src="/img/<?=rand(1,14) ?>.jpg">
	<div class="eventorgusername">
		<span class="lefttext2">Organized by <b><?=$event->author->username?></b></span>
	</div>
	<div class="eventfbevent">
		<span class="lefttext2">
			<a href="https://facebook.com/events/<?=$event->facebook_id?>" target="_blank">
				Facebook Event Link
				<span class="glyphicon glyphicon-share"></span>
			</a>
		</span>
	</div>
	<div id="event-stats">
		<div><?=$unique_views?> views</div>
		<div><?=$num_saves?> saves</div>
	</div>
</div>