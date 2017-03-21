<<<<<<< HEAD
<!--<!DOCTYPE html>-->
=======
<?php

include('../db.php');

include('lib/functions.php');



// Handle URI

$page_name = false;

$request_uri = str_replace('/', '', $_SERVER['REQUEST_URI']);



// Check if URL is landing_page

if ($request_uri == '')

	$page_name = 'landing_page.php';



// Check if URL is a username

if (!$page_name) {

	$user_prep = $db->prepare("SELECT * FROM users WHERE username = ?");

	$user_prep->execute(array($request_uri));

	$user = $user_prep->fetchObject();

}



// TODO: Check for event URL

if (!$page_name) {

}



// If none of the others triggered, go to landing_page

$page_name = 'landing_page.php';

?>

<!DOCTYPE html>

>>>>>>> refs/remotes/origin/master
<html>



<head>
<<<<<<< HEAD
  <base target="_top">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
=======

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="javascript.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

>>>>>>> refs/remotes/origin/master
</head>



<body>
<<<<<<< HEAD
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#buttons">
          <span class="icon-"></span>
      </button>
      <a href="#"><img class="logo" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg"></a>
      <a href="#" class="navbar-brand">FindMyProtest</a>
      </div>
      
      <div class = "collapse navbar-collapse" id="buttons">
        <ul class="nav navbar-nav navbar-right">
          <li class="buttonright"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginmodal"><span class = "accountbuttons">Log In</span></button> </li>
          <li class="buttonright"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#signupmodal"><span class = "accountbuttons">Sign Up</span></button> </li>
          <li class="buttonright"><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle red" type="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-menu-down red"></span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Settings</a></li>
            </ul>
          </div></li>
        </ul>
     </div>
  </div>
</nav>

  <!-- main content-->
  <div class="container-fluid">
    <div class="row" style="margin-top: 100px;">
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <div class="productimage"><img class="logo" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg"></div>
          <h1 style="font-size: 2.8em;">FindMyProtest</h1>
          <p style = "text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.</p>
      </div>
      <div class="col-md-2"></div>
    </div>
      <div class="row" style="margin: 20px 0px 0px 32px;">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       <form action="">
         <div class="input-group">
         <input type="text" class="form-control" id="location" placeholder="City, State">
         <input type="text" class="form-control" id="date" placeholder="MM/DD/YYYY">
         <input type="text" class="form-control" id="issue" placeholder="Issue or Topic">
         <button type="button" class="btn btn-default findbutton"><span class = "findtext">Find</span></button>
       </div>
       </form>
     </div>
     <div class="col-md-2"></div>
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
          <input type="text" class="form-control modalinputs" id="login_username" placeholder="user_name">
          <p>Password:</p>
          <input type="password" class="form-control modalinputs" id="login_signup" placeholder="password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="login_submit" data-dismiss="modal">Log In</button>
        </div>
      </div>

    </div>
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
          <input type="text" class="form-control modalinputs" id="firstname" placeholder="John">
          <p>Last Name:</p>
          <input type="text" class="form-control modalinputs" id="lastname" placeholder="Doe">
          <p>Username:</p> 
          <input type="text" class="form-control modalinputs" id="signup_username" placeholder="user_name">
          <p>Email:</p>
          <input type="email" class="form-control modalinputs" id="email" placeholder="example@email.com">
          <p>Password:</p>
          <input type="password" class="form-control modalinputs" id="signup_pw" placeholder="password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="signup_submit" data-dismiss="modal">Sign Up</button>
        </div>
      </div>

    </div>
  </div>
  
  </div>
  </div>
</body>

</html>
=======

	<?php

	include('navbar.php');

	include($page_name);



	include('modals/signup.html');

	include('modals/login.html');

	?>

</body>

</html>
>>>>>>> refs/remotes/origin/master
