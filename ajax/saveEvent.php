<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include($_SERVER['DOCUMENT_ROOT']."/lib/functions.php");

$event_id = intval($_POST['eventToSave']);

$event_prep = $db->prepare("INSERT INTO events_saved (eid,uid) VALUES (?,?)");
$event_prep->execute(array($event_id,$user->id));

echo json_encode(true);
?>
