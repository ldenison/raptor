<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
$incident = new Incident($_GET['id']);
$id = $incident->get("id");
$client = new Client($incident->get("client_id"));
$client = $client->get("email");
$assignee = new User($incident->get("assigned_to"));
$assignee = $assignee->get("email");
$team = new Team($incident->get("team_id"));
$team = $team->get("key");
$priority = new Priority($incident->get("priority_id"));
$priority = $priority->get("priority");
$status = new Status($incident->get("status_id"));
$status = $status->get("status");
$created = $incident->printDate($incident->get("created"));
$due = $incident->printDate($incident->get("due"));
$type = "Phone";
$description = $incident->get("description");

?>

<table class="table table-striped">
	<tr>
		<td colspan="9">
			<div class="btn-group">
				<a href="#close-incident" data-incident="<?php echo $incident->get("id");?>"
					data-input="#close_incident_id"
					class="btn btn-default enable-tip incident-modal-trigger" data-placement="bottom" 
					title="Close [c]" data-toggle="modal">
					<i class="glyphicon glyphicon-remove"></i>
				</a>
				<a href="#assign-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Reassign [r]" data-toggle="modal"><i class="glyphicon glyphicon-share-alt"></i></a>
				<a href="#email-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Email Client [e]" data-toggle="modal"><i class="glyphicon glyphicon-envelope"></i></a>
				<a href="#comment-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Comment [t]" data-toggle="modal"><i class="glyphicon glyphicon-comment"></i></a>
				<a href="#attach-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Add Attachment [a]" data-toggle="modal"><i class="glyphicon glyphicon-paperclip"></i></a>
				<a href="#due-date-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Change Due Date [d]" data-toggle="modal"><i class="glyphicon glyphicon-calendar"></i></a>
			</div>
		</td>
	</tr>
	<tr class="active"><th>#</th><th>Client</th><th>Assignee</th><th>Team</th><th>P</th><th>Status</th><th>Created</th><th>Due</th><th>Type</th></tr>
	<tr>
		<td><?php echo $id;?></td>
		<td><a href="#"><?php echo $client;?></a></td>
		<td><a href="#"><?php echo $assignee?></a></td>
		<td><a href="#"><?php echo $team;?></a></td>
		<td><?php echo $priority;?></td>
		<td><i><?php echo $status?></i></td>
		<td><?php echo $created;?></td>
		<td><?php echo $due;?></td>
		<td><?php echo $type;?></td>
	</tr>
	<tr><td colspan="9">
		<h4>Description</h4>
		<?php echo $description;?>
		</td>
	</tr>
</table>
<ul class="nav nav-pills" role="tablist">
  <li class="active"><a href="#comments" role="tab" data-toggle="tab">Comments</a></li>
  <li><a href="#workflow" role="tab" data-toggle="tab">Workflow</a></li>
  <li><a href="#all" role="tab" data-toggle="tab">All</a></li>
</ul>
<br>
<div class="tab-content">
  <div class="tab-pane active" id="comments">
  	<table class="table table-striped">
  		<tr><td>7/10/2014 - 12:52pm <strong>ldenison@emich.edu</strong><br>
  				This entire piece of software is pretty bad all around.
  			</td>
  		</tr>
  		<tr><td>7/10/2014 - 02:35pm <strong>optimist@emich.edu</strong><br>
  				But hopefully it gets better with age.
  			</td>
  		</tr>
  		<tr><td>7/10/2014 - 04:04pm <strong>pessimist@emich.edu</strong><br>
  				I find that kind of unlikely.
  			</td>
  		</tr>
  	</table>
  </div>
  <div class="tab-pane" id="workflow">
	  <table class="table table-striped">
	  		<tr><td>7/09/2014 - 01:05pm <strong>ldenison@emich.edu</strong><br>
	  				 Reassigned from <strong>pessimist@emich.edu</strong> to
	  				<strong>optimist@emich.edu</strong>
	  			</td>
	  		</tr>
	  		<tr><td>7/11/2014 - 10:06pm <strong>ldenison@emich.edu</strong><br>
	  				 Changed status from <strong>Unresolved</strong> to 
	  				 <strong>Resolved</strong>
	  			</td>
	  		</tr>
	  	</table>
  	</div>
  <div class="tab-pane" id="all">
  	<table class="table table-striped">
  		<tr><td>7/09/2014 - 01:05pm <strong>ldenison@emich.edu</strong><br>
  				 Reassigned from <strong>pessimist@emich.edu</strong> to
  				<strong>optimist@emich.edu</strong>
  			</td>
	  	</tr>
  		<tr><td>7/10/2014 - 12:52pm <strong>ldenison@emich.edu</strong><br>
  				This entire piece of software is pretty bad all around.
  			</td>
  		</tr>
  		<tr><td>7/10/2014 - 02:35pm <strong>optimist@emich.edu</strong><br>
  				But hopefully it gets better with age.
  			</td>
  		</tr>
  		<tr><td>7/10/2014 - 04:04pm <strong>pessimist@emich.edu</strong><br>
  				I find that kind of unlikely.
  			</td>
  		</tr>
  		<tr><td>7/11/2014 - 10:06pm <strong>ldenison@emich.edu</strong><br>
  				 Changed status from <strong>Unresolved</strong> to 
  				 <strong>Resolved</strong>
  			</td>
  		</tr>
  	</table>
  </div>
</div>


<script src="/raptor/views/js/incident-modals.js"></script>
<script>
$(document).ready(function() {
	$(".enable-tip").tooltip({container:'body'});

	
	$(document).keyup(function(e) {
		//Make sure focus is not in an element that a user is typing in
		if($("textarea,input,select").is(":focus")==false) {
			//Hotkey [c]
			if(e.keyCode == 67) {
				$("#close-incident").modal("show");
			}
			//Hotkey [r]
			else if(e.keyCode == 82) {
				$("#assign-incident").modal("show");
			}
			//Hotkey [e]
			else if(e.keyCode == 69) {
				$("#email-incident").modal("show");
			}
			//Hotkey [t]
			else if(e.keyCode == 84) {
				$("#comment-incident").modal("show");
			}
			//Hotkey [a]
			else if(e.keyCode == 65) {
				$("#attach-incident").modal("show");
			}
			//Hotkey [d]
			else if(e.keyCode == 68) {
				$("#due-date-incident").modal("show");
			}
		}
	});
	
});
</script>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/assign.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/attach.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/close.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/Comment.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/due-date.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/email.php");?>