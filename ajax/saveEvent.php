<?php
	include($_SERVER['DOCUMENT_ROOT']."/lib/functions.php");
	include($_SERVER['DOCUMENT_ROOT'].'/../db.php');

	function savedEvent($event_id){
		global $user;
		$event_prep = $db->prepare("INSERT INTO events_saved (eid,uid) VALUES (?,?)");
		$event_prep->execute(array($event_id,$user->id));
	}

	savedEvent($_POST['eventToSave']);
?>
