<?php
$db->prepare("INSERT INTO events_views (user_agent, IP) VALUES (?,?)")->execute(array($_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']));

$unique_views = uniqueViews($event->id);
?>

<div id="user_wrapper">
		<div class="col-md-12">
			<h1 class="page-header text-center"><?=$event->name ?></h1>
		</div>
		
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Host: Alex Lara</h2>
					<h3>Date: <?=$event->date?></h3>
					<h3>Unique views: <?=$unique_views?></h3>

					<table class="table"><tbody>
						<tr><td>
							Planned Parenthood
						</td></tr>
						<tr><td>
							Immigration Restrictions
						</td></tr>
					</tbody></table>
				</div>
			</div>
		</div>



	</div>

<script>
	
</script>