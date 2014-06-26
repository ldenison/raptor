<!-- Due Date Modal -->
<div class="modal fade" id="due-date-incident" tabindex="-1" role="dialog"
	aria-labelledby="due-date-incident-Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">Change Due Date</h4>
			</div>
			<div class="modal-body">
				<h3>Change Due Date for Incident 4578</h3>
				<form role='form' name='due_date_incident'
					id="due_date_incident"
					action='/raptor/controllers/incidentsController?action=dueDate'
					method='post'>
					<input type="hidden" id="due_date_incident_id" name="id">
					<div class="form-group">
						<input type="text" class="form-control" name="due_date">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" form='due_date_incident' class="btn btn-primary"
					value='Change Due Date'>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->