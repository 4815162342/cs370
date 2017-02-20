<?php
include('../db.php');
include('lib/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-static-top">
		<div class="logoimg">
			<a href="#"><img class="logoedits" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg"></a>
			<a href="#" class="productnameedits"><span class = "productnameedits">FindMyProtest</span></a>
			<div class="menubutton">
				<div class="dropdown" id = "dropdownbutton2">
					<button class="btn btn-primary dropdown-toggle red edits" type="button" data-toggle="dropdown">
						<span class="glyphicon glyphicon-menu-down red"></span>
					</button>
					<ul class="dropdown-menu pull-right">
						<li><a href="#">Sample1</a></li>
						<li><a href="#">Sample2</a></li>
						<li><a href="#">Sample3</a></li>
					</ul>
				</div>
			</div>
			<p style="float: right; margin-top: 30px; margin-right: 5px; position: right">
				<button type="button" class="btn btn-default grey" data-toggle="modal" data-target="#myModal2">
					<span class = "menubutton2">Log In</span>
				</button>
				<button type="button" class="btn btn-default grey" data-toggle="modal" data-target="#myModal">
					<span class = "menubutton2">Sign Up</span>
				</button>
			</p>
		</div>
	</nav>
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
					<span class="productnameedits2" style="text-align: center;">FindMyProtest</span>
				</div>
				<div class="desctext">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
						irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.<br><br></p>
				</div>
			</div>
			<input type="text" class="form-control" id="exampleInputName" placeholder="City, State">
			<input type="text" class="form-control" id="exampleInputName" placeholder="MM/DD/YYYY">
			<input type="text" class="form-control" id="exampleInputName" placeholder="Issue or Topic">
			<button type="button" class="btn btn-default grey2"><span class = "menubutton3">Find</span></button>
		</div>
	</div>

	<!-- Sign up Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
	
			<!-- Sign up Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sign Up</h4>
				</div>
				<div class="modal-body" id = "modal1">
					<p>First Name:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="John">
					<br>
					<br>
					<br>
					<p>Last Name:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="Doe">
					<br>
					<br>
					<br>
					<p>Email:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="example@email.com">
					<br>
					<br>
					<br>
					<p>Password:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="Password">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Sign Up</button>
				</div>
			</div>
	
		</div>
	</div>
	
	<!-- Log In Modal -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
	
			<!-- og In Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Log In</h4>
				</div>
				<div class="modal-body" id = "modal2">
					<p>Email:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="example@email.com">
					<br>
					<br>
					<br>
					<p>Password:</p>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="Password">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Log In</button>
				</div>
			</div>
	
		</div>
	</div>

	<script>
		var popularNames = <?=json_encode($db->query("SELECT name FROM events LIMIT 10")->fetchAll(PDO::FETCH_ASSOC)) ?>;
		var dog;
		console.log("testing");
	</script>
</body>
</html>