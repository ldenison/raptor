<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");

$ic = new IncidentsController();
$incidents = $ic->index();
?>


<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/sidebar.php");?>
<div id="main-content" class="col-xs-10 col-xs-offset-2">
	<h3>My Incidents</h3>
	<hr>
	<table class="table table-condensed" id="incidents">
		<thead>
			<tr class="active"><td></td><td></td><th>#</th><th>Client</th><th>Summary</th><th>Assignee</th><th>P</th><th>Status</th><th>Created</th><th>Due</th></tr>
		</thead>
		<tbody>
		<?php if(!empty($incidents)) {?>
			<?php foreach($incidents as $i){
				$client = new Client($i->get("client_id"));
				$client = $client->get("email");
				?>
		
			<?php }?>
		<?php }?>
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
					<i class="star glyphicon glyphicon-star"></i>
				</td>
				<td>
					<a href="/raptor/views/incidents/view-incident">4576</a>
				</td>
				<td>
					<a href="#">bpeters</a>
				</td>
				<td>
					<a href="/raptor/views/incidents/view-incident">I can't log in to my emich account because I there is something really long in this ticket for some reason but who cares found a dog and he...</a>
				</td>
				<td>
					<a href="#">ldenison</a>
				</td>
				<td>
					Urgent
				</td>
				<td>
					<i>Unresolved</i>
				</td>
				<td>
					06/06/2014
				</td>
				<td>
					06/09/2014
				</td>
			</tr>
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
					<i class="star glyphicon glyphicon-star-empty"></i>
				</td>
				<td>
					<a href="/raptor/views/incidents/view-incident">4579</a>
				</td>
				<td>
					<a href="#">atanner1</a>
				<td>
					<a href="/raptor/views/incidents/view-incident">I can't log in to my emich account because I there is...</a>
				</td>
				<td>
					<a href="#">ldenison</a>
				</td>
				<td>
					Medium
				</td>
				<td>
					<i>Unresolved</i>
				</td>
				<td>
					06/05/2014
				</td>
				<td>
					06/10/2014
				</td>
			</tr>
		</tbody>
	</table>
</div>

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
