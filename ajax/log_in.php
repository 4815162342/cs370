<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");

$email = $_POST['email'];

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user_check = $db->prepare("SELECT id FROM users WHERE email=? AND password=?");
$user_check->execute(array($email, $hash));
$user_check = $user_check->fetchColumn();

if($user_check){ // Sign in
	$response['id'] = $user_check;
	$response['password'] = $hash;
}
else{ // Account exists but password is wrong
	$response['error'] = "That email and password combination didn't match our records.";
}

echo json_encode($response);
?>
