$(document).ready(function() {
	$(".star").click(function() {
		var incident_id = $(this).data("incident");
		var flag = "";
		if($(this).hasClass("glyphicon-star-empty")) {
			$(this).removeClass("glyphicon-star-empty");
			$(this).addClass("glyphicon-star");
			action = "true";
		}
		else {
			$(this).removeClass("glyphicon-star");
			$(this).addClass("glyphicon-star-empty");
			action = "false";
		}
		
		$.get("/raptor/controllers/forms/incidents?action=star&id="+incident_id+"&set="+flag);
	});
});