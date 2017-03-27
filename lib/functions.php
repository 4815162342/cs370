<?php

function homePageFeeder() {
	$query;
	
	// Validate
	foreach($_GET as $input) {
		switch ($input) {
			case 'location':
				break;
			
		}
	}
}

function uniqueViews($event_id) {
	$event_id = intval($event_id);
	return $db->query("SELECT UNIQUE(user_agent,IP) FROM events_views WHERE event_id = $event_id")->fetchColumn();
}

?>