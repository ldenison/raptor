<?php 
require_once("header.php");

$ic = new IncidentsController();
$sc = new StarsController();

if(!empty($_GET['client_id'])) {
	$clauses[] = Array("column"=>"client_id","value"=>$_GET['client_id'],"comparator"=>"=");
	$clauses[] = Array("column"=>"status_id","value"=>1,"comparator"=>"=","prepend"=>"AND");
}
elseif(!empty($_GET['assigned_to'])) {
	$clauses[] = Array("column"=>"assigned_to","value"=>$_GET['assigned_to'],"comparator"=>"=");
	$clauses[] = Array("column"=>"status_id","value"=>1,"comparator"=>"=","prepend"=>"AND");
}
else {
	$clauses[] = Array("column"=>"assigned_to","value"=>$_SESSION['raptor']['user_id'],"comparator"=>"=");
	$clauses[] = Array("column"=>"status_id","value"=>1,"comparator"=>"=","prepend"=>"AND");
}
$incidents = $ic->filter($clauses);
?>
	<h3>My Incidents</h3>
	<hr>
	<table class="table table-condensed" id="incidents">
		<thead>
			<tr class="active"><td></td><td></td><th>#</th><th>Client</th><th>Summary</th><th>Assignee</th><th>Team</th><th>P</th><th>Status</th><th>Created</th><th>Due</th></tr>
		</thead>
		<tbody>
		<?php if(!empty($incidents)) { ?>
			<?php foreach($incidents as $i){
				$client = new Client($i->get("client_id"));
				$client = $client->get("email");
				
				$assigned_to = new User($i->get("assigned_to"));
				if($assigned_to!=false) {
					$assigned_to = $assigned_to->get("email");
				}
				else {
					$assigned_to = "";
				}
				$team = new Team($i->get("team_id"));
				$team = $team->get("key");	
				
				$priority = new Priority($i->get("priority_id"));
				$p_priority = "<i class='glyphicon ";
				$p_priority .= $priority->get("icon") . "' style='color:#";
				$p_priority .= $priority->get("color")."'></i>";
				
				$status = new Status($i->get("status_id"));
				$status = $status->get("status");
				$star = $sc->hasStar($i->get("id"),$_SESSION['raptor']['user_id']);
				if($star!=false) {
					$star_class = "glyphicon-star";
					$star_id = "data-star_id='".$star[0]->get("id")."'";
				}
				else {
					$star_class = "glyphicon-star-empty";
					$star_id = "";
				}
				?>
			<tr>
				<td>
					<div class="dropdown">
						<span style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-cog"></i>
						</span>
						<ul class="dropdown-menu dropdown-menu-left">
							<li><a href="#close-incident" data-incident="<?php echo $i->get("id");?>"
								data-input="#close_incident_id"
								class="incident-modal-trigger" 
								data-toggle="modal">
									<i class="glyphicon glyphicon-remove"></i> Close
								</a>
							</li>
							<li><a href="#assign-incident" data-toggle="modal"><i class="glyphicon glyphicon-share-alt"></i> Assign</a></li>
							<li><a href="#email-incident" data-toggle="modal"><i class="glyphicon glyphicon-envelope"></i> Email</a></li>
							<li><a href="#comment-incident" data-toggle="modal"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
							<li><a href="#attach-incident" class="attach-modal-trigger" data-toggle="modal"><i class="glyphicon glyphicon-paperclip"></i> Attach</a></li>
							<li><a href="#due-date-incident" data-toggle="modal"><i class="glyphicon glyphicon-calendar"></i> Change Due Date</a></li>
						</ul>
					</div>
				</td>
				<td>
					<i class="star glyphicon <?php echo $star_class;?>" <?php echo $star_id;?> data-incident="<?php echo $i->get("id");?>"></i>
				</td>
				<td>
					<a href="/raptor/incidents/view-incident?id=<?php echo $i->get("id");?>"><?php echo $i->get("id");?></a>
				</td>
				<td>
					<a href="/raptor/incidents/?client_id=<?php echo $i->get("client_id");?>"><?php echo $client;?></a>
				</td>
				<td>
					<a href="/raptor/incidents/view-incident?id=<?php echo $i->get("id");?>"><?php echo $i->get("description");?></a>
				</td>
				<td>
					<a href="/raptor/incidents/?assigned_to=<?php echo $i->get("assigned_to");?>"><?php echo $assigned_to;?></a>
				</td>
				<td><?php echo $team;?></td>
				<td>
					<p style="display:none;"><?php echo $priority->get("rank");?></p>
					<?php echo $p_priority;?>
				</td>
				<td>
					<i><?php echo $status;?></i>
				</td>
				<td>
					<?php echo $i->printDate($i->get("created"));?>
				</td>
				<td>
					<?php echo $i->printDate($i->get("due"));?>
				</td>
			</tr>
			<?php }?>
			
			<?php } else {?>
			<tr><td>
				<strong>There are no Incidents</strong>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>

<script src="/raptor/views/js/incident-modals.js"></script>
<script src="/common/jquery-tablesorter/jquery.tablesorter.min.js"></script>
<script>
$(document).ready(function() {
	$("#incidents").tablesorter();
});
</script>
<?php require_once("incidents/modals/assign.php");?>
<?php require_once("incidents/modals/attach.php");?>
<?php require_once("incidents/modals/close.php");?>
<?php require_once("incidents/modals/comment.php");?>
<?php require_once("incidents/modals/due-date.php");?>
<?php require_once("incidents/modals/email.php");?>
