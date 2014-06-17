<?php 
$tc = new TeamsController();
$teams = $tc->index();
?>
<!-- Assign Incident Modal -->
<div class="modal fade" id="assign-incident" tabindex="-1" role="dialog"
	aria-labelledby="assign-incident-Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">Assign Incident</h4>
			</div>
			<div class="modal-body">
				<h3>Assign Incident 4576</h3>
				<form role='form' name='assign_incident'
					id="assign_incident"
					action='/raptor/controllers/incidentsController?action=assign'
					method='post'>
					<input type="hidden" id="assign_incident_id" name="id" value="4576">
					<div class="form-group">
						<input type="text" class="form-control" id="assign_to" name="assign_to" placeholder="Email or Team">
					</div>
					<div class="form-group">
						<label for="team_id">Team</label>
						<select class="form-control" name="team_id" id="team_id">
							<option></option>
							<?php foreach($teams as $t) {?>
							<option value="<?php echo $t->get("id");?>">
								<?php echo $t->get("key");?>
							</option>
							<?php }?>
						</select>
					</div>
					<div class='form-group'>
						<textarea class="form-control" name="comment" rows="5" placeholder="Comment..."></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" form='assign_incident' class="btn btn-primary"
					value='Assign Incident'>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->