<?php
include('../db.php');
include('lib/functions.php');
?>

<!DOCTYPE html>
<!--<!DOCTYPE html>-->
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
  <link rel="stylesheet" type="text/css" href="css/results.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <ul class="dropdown-menu pull-right ">
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-mid-12">
        <div class="input-group" id="adv-search">
          <input type="text submit" class="form-control" id="keyword-form" placeholder="Search for Protests" />
          <div class="input-group-btn">
            <button type="button" class="btn btn-primary red searchiconspacing" id="keyword-search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </div>
          <!-- Sort by button -->
          <div class="btn-group">
            <button type="button" class="btn red dropdown-toggle sortbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Sort By <span class="caret"></span>
						</button>
            <ul class="dropdown-menu sort-menu">
              <li><a href="#">Location</a></li>
              <li><a href="#">Date</a></li>
              <li><a href="#">Issue</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div id="products" class="row list-group">
        <div class="item	col-xs-4 col-lg-4">
          <div class="thumbnail">
            <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
            <div class="caption">
              <h2 class="group inner list-group-item-heading" id="protest-result"><a href id="protest-detail-link">
                [PROTEST TITLE]</a></h2>
              <p class="group inner list-group-item-text">
                [PRODUCT DESCRIPTION] Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              <div class="row search-result-bottom">
                <div class="col-xs-12 col-md-6">
                  <p class="lead">
                    [ISSUE]</p>
                </div>
                <div class="col-xs-12 col-md-6">
                  <a class="btn btn-success red add-button" href="http://www.jquery2dotnet.com">Add to Library</a>
                </div>
              </div>
            </div>
          </div>
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
