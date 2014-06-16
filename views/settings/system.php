<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");?>

<form class="form-horizontal">
	<h3>Authentication</h3>
	<div class="form-group">
		<label for="authentication-type">Authentication Type</label>
		<select class="form-control" id="authentication-type"
			name="authentication-type">
			<option>CAS</option>
			<option>LDAP</option>
			<option>Local</option>	
		</select>
	</div>
	<hr>
	<h3>Email Settings</h3>
	<div class="form-group">
		<label for="imap-account-name">IMAP Account Name</label>
		<input type="text" class="form-control" name="imap-account-name" id="imap-account-name">
	</div>
	<div class="form-group">
		<label for="imap-password">IMAP Password</label>
		<input type="password" class="form-control" name="imap-password" id="imap-password">
	</div>
	<div class="form-group">
		<label for="imap-host">IMAP Host</label>
		<input type="text" class="form-control" name="imap-host" id="imap-host">
	</div>
</form>