<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
$user = new User($_SESSION['raptor']['user_id']);
$teams = $user->get("teams");
?>

<script>
$(document).ready(function() {
	$("#client").focus();
	//Fill available teams for assignee
	$("#assignee").change(function() {
		$("#team").html('');
		var email = $(this).val();
		$.get("/raptor/controllers/forms/teams?action=json-get-user-teams&email="+email,
			function(data) {
				var i=0;
				$.each(data,function(index,value) {
					var id = data[i].id;
					var name = data[i].name;

					var option = 
						$("<option>", {
							value: id,
							html:name
						});
					$("#team").append(option);
					i++;
				});
			},
			"json");
	});
	
});
</script>
	<h3>Create Incident</h3>
	<hr>
	<form class="form-horizontal" name="create_incident" action="/raptor/api/forms/incidents?action=create" method="post">
		<div class="form-group">
			<label class="control-label col-xs-2" for="client">Client Email</label>
			<div class="col-xs-4">
				<input class="form-control" type="text" name="client" id="client">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="assignee">Assignee</label>
			<div class="col-xs-4">
				<input class="form-control" type="text" name="assigned_to" id="assignee" value=<?php echo $_SESSION['raptor']['email'];?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="team">Team</label>
			<div class="col-xs-4">
				<select class="form-control" name="team_id" id="team">
					<?php 
						if(!empty($teams)) {
							foreach($teams as $t){?>
							<option value="<?php echo $t->get("id");?>"><?php echo $t->get("key");?></option>
						<?php }
						}?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="priority">Priority</label>
			<div class="col-xs-4">
				<select class="form-control" name="priority_id" id="priority">
					<option value="1">Low</option>
					<option value="2">Medium</option>
					<option value="3">High</option>
					<option value="4">Emergency</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="category">Category</label>
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
			<label class="control-label col-xs-2" for="type">Type</label>
			<div class="col-xs-4">
				<select class="form-control" name="type_id" id="type">
					<option value="1">Phone</option>
					<option value="2">Email</option>
					<option value="3">Direct Report</option>
					<option value="4">Other</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-6">
				<textarea class="form-control" rows="10" name="description" placeholder="Description..."></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-6">
				<textarea class="form-control" rows="10" name="close_comment" placeholder="Resolution..."></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<input type="submit" class="btn btn-success btn-block btn-lg" value="Create Incident">
			</div>
		</div>
	
	</form>