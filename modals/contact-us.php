<div id="contactusmodal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Contact Us</h4>
			</div>
			<div class="modal-body" id="contactusmodal2">
				<p>First Name:</p>
				<input type="text" class="form-control modalinputs" id="contactus-firstname" placeholder="Enter your first name" value="<?=$user->first_name?>">
				<p>Last Name:</p>
				<input type="text" class="form-control modalinputs" id="contactus-lastname" placeholder="Enter your last name" value="<?=$user->last_name?>">
				<p>Email:</p>
				<input type="text" class="form-control modalinputs" id="contactus-email" placeholder="Enter your email" value="<?=$user->email?>">
				<p>Message:</p>
				<div class="form-group">
					<textarea class="form-control modalinputs" rows="3" id="contactus-comment" placeholder="What would you like to tell us?"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default red" data-dismiss="modal" id="contact-us-submit" onclick="contactUs()">Send Message</button>
			</div>
		</div>
	</div>
</div>
