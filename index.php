<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lib/include.php");
?>

<!DOCTYPE html>
<html>

<head>
	<base target="_top">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>

<body>
	<div class="header1">
		<div class="logoimg">
			<a href="#"><img class="logoedits" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg"></a>
			<a href="#" class="productnameedits"><span class = "productnameedits">FindMyProtest</span></a>
			<div class="menubutton">
				<div class="dropdown">
					<p>
						<a href="#">
							<span class="glyphicon glyphicon-menu-down red"></span>
						</a>
					</p>
				</div>
			</div>
			<p style="float: right; margin-top: 30px; margin-right: 5px;">
				<button type="button" class="btn btn-default grey"><span class = "menubutton2">Log in</span></button>
				<button type="button" class="btn btn-default grey"><span class = "menubutton2">Sign up</span></button>
			</p>
		</div>
	</div>
	<div class="content">

		<div class="inputs">
			<div class="logopluspn">
				<div class="logocenter">
					<img class="logoedits" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg">
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="pncenter">
					<span class = "productnameedits2" style = "text-align: center;">FindMyProtest</span>
				</div>
				<div class="desctext">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
						irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.<br><br></p>
				</div>
			</div>
			<input type="text" class="form-control" id="exampleInputName" placeholder="Where">
			<input type="text" class="form-control" id="exampleInputName" placeholder="When">
			<input type="text" class="form-control" id="exampleInputName" placeholder="What issue">
			<button type="button" class="btn btn-default grey2"><span class = "menubutton3">Find</span></button>
		</div>
	</div>
</body>

<script>
	var popularNames = <?=json_encode($db->query("SELECT name FROM events LIMIT 10")->fetchAll(PDO::FETCH_ASSOC)) ?>;
	var dog;
	console.log("testing");
</script>

</html>