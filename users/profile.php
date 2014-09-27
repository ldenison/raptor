<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php"); ?>
<h3>User Profile</h3>
<hr>
<form name="user-profile" class="form-horizontal" action="/raptor/controllers/usersController?action=edit" method="post">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">First Name</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" maxlength="50" name="first_name" id="first_name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Last Name</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" maxlength="50" name="first_name" id="first_name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Email Address</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" maxlength="50" name="first_name" id="first_name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Phone Number</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" maxlength="50" name="first_name" id="first_name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="address">Address</label>
		<div class="col-sm-4">
			<textarea class="form-control" rows="4" maxlength="250" name="address" id="address"></textarea>
		</div>
	</div>
	<hr>
	
	<h3>Preferences</h3>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Sidebar</label>
		<div class="col-sm-4">
			<select class="form-control">
				<option>Maximized</option>
				<option>Collapsed</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Default Incident Filter</label>
		<div class="col-sm-4">
			<select class="form-control">
				<option>My Incidents</option>
				<option>PSS Team</option>
				<option>EAS Team</option>
				<option>my.emich Incidents</option>
				<option>Email</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Incidents per Page</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" maxlength="3" name="incidents_per_page" placeholder="#">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="first_name">Refresh Interval</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" maxlength="2" name="refresh_interval" placeholder="Min">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="email_signature">Email Signature</label>
		<div class="col-sm-4">
			<textarea class="form-control" rows="7" maxlength="350" name="email_signature" id="email_signature"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="close_signature">Incident Close Signature</label>
		<div class="col-sm-4">
			<textarea class="form-control" rows="7" maxlength="350" name="close_signature" id="close_signature"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			<input type="submit" class="btn btn-success btn-block btn-lg" value="Save Changes">
		</div>
	</div>
</form>
