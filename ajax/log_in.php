<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");

$email = $_POST['email'];

$user_check = $db->prepare("SELECT * FROM users WHERE email = ?");
$user_check->execute(array($email));
$user = $user_check->fetchObject();

if($user){
	
	if (password_verify($_POST['password'], $user->pass)) {
		$response['id'] = $user->id;
		$response['username'] = $user->username;
		$response['password'] = $user->pass;
	}
	else
		$response['error'] = "That email and password combination didn't match our records.";
}
else
	$response['error'] = "That email and password combination didn't match our records.";

echo json_encode($response);
?>
