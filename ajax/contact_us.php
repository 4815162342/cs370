<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");

$db->prepare("INSERT INTO mail () VALUES ()")->execute(array());

echo json_encode(true);

?>