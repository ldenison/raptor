<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
?>


<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/sidebar.php");?>

<table class="table table-striped">
	<tr>
		<td colspan="8">
			<div class="btn-group">
				<a href="#close-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Close [c]" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a>
				<a href="#assign-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Reassign [r]" data-toggle="modal"><i class="glyphicon glyphicon-share-alt"></i></a>
				<a href="#email-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Email Client [e]" data-toggle="modal"><i class="glyphicon glyphicon-envelope"></i></a>
				<a href="#comment-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Comment [t]" data-toggle="modal"><i class="glyphicon glyphicon-comment"></i></a>
				<a href="#attach-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Add Attachment [a]" data-toggle="modal"><i class="glyphicon glyphicon-paperclip"></i></a>
				<a href="#due-date-incident" class="btn btn-default enable-tip" data-placement="bottom" title="Change Due Date [d]" data-toggle="modal"><i class="glyphicon glyphicon-calendar"></i></a>
			</div>
		</td>
	</tr>
	<tr class="active"><th>#</th><th>Client</th><th>Asignee</th><th>P</th><th>Status</th><th>Created</th><th>Due</th><th>Type</th></tr>
	<tr>
		<td>4576</td>
		<td><a href="#">bpeters</a></td>
		<td><a href="#">ldenison</a></td>
		<td>Urgent</td>
		<td><i>Unresolved</i></td>
		<td>06/06/2014</td>
		<td>06/09/2014</td>
		<td>Phone</td>
	</tr>
	<tr><td colspan="8">
		<h4>Description</h4>
		I can't log in to my emich account because I there is something really 
		long in this ticket for some reason but who cares found a dog and he is 
		really cool
		</td>
	</tr>
</table>

<script>
$(document).ready(function() {
	$(".enable-tip").tooltip({container:'body'});

	/*
	$(document).keyup(function(e) {
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
	});
	*/
});
</script>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/assign.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/attach.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/close.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/comment.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/due-date.php");?>
<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/incidents/modals/email.php");?>