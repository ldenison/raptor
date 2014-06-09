<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");?>

<link rel="stylesheet" href="/common/typeahead/typeahead.js-bootstrap.css">
<script src="/common/typeahead/typeahead.min.js"></script>
<script>
$(document).ready(function() {
	$("#email").typeahead({
		name: 'email',
		local: ['ldenison@emich.edu','pwelke@emich.edu','jmorast@emich.edu','rsnyde16@emich.edu','bpeters@emich.edu']
	});
});
</script>

	<h3>Search Clients</h3>
	<hr>
	<div class="row">
	<form class="form-horizontal" name="client_search" action="/raptor/views/clients/search-results" method="get">
		<div class="form-group">
			<label class="control-label col-xs-2" for="email">Email Address</label>
			<div class="col-xs-4">
				<input class="form-control" autocomplete="off" type="text" id="email" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="first_name">First Name</label>
			<div class="col-xs-4">
				<input class="form-control" autocomplete="off" type="text" id="first_name" name="first_name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-2" for="last_name">Last Name</label>
			<div class="col-xs-4">
				<input class="form-control" autocomplete="off" type="text" id="last_name" name="last_name">
			</div>
		</div>
	</form>
	</div>

