<?php
include('../db.php');
include('lib/functions.php');
?>

<!DOCTYPE html>
<html>

<head>
  <base target="_top">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>

<body>
  <nav class="navbar navbar-static-top">
    <div class="logoimg">
      <a href="/"><img class="logo" src="img/logo.png"></a>
      <a href="/" class="sitename"><span class = "sitename">FindMyProtest</span></a>
      <div class="menubutton">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle red" type="button" data-toggle="dropdown">
              <span class="glyphicon glyphicon-menu-down red"></span>
            </button>
          <ul class="dropdown-menu pull-right">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Settings</a></li>
          </ul>
        </div>
      </div>
      <p class="acctparagraph">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginmodal"><span class = "accountbuttons">Log In</span></button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#signupmodal"><span class = "accountbuttons">Sign Up</span></button>
      </p>
    </div>
  </nav>

  <div class="homepagecontent">
    <div class="logopndesc">
      <div class="logocenter">
        <img class="logo" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg">
      </div>

      <div class="pncenter">
        <span>FindMyProtest</span>
      </div>

      <div class="desctext">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.<br><br></p>
      </div>
    </div>
    <input type="text" class="form-control" id="exampleInputName" placeholder="City, State">
    <input type="text" class="form-control" id="exampleInputName" placeholder="MM/DD/YYYY">
    <input type="text" class="form-control" id="exampleInputName" placeholder="Issue or Topic">
    <button type="button" class="btn btn-default findbutton"><span class = "findtext">Find</span></button>
  </div>

  <!-- Sign up Modal -->
  <div id="signupmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Sign up Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body" id="signupmodal">
          <p>First Name:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="John">
          <p>Last Name:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="Doe">
          <p>Username:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="user_name">
          <p>Email:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="example@email.com">
          <p>Password:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sign Up</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Log In Modal -->
  <div id="loginmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Log In Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log In</h4>
        </div>
        <div class="modal-body" id="modal2">
          <p>Username:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="user_name">
          <p>Password:</p>
          <input type="text" class="form-control" id="modalinputs" placeholder="password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Log In</button>
        </div>
      </div>

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
