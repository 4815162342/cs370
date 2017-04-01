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
	global $db;
	$event_id = intval($event_id);
	return $db->query("SELECT COUNT(*) FROM events_views WHERE event_id = $event_id")->fetchColumn();
	//GROUP BY user_agent,IP
}

?>