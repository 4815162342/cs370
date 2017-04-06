<select id="location-input" class="form-control">
	<option disabled selected>Select City</option>
	<?php
		$qry = $db->query("SELECT city FROM locations");
		
		while ($city = $qry->fetchColumn()) {
			echo "<option>$city</option>";
		}
	?>
</select>

<input placeholder="Date" class="form-control" type="text" onfocus="(this.type='date')"  id="date-input"> 

<select id="issue-input" class="form-control">
	<option disabled selected>Issue or Topic</option>
	<?php
		$qry = $db->query("SELECT name FROM topics");
		
		while ($name = $qry->fetchColumn()) {
			echo "<option>$name</option>";
		}
	?>
</select>

<button type="button" class="btn btn-default findbutton" onclick="find()"><span class="findtext">Find</span></button>