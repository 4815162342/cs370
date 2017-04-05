<div class="homepagecontent">
	<div class="logopndesc">
		<div class="logocenter">
			<img class="logo" src="img/logo.png">
		</div>
		<div class="pncenter">
			<span>FindMyProtest</span>
		</div>
		<div class="desctext">
			<p>FindMyProtest allows you to search for demonstrations your way: based on when, where, and why you want to take action<br><br></p>
		</div>
	</div>
	<?php
	include('search_bar.php');
	?>
</div>

<script>
	var popularNames = <?=json_encode($db->query("SELECT name FROM events LIMIT 10")->fetchAll(PDO::FETCH_ASSOC)) ?>;
</script>