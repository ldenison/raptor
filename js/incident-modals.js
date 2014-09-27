$(document).ready(function() {
	$(".incident-modal-trigger").click(function() {
		var id = $(this).data("incident");
		var input = $(this).data("input");
		$(input).val(id);
	});
	$(".attach-modal-trigger").click(function() {
		$("#attach-file-incident").click();
	});
});