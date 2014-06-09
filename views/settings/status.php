<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
require_once(getenv("DOCUMENT_ROOT")."/raptor/controllers/statusesController.php");
$sc = new StatusesController();
$statuses = $sc->index();
?>

<table class="table table-striped table-condensed">
	<thead>
		<tr><th>Status</th></tr>
	</thead>
	<tbody>
	
<?php
if(!empty($statuses)) {
	foreach($statuses as $s) { ?>
		<tr><td><?php echo $s->get("status");?></td></tr>
	<?php 
	}
}
else {
?>
	There are no statuses
<?php }?>
	</tbody>
</table>

<a href="#">Add new status</a>