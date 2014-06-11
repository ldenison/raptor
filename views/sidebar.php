<?php $hide = true;
	if($hide) {
		$full_class="hidden";
		$collapse_class="";
	}
	else {
		$full_class="";
		$collapse_class="hidden";
	}
?>
<div class="sidebar-container <?php echo $full_class;?> col-sm-2">
	<div class="sidebar-body">
		<a class="no-decoration" href="/raptor/views/incidents/create">
			<p class="sidebar-header">
				<i class="glyphicon glyphicon-fire"> </i> Create Incident
			</p>
		</a>
		<hr>
		<p class="sidebar-header">
			<i class="glyphicon glyphicon-list"> </i> Incident Filters
		</p>
		<div class="submenu expand">
			<ul>
				<li><a href="#">Mine</a></li>
				<li><a href="#">Starred</a></li>
				<li><a href="#">PSS Team</a></li>
				<li><a href="#">EAS Team</a></li>
				<li><a href="#">my.emich</a></li>
				<li><a href="#">Email</a></li>
			</ul>
			<a href="/raptor/views/filters/create"><span class="btn btn-default btn-sm"><i>Create Filter</i></span></a>
		</div>
		<hr>
		<p class="sidebar-header">
			<i class="glyphicon glyphicon-user"> </i> Clients
		</p>
		<div class="submenu expand">
			<ul>
				<li><a href="/raptor/views/clients/search">Search</a></li>
				<li><a href="#">COT</a></li>
				<li><a href="#">IT Staff</a></li>
				<li><a href="#">Pray Harrold</a></li>
			</ul>
			<a href="#"><span class="btn btn-default btn-sm"><i>Create Search</i></span></a>
		</div>
		<hr>
	</div>
	<div class="sidebar-footer">
		<p class="sidebar-header">
			<i class="glyphicon glyphicon-chevron-left"></i><i class="glyphicon glyphicon-chevron-left"> </i>
		</p>
	</div>
</div>
	
<div class="sidebar-collapsed <?php echo $collapse_class;?>">
	<a class="no-decoration" href="/raptor/views/incidents/create">
		<div class="sidebar-header">
			<i class="glyphicon glyphicon-fire"></i>
		</div>
	</a>
	<hr>
	<div class="sidebar-header">
		<i class="glyphicon glyphicon-list"> </i>
	</div>
	<hr>
	<div class="sidebar-header">
		<i class="glyphicon glyphicon-user"> </i>
	</div>
	<hr>
	<div class="sidebar-footer">
		<p class="sidebar-header">
			<i class="glyphicon glyphicon-chevron-right"></i>
		</p>
	</div>
</div>