<div id="createeventmodal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create a New Event</h4>
			</div>
			<div class="modal-body" id="createeventmodal">
				<div class="issue">
					<span class="lefttext">Issue</span>
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
					<span class="lefttext">Location</span>
					<select id="create-event-location" class="form-control">
						<option disabled selected>Issue</option>
						<?php
							$qry = $db->query("SELECT city FROM locations ORDER BY city");
							
							while ($city = $qry->fetchColumn()) {
								echo "<option>$city</option>";
							}
						?>
					</select>
				</div>

				<div class="datetime">
					<span class="lefttext">Date</span>
					<input type="date" class="form-control" placeholder="MM/DD/YYYY">
				</div>

				<div class="datetime">
					<span class="lefttext">Time</span>
					<input type="time" class="form-control" placeholder="00:00 pm">
				</div>

				<div class="eventfblink">
					<span class="lefttext">Facebook Link</span>
					<input type="text" class="form-control" id="create-event-fb-link" placeholder="www.fblinkexample.com">
				</div>

				<div class="imgurl">
					<span class="lefttext">Image URL</span>
					<input type="text" class="form-control" id="create-event-URL" placeholder="URL">
				</div>

				<div class="eventDescription">
					<span class="lefttext">Description</span>
					<div class="form-group">
						<textarea class="form-control" rows="7" id="create-event-description" placeholder="Description"></textarea>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="submitEvent()">Create Event</button>
				</div>
			</div>

		</div>
	</div>
</div>