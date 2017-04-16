<div id="search_bar" class="form-inline">
	<select id="location-input" class="form-control input-lg">
		<option disabled selected>Select City</option>
		<?php
			$qry = $db->query("SELECT city FROM locations ORDER BY city");
			
			while ($city = $qry->fetchColumn()) {
				echo "<option>$city</option>";
			}
		?>
	</select>
	
	<input placeholder="Date" class="form-control input-lg" type="text" onfocus="(this.type='date')"  id="date-input"> 
	
	<select id="issue-input" class="form-control input-lg">
		<option disabled selected>Issue or Topic</option>
		<?php
			$qry = $db->query("SELECT name FROM topics");
			
			while ($name = $qry->fetchColumn()) {
				echo "<option>$name</option>";
			}
		?>
	</select>
	
	<button id="findButton" class="btn btn-default btn-lg" onclick="find()">Find</button>
</div>