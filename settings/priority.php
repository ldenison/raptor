<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");

$pc = new PrioritiesController();
$priorities = $pc->index();
?>

<table class="table table-striped table-condensed">
	<thead>
		<tr><th>Priority</th><th>Rank</th></tr>
	</thead>
	<tbody>
	
<?php
if(!empty($priorities)) {
	foreach($priorities as $p) { ?>
		<tr>
			<td><?php echo $p->get("priority");?></td>
			<td><?php echo $p->get("rank");?></td>
		</tr>
	<?php 
	}
}
else {
?>
	There are no priorities
<?php }?>
	</tbody>
</table>

<a href="#">Add new priority</a>