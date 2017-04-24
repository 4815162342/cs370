<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include($_SERVER['DOCUMENT_ROOT']."/lib/functions.php");

$eventName = $_POST['eventName'];
$issue = $_POST['issue'];
$location = $_POST['location'];
$date = $_POST['date'];
$time = $_POST['time'];
$fbLink = $_POST['fbLink'];
$imgURL = $_POST['imgURL'];
$description = $_POST['description'];

$date = $date." ".$time;
$eventURLtemp = explode(" ", $eventName);
$eventURL = '';

$highest = Math.min(3,count($eventURLtemp));
for($i=0; $i < $highest; ++$i){
  $prefix = $i == 0? '' : '-';
  $eventURL .= $prefix . $eventURLtemp[$i];
}

$eventURL_check = $db->prepare("SELECT URL FROM events WHERE URL = ?");
$eventURL_check->execute(array($eventURL));
$eventURL_check = $eventURL_check->fetchColumn();

if($eventURL_check){
  $num = strlen($eventURL)*rand(1, 1000);
  $eventURL .= "".$num;
  $response['URL'] = $eventURL;
}

$db->prepare("INSERT INTO events (name, topic_ids, location_id, date, facebook_id, imgURL, description, URL) VALUES (?,?,?,?,?,?,?)")->execute(array($eventName, $topic_ids, $location_id, $date, $facebook_id, $imgURL, $description, $eventURL));
$event_id = $db->lastInsertId();
$response['id'] = $event_id;
$response['URL'] = $eventURL;

echo json_encode($response);
?>
