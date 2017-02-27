<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");

$email = $_POST['email'];

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$email_check = $db->prepare("SELECT id FROM users WHERE email = ?");
$email_check->execute(array($email));
$email_check = $email_check->fetchColumn();

if($email_check){ // Account already exists
	$user_check = $db->prepare("SELECT id FROM users WHERE email=? AND password=?");
	$user_check->execute(array($email, $hash));
	$user_check = $user_check->fetchColumn();
	
	if($user_check){ // Sign in
		$response['id'] = $user_check;
		$response['password'] = $hash;
	}
	else{// Account exists but password is wrong
		$response['error']="Account with this email already exists";
	}
}
else{ //Making a new account
	$db->prepare("INSERT INTO users (email, password) VALUES (?,?)")->execute(array($email,$hash));
	$user_id = $db->lastInsertId();
	$response['id'] = $user_id;
	$response['password'] = $hash;
}

echo json_encode($response);
?>