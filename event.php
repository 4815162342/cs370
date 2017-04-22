<?php
include('/../db.php');
include('/lib/functions.php');

$db->prepare("INSERT INTO events_views (user_agent, IP, event_id) VALUES (?,?,?)")->execute(array(
	$_SERVER['HTTP_USER_AGENT'],
	$_SERVER['REMOTE_ADDR'],
	$event->id
));

$unique_views = uniqueViews($event->id);

$num_saves_prep = $db->prepare("SELECT count(*) FROM events_saved WHERE eid = ?");
$num_saves = $num_saves_prep->execute(array($event->id));
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

?>
<div class="page-header">
	<h1>
		<?=$event->name?> 
		<button class="btn btn-default pull-right">
			<!--glyphicon	should be filled	(so delete the "-empty" part of the class) when someone clicks on the button-->
			<span class="glyphicon glyphicon-heart-empty" onclick="click_result()"></span>
		</button>
	</h1>
	<small><?=$event->date_formatted?></small>
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
	<img id="event-image" class="img-responsive" src="/img/<?=rand(1,4) ?>.jpg">
	<div class="eventorgusername">
		<span class="lefttext2">Organizer:</span>
		TODO
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
		<div><?=$unique_views?> event views</div>
		<div><?=$num_saves?> users have saved this event</div>
	</div>
</div>
