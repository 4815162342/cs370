<?php
include('/../db.php');
include('/lib/functions.php');

$db->prepare("INSERT INTO events_views (user_agent, IP) VALUES (?,?)")->execute(array(
	$_SERVER['HTTP_USER_AGENT'],
	$_SERVER['REMOTE_ADDR']
));
$unique_views = uniqueViews($event->id);
$num_saves = db->prepare("SELECT count(uid) FROM events_saved WHERE eid=?");
$num_saves->execute(array($event->id));
$event->date_formatted = date('M jS \a\t g:ia', strtotime($event->date));
?>
<div class="page-header">
	<h1>
		<?=$event->name?>
		<small><?=$event->date_formatted?></small>
		<button class="btn btn-default pull-right">
			<!--glyphicon	should be filled	(so delete the "-empty" part of the class) when someone clicks on the button-->
			<span class="glyphicon glyphicon-heart-empty" onclick="click_result()"></span>
		</button>
	</h1>
</div>

<div class="col-md-7">
	<table class="table">
		<tbody>
			<tr>
				<th>Issues</td>
				<td>TODO</td>
			</tr>
			<tr>
				<th>Location</td>
				<td><?=$event->address?></td>
			</tr>
			<tr>
				<th>Event Description</th>
				<td><?=$event->description?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-5">
	<img id="event-image" class="img-responsive" src="/img/<?=rand(1,4) ?>.jpg">
	<div class="eventorgusername">
		<span class="lefttext2">Event Organizer:</span>
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
