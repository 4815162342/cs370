<select id="location-input" class="form-control">
	<option disabled selected>Select City</option>
	<?php
		$qry = $db->query("SELECT city FROM locations");
		
		while ($city = $qry->fetchColumn()) {
			echo "<option>$city</option>";
		}
	?>
</select>
<input type="date" class="form-control" id="date-input" placeholder="MM/DD/YYYY">
<input type="text" class="form-control" id="issue-input" placeholder="Issue or Topic">
<button type="button" class="btn btn-default findbutton" onclick="find()"><span class="findtext">Find</span></button>