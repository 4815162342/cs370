<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$content = $_GET['content'];

$db->prepare("INSERT INTO mail (first_name,last_name,email,content) VALUES (?,?,?,?)")->execute(array(
	$first_name,
	$last_name,
	$email,
	$content
));

echo json_encode(true);
?>