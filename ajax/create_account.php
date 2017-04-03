<?php
include($_SERVER['DOCUMENT_ROOT'].'/../db.php');
include($_SERVER['DOCUMENT_ROOT']."/lib/functions.php");

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$email_check = $db->prepare("SELECT id FROM users WHERE email = ?");
$email_check->execute(array($email));
$email_check = $email_check->fetchColumn();

$username_check = $db->prepare("SELECT id FROM users WHERE username = ?");
$username_check->execute(array($username));
$username_check = $username_check->fetchColumn();

if($email_check || $username_check){ // Account already exists
	$user_check = $db->prepare("SELECT id FROM users WHERE email = ? AND password=?");
	$user_check->execute(array($email, $hash));
	$user_check = $user_check->fetchColumn();
	
	if($user_check){ // Sign in
		$response['id'] = $user_check;
		$response['password'] = $hash;
	}
	else{// Account exists but password is wrong
		$response['error']="Account with this email or username already exists";
	}
}
else { //Making a new account
	$db->prepare("INSERT INTO users (email, password, first_name, last_name, username) VALUES (?,?,?,?,?)")->execute(array($email, $hash,$first_name, $last_name, $username));
	$user_id = $db->lastInsertId();
	$response['id'] = $user_id;
	$response['password'] = $hash;
}

echo json_encode($response);
?>