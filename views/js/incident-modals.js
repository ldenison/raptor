$(document).ready(function() {
	$(".incident-modal-trigger").click(function() {
		var id = $(this).data("incident");
		var input = $(this).data("input");
		$(input).val(id);
	});
});