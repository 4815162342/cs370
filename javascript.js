/*Login & Signup call AJAX
Login & Signup validation
Anything else on results + homepage that needs JavaScript*/
var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
function login() {
	var email = $("#login-email").val();
	var password = $("#login-password").val();

	$("#login-email").removeClass("input-error");
	$("#login-password").removeClass("input-error");

	var input_error = false;
	
	if(!email){
		$("#login-email").addClass("input-error");
		input_error = true;
	}
	
	if(!password){
		$("#login-password").addClass("input-error");
		input_error = true;
	}

	if(input_error){
		return;
	}

	var email_check = email.indexOf('@');
	if(email_check > -1){
		email=email.slice(0,email_check);
	}

	$.getJSON("ajax/login.php",{email:email,password:password},function(response){
		if(response.user_id || response.status=="logged_in"){
			document.cookie="11111="+response.user_id+"; expires=31 Dec 2018 12:00:00 UTC";
			document.cookie="22222="+response.password+"; expires=31 Dec 2018 12:00:00 UTC";
			indexLogin();
		}
		else if(response.error){
			$("#login-email").addClass("input-error");
		}
	});
}

function createAccount(){
  var first_name = $("signup-firstname").val();
  var last_name = $("signup-lastname").val();
  var username = $("signup-username").val();
	var email = $("#signup-email").val();
	var password = $("#signup-password").val();

  $("#signup-username").removeClass("input-error");
	$("#signup-email").removeClass("input-error");
	$("#signup-password").removeClass("input-error");

	var input_error = false;

  if(!username){
		$("#signup-username").addClass("input-error");
		input_error = true;
	}

	if(!email){
		$("#signup-email").addClass("input-error");
		input_error = true;
	}

	if(!password){
		$("#signup-password").addClass("input-error");
		input_error = true;
	}

	if(input_error){
		return;
	}

	var email_check = email.indexOf('@');
	if(email_check > -1){
		email=email.slice(0,email_check);
	}

	$.getJSON("ajax/create_account.php",{first_name:first_name,last_name:last_name,username:username,email:email,password:password},function(response){
		if(response.user_id || response.status=="logged_in"){
			document.cookie="11111="+response.user_id+"; expires=31 Dec 2018 12:00:00 UTC";
			document.cookie="22222="+response.password+"; expires=31 Dec 2018 12:00:00 UTC";
			indexLogin();
		}
		else if(response.error){
			$("#signup-email").addClass("input-error");
		}
	});

}

function find() {
  var location = $("#location-input").val();
  var date = $("#date-input").val();
  var issue = $("#input-input").val();

    window.location = "http://adam-sanders.com/results.php?" + "location=" + location + "&" + "date=" + date + "&" + "issue=" + issue; // Redirecting to other page.
    return false;
  }
   // else {
   //   alert("Please try again and enter in the form fields correctly.");
   //   return false;
   // }


function keyword_search() {
   var a = document.getElementById('keyword-search-button');
    a.addEventListener('submit',function(e) {
        e.preventDefault();
        var b = document.getElementById('keyword-form').value;
        window.location.href = 'http://adam-sanders.com/results.php'+b;

    });
}
keyword_search();

 function click_result() {
   var a = document.getElementById('protest-result');
    a.addEventListener('submit',function(e) {
        e.preventDefault();
        var b = document.getElementById('protest-detail-link').value;
        window.location.href = 'http://adam-sanders.com/protest.php'+b;

    });
}
