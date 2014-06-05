<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
?>


<?php require_once(getenv("DOCUMENT_ROOT")."/raptor/views/sidebar.php");?>
<div class="main-content-container">
	<h3>My Incidents</h3>
	<hr>
	<table class="table table-condensed">
		<tr class="active"><td></td><td></td><th>#</th><th>Client</th><th>Summary</th><th>Assignee</th><th>P</th><th>Status</th><th>Created</th><th>Due</th></tr>
		<tr>
			<td>
				<div class="dropdown">
					<span class="dropdown-toggle btn btn-xs" data-toggle="dropdown">
						<i class="glyphicon glyphicon-cog"></i>
					</span>
					<ul class="dropdown-menu dropdown-menu-left">
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i> Close</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-pencil"> </i> Edit</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-share-alt"> </i> Assign</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i> Email</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-comment"> </i> Comment</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-paperclip"> </i> Attach</a></li>
					</ul>
				</div>
			</td>
			<td>
				<i style="color: #ffd76e" class="glyphicon glyphicon-star"></i>
			</td>
			<td>
				<a href="#">4576</a>
			</td>
			<td>
				<a href="#">bpeters</a>
			<td>
				<a href="#">I can't log in to my emich account because I there is something really long in this ticket for some reason but who cares found a dog and he...</a>
			</td>
			<td>
				<a href="#">ldenison</a>
			</td>
			<td>
				Urgent
			</td>
			<td>
				<i>Unresolved</i>
			</td>
			<td>
				06/06/2014
			</td>
			<td>
				06/09/2014
			</td>
		</tr>
		<tr>
			<td>
				<div class="dropdown">
					<span class="dropdown-toggle btn btn-xs" data-toggle="dropdown">
						<i class="glyphicon glyphicon-cog"></i>
					</span>
					<ul class="dropdown-menu dropdown-menu-left">
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i> Close</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-pencil"> </i> Edit</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-share-alt"> </i> Assign</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i> Email</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-comment"> </i> Comment</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-paperclip"> </i> Attach</a></li>
					</ul>
				</div>
			</td>
			<td>
				<i class="glyphicon glyphicon-star-empty"></i>
			</td>
			<td>
				<a href="#">4579</a>
			</td>
			<td>
				<a href="#">atanner1</a>
			<td>
				<a href="#">I can't log in to my emich account because I there is ...</a>
			</td>
			<td>
				<a href="#">ldenison</a>
			</td>
			<td>
				Medium
			</td>
			<td>
				<i>Unresolved</i>
			</td>
			<td>
				06/05/2014
			</td>
			<td>
				06/10/2014
			</td>
		</tr>
	</table>
</div>
