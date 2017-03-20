<div class="homepagecontent">
	<div class="logopndesc">
		<div class="logocenter">
			<img class="logo" src="http://virtual-force.com/wp-content/uploads/2015/05/mockup-icon.svg">
		</div>

		<div class="pncenter">
			<span>FindMyProtest</span>
		</div>

		<div class="desctext">
			<p>FindMyProtest allows you to search for demonstrations your way: based on when, where, and why you want to take action</p>
		</div>
	</div>
	<input type="text" class="form-control" id="exampleInputName" placeholder="City, State">
	<input type="text" class="form-control" id="exampleInputName" placeholder="MM/DD/YYYY">
	<input type="text" class="form-control" id="exampleInputName" placeholder="Issue or Topic">
	<button type="button" class="btn btn-default findbutton"><span class = "findtext">Find</span></button>
</div>

<script>
	var popularNames=<?=json_encode($db->query("SELECT name FROM events LIMIT 10")->fetchAll(PDO::FETCH_ASSOC)) ?>;
</script>