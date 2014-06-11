<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/views/header.php");
?>

<div class="columns-container">
	<h3>Columns</h3>
	<hr>
	<span class="column-btn btn btn-primary">Assigned To</span>
	<span class="column-btn btn btn-primary">Client</span>
	<span class="column-btn btn btn-primary">Priority</span>
	<span class="column-btn btn btn-primary">Status</span>
	<span class="column-btn btn btn-primary">Created</span>
	<span class="column-btn btn btn-primary">Due</span>
</div>

<div class="query-builder-ui form-inline">
	<h3>Filter Builder</h3>
	<hr>

</div>

<script>
$(document).ready(function() {
	$(".column-btn").click(function() {
		var text = $(this).text();

		var btn =
			$("<span>", {
				class: "btn btn-primary column-selected pull-left col-xs-3",
				html: text
			});
		var form_container = 
			$("<div>", {
				class: "control-group"
			});
		var select =
			$("<select>", {
				class: "form-control",
				html: "<option>=</option><option>!=</option><option>LIKE</option>"
			});
		var input = 
			$("<input>", {
				type: "text",
				class: "form-control"
			});
		var input_container =
			$("<div>", {
				class: "col-xs-4"
			});
		var select_container =
			$("<div>", {
				class: "col-xs-2"
			});
		var append_container = 
			$("<div>", {
				class: "col-xs-2"
			});
		var append_select =
			$("<select>", {
				class: "form-control",
				html: "<option></option><option>AND</option><option>OR</option>"
			});

		var query = $(".query-builder-ui");
		query.append(form_container);
		form_container.append(btn);
		form_container.append(select_container);
		form_container.append(input_container);
		form_container.append(append_container);
		input_container.append(input);
		select_container.append(select);
		append_container.append(append_select);
		
		query.append("<br><br>");	
	});
});
</script>