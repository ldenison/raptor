<script>

$(document).ready(function() {
	var signature = "=================\nLuke Denison\nWeb Developer / Analyst\nEastern Michigan University";
	$("#include-email-signature").click(function() {
		var text = $("#email-body").text();
		$("#email-body").text(text + signature);
	});
});
</script>

<!-- Email Incident Modal -->
<div class="modal fade" id="email-incident" tabindex="-1" role="dialog"
	aria-labelledby="email-incident-Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">Email</h4>
			</div>
			<div class="modal-body">
				<form role='form' name='email_incident'
					id="email_incident"
					action='/raptor/controllers/incidentsController?action=email'
					method='post'>
					<input type="hidden" id="email_incident_id" name="id" value="4576">
					<div class='form-group'>
						<textarea class="form-control" name="body" id="email-body" rows="5" placeholder="Body..."></textarea>
					</div>
					<div class="form-group">
						<span class="btn btn-default btn-sm" id="include-email-signature">Include Signature</span>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" form='email_incident' class="btn btn-primary"
					value='Send Email'>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->