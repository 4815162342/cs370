<div id="createeventmodal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create a New Event</h4>
			</div>
			<div class="modal-body" id="createeventmodal">
				<div class="issue">
					<span class="lefttext">Issue: &nbsp</span>
					<select id="create-event-issue" class="form-control">
						<option disabled selected>Issue</option>
						<?php
							$qry = $db->query("SELECT name FROM topics");
							
							while ($name = $qry->fetchColumn()) {
								echo "<option>$name</option>";
							}
						?>
					</select>

				</div>

				<div class="loc">
					<span class="lefttext">Location:</span>
					<input type="text" class="form-control" id="create-event-location" placeholder="Event Location">
				</div>

				<div class="datetime">
					<span class="lefttext">Date:</span>
					<input type="date" class="form-control" placeholder="MM/DD/YYYY">
				</div>

				<div class="datetime">
					<span class="lefttext">Time:</span>
					<div class="dropdown pullleft">
						<button class="btn btn-primary dropdown-toggle gray" type="button" data-toggle="dropdown">
							Hour <span class="caret"></span>
						</button>
						<select class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
					</div>
					<div class="dropdown pullleft">
						<button class="btn btn-primary dropdown-toggle gray" type="button" data-toggle="dropdown">
							Minute <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">00</a></li>
							<li><a href="#">15</a></li>
							<li><a href="#">30</a></li>
							<li><a href="#">45</a></li>
						</ul>
					</div>
					<div class="dropdown pullleft">
						<button class="btn btn-primary dropdown-toggle gray" type="button" data-toggle="dropdown">AM/PM
<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">AM</a></li>
							<li><a href="#">PM</a></li>
						</ul>
					</div>
					<div class="dropdown pullleft">
						<button class="btn btn-primary dropdown-toggle gray" type="button" data-toggle="dropdown">Time Zone
<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">Central Time</a></li>
							<li><a href="#">Eastern Time</a></li>
							<li><a href="#">Mountain Time</a></li>
							<li><a href="#">Pacific Time</a></li>
						</ul>
					</div>
				</div>

				<div style="height: 5px;">

				</div>

				<div class="eventfblink">
					<span class="lefttext">Event Facebook Link: </span>
					<input type="text" class="form-control" id="create-event-fb-link" placeholder="www.fblinkexample.com">
				</div>

				<div class="imgurl">
					<span class="lefttext">Image URL: </span>
					<input type="text" class="form-control" id="create-event-URL" placeholder="URL">
				</div>

				<div class="eventDescription">
					<span class="lefttext">Event Description: </span>
					<div class="form-group">
						<textarea class="form-control" rows="7" id="create-event-description" placeholder="Event Description"></textarea>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="submitEvent()">Create Event</button>
				</div>
			</div>

		</div>
	</div>
</div>