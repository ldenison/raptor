<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
?>

<script>
$(document).ready(function() {
	$("#client").focus();
});
</script>
	<h3>Create Incident</h3>
	<hr>
	<form class="form-horizontal" name="create_incident" action="/raptor/controllers/incidentsController?action=create" method="post">
		<div class="form-group">
			<label class="control-label col-xs-2" for="client">Client Email</label>
			<div class="col-xs-4">
				<input class="form-control" type="text" name="client" id="client">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="asignee">Assignee</label>
			<div class="col-xs-4">
				<input class="form-control" type="text" name="asignee" id="asignee" value="ldenison@emich.edu">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="priority">Priority</label>
			<div class="col-xs-4">
				<select class="form-control" name="priority" id="priority">
					<option value="1">Low</option>
					<option value="2">Medium</option>
					<option value="3">High</option>
					<option value="4">Emergency</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="priority">Category</label>
			<div class="col-xs-4">
				<select class="form-control" name="category" id="category">
					<option>my.emich</option>
					<option>self service</option>
					<option>desktop application</option>
					<option>classroom technology</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="priority">Category</label>
			<div class="col-xs-8">
				<textarea class="form-control" rows="10" name="description" placeholder="Description..."></textarea>
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-10">
			<input type="submit" class="btn btn-success btn-block btn-lg" value="Create Incident">
		</div>
	</div>
	
	</form>