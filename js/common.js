if (!document.title) document.title = "FindMyProtest";

$.postJSON = (url, data, func) => ($.post(url, data, func, "json"))

function login() {
	var email = document.getElementById('login-email').value;
	var password = document.getElementById('login-password').value;

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

	if(input_error) return;

	$.postJSON("/ajax/log_in.php",{email:email,password:password},function(response){
		if(response.id || response.status=="logged_in"){
			document.cookie="11111="+response.id+"; expires=31 Dec 2019 12:00:00 UTC";
			document.cookie="22222="+response.password+"; expires=31 Dec 2019 12:00:00 UTC";

			document.getElementById('navbar-username').innerHTML = response.first_name;
			document.getElementById('navbar-username').href = `/${response.username}`;
			$('#loginmodal').modal('hide');
			updateViewAfterLogin();
		}
		else if(response.error){
			$("#login-email").addClass("input-error");
		}
	});
}

function createAccount(){
	var first_name = document.getElementById('signup-firstname').value;
	var last_name = document.getElementById('signup-lastname').value;
	var username = document.getElementById('signup-username').value;
	var email = document.getElementById('signup-email').value;
	var password1 = document.getElementById('signup-password1').value;
	var password2 = document.getElementById('signup-password2').value;

	$("#signup-username").removeClass("input-error");
	$("#signup-email").removeClass("input-error");
	$("#signup-password1").removeClass("input-error");
	$("#signup-password2").removeClass("input-error");

	var input_error = false;

	if(!username){
		$("#signup-username").addClass("input-error");
		input_error = true;
	}

	if(!email){
		$("#signup-email").addClass("input-error");
		input_error = true;
	}

	if(!password1){
		$("#signup-password1").addClass("input-error");
		input_error = true;
	}

	if(password1 != password2){
		$("#signup-password2").addClass("input-error");
		input_error = true;
	}

	if(input_error) return;

	var ajaxParams = {
		first_name:	first_name,
		last_name:	last_name,
		username:	username,
		email:		email,
		password:	password1
	};

	$.postJSON("/ajax/create_account.php",ajaxParams,function(response){
		if(response.id || response.status=="logged_in"){
			document.cookie="11111="+response.id+"; expires=31 Dec 2019 12:00:00 UTC";
			document.cookie="22222="+response.password+"; expires=31 Dec 2019 12:00:00 UTC";
			document.getElementById('navbar-username').innerHTML = response.username;
			$('#signupmodal').modal('hide');
			updateViewAfterLogin();
		}
		else if(response.error){
			$("#signup-email").addClass("input-error");
		}
	});
}

function createEvent(){
	var eventName = document.getElementById('create-event-name').value;
	var issue = document.getElementById('create-event-issue').value;
	var location = document.getElementById('create-event-location').value;
	var date = document.getElementById('create-event-date').value;
	var time = document.getElementById('create-event-time').value;
	var fbLink = document.getElementById('create-event-fb-link').value;
	var imgURL = document.getElementById('create-event-URL').value;
	var description = document.getElementById('create-event-description').value;

	$("#create-event-name").removeClass("input-error");
	$("#create-event-issue").removeClass("input-error");
	$("#create-event-location").removeClass("input-error");
	$("#create-event-date").removeClass("input-error");
	$("#create-event-time").removeClass("input-error");
	$("#create-event-fb-link").removeClass("input-error");
	$("#create-event-URL").removeClass("input-error");
	$("#create-event-description").removeClass("input-error");

	var input_error = false;

	if(!name){
		$("#create-event-name").addClass("input-error");
		input_error = true;
	}

	if(!issue){
		$("#create-event-issue").addClass("input-error");
		input_error = true;
	}

	if(!location){
		$("#create-event-location").addClass("input-error");
		input_error = true;
	}

	if(!date){
		$("#create-event-date").addClass("input-error");
		input_error = true;
	}

	if(time){
		$("#create-event-time").addClass("input-error");
		input_error = true;
	}

	if(!fbLink){
		$("#create-event-fb-link").addClass("input-error");
		input_error = true;
	}

	if(!imgURL){
		$("#create-event-URL").addClass("input-error");
		input_error = true;
	}

	if(!description){
		$("#create-event-description").addClass("input-error");
		input_error = true;
	}

	if(input_error) return;

	var ajaxParams = {
		name: name,
		issue:	issue,
		location:	location,
		date:	date,
		time:		time,
		fbLink:	fbLink,
		imgURL:	imgURL,
		description:	description
	};

	$.postJSON("ajax/create_event.php",ajaxParams,function(response){
			$('#createeventmodal').modal('hide');
	});
}

function saveEvent(event_id) {
	$.postJSON("/ajax/saveEvent.php",{eventToSave:event_id},function(response){
		$("#heart_button").removeClass("glyphicon-heart-empty");
		$("#heart_button").addClass("glyphicon-heart");
	});
}

function updateViewAfterLogin() {
	$(".loggedOutContent").hide();
	$(".loggedInContent").show();
}

function logout() {
	document.cookie="11111=; expires=31 Dec 1970 12:00:00 UTC";
	document.cookie="22222=; expires=31 Dec 1970 12:00:00 UTC";

	$(".loggedOutContent").show();
	$(".loggedInContent").hide();
}

function find() {
	var queryString = '/results?';

	var location = $("#location-input").val();
	if (location) queryString += `location=${location}&`;

	var date = $("#date-input").val();
	if (date) queryString += `date=${date}&`;

	var issue = $("#issue-input").val();
	if (issue) queryString += `issue=${issue}&`;

	window.location = queryString;
}

function submitEvent() {
	var issue = $("#create-event-issue").val();
	var location = $("#create-event-locaiton").val();
	var fbLink = $("#create-event-fb-link").val();
	var URL = $("#create-event-URL").val();
}

function contactUs() {
	var first = $("#contactus-firstname").val();
	var last = $("#contactus-lastname").val();
	var email = $("#contactus-email").val();
	var text = $("#contactus-comment").val();

	var params = {
		first_name: first,
		last_name: last,
		email: email,
		content: text,
	};

	$.getJSON("/ajax/contact_us",params,function() {

	});
}
