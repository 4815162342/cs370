<?php

$user_id = intval($userpage_user->id);
$likesArray = $db->query("SELECT * FROM events_saved LEFT JOIN events ON (events_saved.eid = events.id) WHERE uid = $user_id")->fetchAll(PDO::FETCH_OBJ);

?>

<div id="user_wrapper">
	<div class="col-md-12">
		<h1 class="page-header text-center"><?=$userpage_user->full ?></h1>
	</div>

	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<h2>User: <?=$userpage_user->username ?></h2>
				<h3>Liked events: </h3>

				<table class="table"><tbody>
					<?php
					if(!$likesArray){
						<tr><td>
							<p>No liked events yet</p>
						</td></tr>
					}
					else
						foreach($likesArray as $like) {
					?>
					<tr><td>
						<?=$like->name?>
					</td></tr>
					<?php } ?>
				</tbody></table>
			</div>
		</div>
	</div>
</div>
