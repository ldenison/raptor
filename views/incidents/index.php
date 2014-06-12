<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");

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
	$clauses[] = Array("column"=>"assigned_to","value"=>"ldenison@emich.edu","comparator"=>"=");
	$clauses[] = Array("column"=>"status_id","value"=>1,"comparator"=>"=","prepend"=>"AND");
}
$incidents = $ic->filter($clauses);
?>
	<h3>My Incidents</h3>
	<hr>
	<table class="table table-condensed" id="incidents">
		<thead>
			<tr class="active"><td></td><td></td><th>#</th><th>Client</th><th>Summary</th><th>Assignee</th><th>P</th><th>Status</th><th>Created</th><th>Due</th></tr>
		</thead>
		<tbody>
		<?php if(!empty($incidents)) { ?>
			<?php foreach($incidents as $i){
				$client = new Client($i->get("client_id"));
				$client = $client->get("email");
				
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
							<li><a href="#close-incident" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i> Close</a></li>
							<li><a href="#assign-incident" data-toggle="modal"><i class="glyphicon glyphicon-share-alt"></i> Assign</a></li>
							<li><a href="#email-incident" data-toggle="modal"><i class="glyphicon glyphicon-envelope"></i> Email</a></li>
							<li><a href="#comment-incident" data-toggle="modal"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
							<li><a href="#attach-incident" data-toggle="modal"><i class="glyphicon glyphicon-paperclip"></i> Attach</a></li>
							<li><a href="#due-date-incident" data-toggle="modal"><i class="glyphicon glyphicon-calendar"></i> Change Due Date</a></li>
						</ul>
					</div>
				</td>
				<td>
					<i class="star glyphicon <?php echo $star_class;?>" <?php echo $star_id;?> data-incident="<?php echo $i->get("id");?>"></i>
				</td>
				<td>
					<a href="/raptor/views/incidents/view-incident?id=<?php echo $i->get("id");?>"><?php echo $i->get("id");?></a>
				</td>
				<td>
					<a href="/raptor/views/incidents/?client_id=<?php echo $i->get("client_id");?>"><?php echo $client;?></a>
				</td>
				<td>
					<a href="/raptor/views/incidents/view-incident?id=<?php echo $i->get("id");?>"><?php echo $i->get("description");?></a>
				</td>
				<td>
					<a href="/raptor/views/incidents/?assigned_to=<?php echo $i->get("assigned_to");?>"><?php echo $i->get("assigned_to");?></a>
				</td>
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
			There are no Incidents
			<?php }?>
		</tbody>
	</table>

<script src="/common/jquery-tablesorter/jquery.tablesorter.min.js"></script>
<script>
$(document).ready(function() {
	$("#incidents").tablesorter();
});
</script>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/assign.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/attach.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/close.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/comment.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/due-date.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/email.php");?>
