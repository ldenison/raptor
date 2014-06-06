<!-- Close Incident Modal -->
<div class="modal fade" id="close-incident" tabindex="-1" role="dialog"
	aria-labelledby="close-incident-Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">Close Incident</h4>
			</div>
			<div class="modal-body">
				<h3>Close Incident 4576</h3>
				<p>I can't log in to my emich account because I there is something really long
				in this ticket for some reason but who cares found a dog and he is cool.
				</p>
				<form role='form' name='close_incident'
					id="close_incident"
					action='/raptor/controllers/incidentsController?action=close'
					method='post'>
					<input type="hidden" id="close_incident_id" name="id" value="4576">
					<div class='form-group'>
						<textarea class="form-control" name="comment" rows="5" placeholder="Comment..."></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" form='custom_incident' class="btn btn-primary"
					value='Close Incident'>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->