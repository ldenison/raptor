<!-- Comment Incident Modal -->
<div class="modal fade" id="comment-incident" tabindex="-1" role="dialog"
	aria-labelledby="comment-incident-Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">Comment</h4>
			</div>
			<div class="modal-body">
				<form role='form' name='comment_incident'
					id="comment_incident"
					action='/raptor/controllers/incidentsController?action=comment'
					method='post'>
					<input type="hidden" id="comment_incident_id" name="id" value="4576">
					<div class='form-group'>
						<textarea class="form-control" name="comment" rows="5" placeholder="Comment..."></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" form='comment_incident' class="btn btn-primary"
					value='Add Comment'>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->