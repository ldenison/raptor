<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
$tc = new TeamsController();
$teams = $tc->index();?>

<table class="table table-striped table-condensed">
	<tr><th>Key</th><th>Description</th></tr>


<?php 
if(!empty($teams)) {
	foreach($teams as $t) {?>
	<tr><td><?php echo $t->get("key");?></td>
		<td><?php echo $t->get("description");?></td>
	</tr>
	<?php }
}
?>
</table>
<a href="#">Add New Team</a>