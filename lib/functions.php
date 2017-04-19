<?php

if(isset($_COOKIE['11111'])){
	$user_check = $db->prepare("SELECT * FROM users WHERE id=? AND pass = ?");
	$user_check->execute(array($_COOKIE['11111'],$_COOKIE['22222']));
	$user = $user_check->fetchObject();
	
	if(!$user){//ID or password mismatch
		setcookie('11111', null, -1, '/');
		setcookie('22222', null, -1, '/');
	}
}

function uniqueViews($event_id) {
	global $db;
	$event_id = intval($event_id);
	return $db->query("SELECT COUNT(*) FROM events_views WHERE event_id = $event_id")->fetchColumn();
	//GROUP BY user_agent,IP
}
?>